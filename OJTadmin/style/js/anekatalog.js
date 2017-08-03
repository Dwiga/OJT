$(function(){
	var $menu = $('ul#menu'), btnMenu = $('a#button-menu'),
		resizeTopBar = function() {
			var duwur = $('#duwur');
			if($(window).width() > 990) {
				duwur.css('position','fixed');
				$('#top').css('height', duwur.height());
				$(window).scroll(function(event) {
					if ($(window).scrollTop() > 0) {
						duwur.stop().animate({
							backgroundColor: '#f5f5f5',
							borderBottomColor: '#eee',
							boxShadow: '0px 5px 20px rgba(0,0,0,0.1)'
						},10);
					} else {
						duwur.stop().animate({
							backgroundColor:'#ffffff',
							borderBottomColor: 'transparent',
							boxShadow: '0px 5px 20px rgba(0,0,0,0)'
						},10);
					}
				});
				$('.form-cari-iklan').appendTo('#elemIklanSec');
				$('.form-cari-flipbook').appendTo('#elemFlipbookSec');
			} else {
				duwur.css('position','relative');
				$('#top').css('height', 0);
				$('.form-cari-iklan').appendTo('#elemIklan');
				$('.form-cari-flipbook').appendTo('#elemFlipbook');
			}
		};

	$(document).ready(function(){
		$('.selectpicker').selectpicker();
		btnMenu.on('click', function(){
			$menu.slideToggle('fast');
			if($(this).hasClass('buka')){
				$(this).removeAttr('class');
				$(this).find('i').removeAttr('class').addClass('fa fa-fw fa-bars');
			} else {
				$(this).addClass('buka');
				$(this).find('i').removeAttr('class').addClass('fa fa-fw fa-remove');
			}
		});
		resizeTopBar();
	});

	/*
	window resize
	window.width() disini harus dikurangi 17 dari @media panjang dokumen
	 */
	$(window).on('resize', function(){
		if($(window).width() <= 974 && $menu.hasClass('tutup')){
			$menu.hide().removeAttr('class');
		}
		if($menu.is(':hidden') && btnMenu.is(':hidden') && $(window).width() >= 975){
			$menu.show().addClass('tutup');
		}
		resizeTopBar();
	});
});

var KontenLoad = {
	init: function( config ) {
		this.config = config;
		this.ajaxKonten();
	},
	ajaxKonten: function() {
		var resultID = this.config.resultID,
			url = this.config.url,
			dataResult = this.config.dataResult;
		resultID.html("<img class='img-responsive' src='cm_tema/img/loading.gif'>");
		resultID.load(url, {aksi: "data", data: dataResult}, function(msg) {
			resultID.html(msg);
			$('#myModal').bind('hidden.bs.modal', function(e) {
				$(e.target).removeData('bs.modal').find('.modal-content').empty();
				//$('body').off('wheel.modal mousewheel.modal');
			}).bind('shown.bs.modal', function(e) {
				//$('body').on('wheel.modal mousewheel.modal', function () {return false;});
			});
		});
	}
};