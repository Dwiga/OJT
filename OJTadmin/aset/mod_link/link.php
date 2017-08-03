<?php
switch($ak)
{
	default:	
	  ?>
	  <div class="row">
		  <div class="col-md-12">
			  <div class="panel panel-default">
				  <div class="panel-heading"><a href="?go=home"><button class="btn btn-labeled btn-default"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</button></a> <h4 style="float:right;margin:0px 5px 5px 0px">Pengaturan Link</h4></div>
				  <div class="panel-body">
					  <form action="<?php echo $self ?>" method="post" id="formAksi" class="form-horizontal" enctype="multipart/form-data">
						  <div id="pesan"></div>
						  <div id="formLoad"></div>
					  </form>
				  </div>
				  <div class="panel-footer">
					  <span class="help-block"><b class="require">*</b> ) Menandakan inputan tidak boleh kosong</span>
				  </div>
			  </div>
		  </div>
	  </div>
	  <script type="text/javascript">
		$(document).ready(function() {
			loadForm();
			AksiForm.init({
				formID: $('#formAksi')
			}, loadForm);
			$('.fileinput').fileinput();
		});
		function loadForm() {
			var $elem = $('#formLoad');
			$elem.html('<img src="style/img/loading.gif">');
			$elem.load('<?php echo $self ?>', {'aksi': 'data', data: '<?php echo $go ?>'});
			return;
		}
	  </script>
	  <?php
	break;
}
?>