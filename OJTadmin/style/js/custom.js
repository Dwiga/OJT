var files;
$(document).ready(function() {
    $('#main-menu').metisMenu();
    $(window).bind("load resize", function() {
        if ($(this).width() < 768) {
            $('div.sidebar-collapse').addClass('collapse');
        } else {
            $('div.sidebar-collapse').removeClass('collapse');
        }
    });
    $('ul.nav-second-level').find('li.active-submenu').parent('ul.nav').addClass('collapse in').parent('li').addClass('active').children('a').first().addClass('active-menu');
});

function countdownTimer(sec, elem) {
	var element = document.getElementById(elem);
	element.innerHTML = sec;
	if (sec < 1) {
		clearTimeout(timer);
		location.reload();
	}
	sec--;
	var timer = setTimeout('countdownTimer('+sec+', "'+elem+'")', 1000);
}

var AksiForm = {
	init: function( config, callback ) {
		this.config = config;
		this.submitForm( callback );
	},
	submitForm: function( callback ) {
		var formID = this.config.formID,
			pesan = formID.find('#pesan'),
			modalID = this.config.modalID,
			textID = formID.find('textarea').attr('id');
		formID.validate({
			ignore: [],
			rules: {
				konten: {
					required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement();
					}
				}
			},
			submitHandler: function( form ) {
				var op = {
					dataType: 'json',
					beforeSubmit: function() {
						pesan.html('<div class="progress progress-striped active"><div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="sr-only">Proses ...</span></div></div>');
						formID.find('input, select, textarea, button').prop('disabled', true);
						(typeof textID != 'undefined') ? CKEDITOR.instances[textID].setReadOnly():'';
						$('html, body').animate({ scrollTop: formID.offset().top }, 500);
					},
					success: function( msg ) {
						formID.find('input, select, textarea, button').prop('disabled', false);
						(typeof textID != 'undefined') ? CKEDITOR.instances[textID].setReadOnly(false):'';
						if ( msg.b ) {
							pesan.html('<div class="alert alert-success">'+msg.b+'<br>Halaman akan automatis refresh dalam <span id="timing"></span> detik</div>');
							countdownTimer(3, 'timing');
							formID[0].reset();
							(typeof textID != 'undefined') ? CKEDITOR.instances[textID].setData(''):'';
							( typeof callback == 'function' ) ? callback.call(callback):'';
							( typeof modalID == 'object' ) ? modalID.modal('hide'):'';
						} else {
							pesan.html('<div class="alert alert-danger">'+msg.s+'<br></div>');
							//countdownTimer(3, 'timing');
						}
					},
					error: function() {
						formID.find('input, select, textarea, button').prop('disabled', false);
						(typeof textID != 'undefined') ? CKEDITOR.instances[textID].setReadOnly(false):'';
						pesan.html('<div class="alert alert-warning">Harap periksa koneksi anda<br>Halaman akan automatis refresh dalam <span id="timing"></span> detik</div></div>');
						countdownTimer(3, 'timing');
						formID[0].reset();
					}
				};
				formID.ajaxSubmit(op);
			}
		});
	}
};

var AksiForm1 = {
	init: function( config, callback ) {
		this.config = config;
		this.submitForm( callback );
	},
	submitForm: function( callback ) {
		var formID = this.config.formID,
			pesan = formID.find('#pesan1'),
			modalID = this.config.modalID,
			textID = formID.find('textarea').attr('id');
		formID.validate({
			ignore: [],
			rules: {
				konten: {
					required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement();
					}
				}
			},
			submitHandler: function( form ) {
				var op = {
					dataType: 'json',
					beforeSubmit: function() {
						pesan.html('<div class="progress progress-striped active"><div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="sr-only">Proses ...</span></div></div>');
						formID.find('input, select, textarea, button').prop('disabled', true);
						(typeof textID != 'undefined') ? CKEDITOR.instances[textID].setReadOnly():'';
						$('html, body').animate({ scrollTop: formID.offset().top }, 500);
					},
					success: function( msg ) {
						formID.find('input, select, textarea, button').prop('disabled', false);
						(typeof textID != 'undefined') ? CKEDITOR.instances[textID].setReadOnly(false):'';
						if ( msg.b ) {
							pesan.html('<div class="alert alert-success">'+msg.b+'<br>Halaman akan automatis refresh dalam <span id="timing"></span> detik</div>');
							countdownTimer(3, 'timing');
							formID[0].reset();
							(typeof textID != 'undefined') ? CKEDITOR.instances[textID].setData(''):'';
							( typeof callback == 'function' ) ? callback.call(callback):'';
							( typeof modalID == 'object' ) ? modalID.modal('hide'):'';
						} else {
							pesan.html('<div class="alert alert-danger">'+msg.s+'<br></div>');
							//countdownTimer(3, 'timing');
						}
					},
					error: function() {
						formID.find('input, select, textarea, button').prop('disabled', false);
						(typeof textID != 'undefined') ? CKEDITOR.instances[textID].setReadOnly(false):'';
						pesan.html('<div class="alert alert-warning">Harap periksa koneksi anda<br>Halaman akan automatis refresh dalam <span id="timing"></span> detik</div></div>');
						countdownTimer(3, 'timing');
						formID[0].reset();
					}
				};
				formID.ajaxSubmit(op);
			}
		});
	}
};

var TableAjax = {
	init: function( config ) {
		this.config = config;
		this.ajaxDataTable();
	},
	ajaxDataTable: function() {
		var $this = this.config.tableID,
			url = this.config.url,
			datas = this.config.dataTable;
		$.ajaxSetup({ cache: false });
		$.ajax({
			url: url,
			type: 'POST',
			data: {aksi: "data", data: datas},
			dataType: 'html',
			beforeSend: function() {
				$this.html("<img class='img-responsive' src='style/img/loading.gif'>");
			},
			success: function(msg) {
				$this.html(msg);
				$('#myModal').bind('hidden.bs.modal', function(e) {
					$(e.target).removeData('bs.modal').find('.modal-content').empty();
					//$('body').off('wheel.modal mousewheel.modal');
				}).bind('shown.bs.modal', function(e) {
					//$('body').on('wheel.modal mousewheel.modal', function () {return false;});
				});
			}
		});
	}
};