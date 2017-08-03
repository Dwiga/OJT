<?php
if($adm->user==$_SESSION['login']){
switch ($ak) {
	default:
		?>
        <div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Ubah Profile</div>
							<div class="panel-body">
                            <form action="<?php echo $self ?>" method="post" id="formAksi" class="form-horizontal" enctype="multipart/form-data" onsubmit="return false">
                            		<div id="pesan"></div>
									<div id="formLoad"></div>
                            </form>
                            <hr />
                                <div class="form-group">
                                    <label class="col-md-3" style="font-size:18px;font-weight:bolder">Ubah Password</label>
                                </div><br />
                            <hr />
                            <form action="<?php echo $self ?>" method="post" id="formAksi1" class="form-horizontal" enctype="multipart/form-data" onsubmit="return false">
                            <div id="pesan1"></div>
                            <div class="form-group">
                                <label for="password_br" class="control-label col-md-3">Password Baru</label>
                                <div class="col-md-5">
                                    <input type="password" id="password_br" class="form-control" name="password_br"
                                        data-rule-minlength="5"
                                        data-rule-maxlength="15">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_ul" class="control-label col-md-3">Ulangi Password Baru</label>
                                <div class="col-md-4">
                                    <input type="password" id="password_ul" class="form-control" name="password_ul"
                                        data-rule-minlength="5"
                                        data-rule-maxlength="15"
                                        data-rule-equalto="#password_br">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="password" class="control-label col-md-3"><b class="require">*</b> Password Lama</label>
                                <div class="col-md-4">
                                    <input type="password" id="password" class="form-control" name="password_lm">
                                    <span class="help-block">Jika Anda setuju dengan perubahan, maka password harus di isi</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan Perubahan</button>
                                    <input type="hidden" name="id" value="1">
                                    <input type="hidden" name="aksi" value="simpan">
                                    <input type="hidden" name="opsi" value="password">
                                </div>
                            </div>
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
			AksiForm1.init({
				formID: $('#formAksi1')
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
}else{
    echo"<div class='row'><div class='col-md-12'><div class='alert alert-info'>Maaf, halaman ini hanya untuk administrator</div></div></div>";
}
?>