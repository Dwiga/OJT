<?php
switch ($ak) {
	default:
		?>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Slide Show</div>
                <div class="panel-body">
                    <form action="<?php echo $self."&aksi=simpan&opsi=tambah" ?>" method="post" id="formAksi" class="form-horizontal" enctype="multipart/form-data">
                        <div id="pesan"></div>
                        <div class="form-group">
                            <label for="keterangan" class="label-control col-md-4"><b class="require">*</b> Keterangan Slide</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="keterangan" name="ket">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="label-control col-md-4"><b class="require">*</b> Gambar Slide</label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-success btn-file"><span class="fileinput-new">Pilih Gambar/</span><span class="fileinput-exists">Ganti</span><input id="gambar" type="file" name="gambar"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                    </div>
                                </div>
                                <span class="help-block">* Max 3mb (.jpg) atau (.png)</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-8">
                                <button class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <span class="help-block"><b class="require">*</b> ) Menandakan inputan tidak boleh kosong</span>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data Slideshow</div>
					<div class="panel-body">
						<div class="table-responsive"></div>
					</div>
                    <div class="panel-footer">* Refresh halaman setelah dirubah/diedit.</div>
				</div>
			</div>
		</div>
	</div>

		<script type="text/javascript">
		$(document).ready(function() {
			AksiForm.init({
				formID: $('#formAksi')
			}, panggilAjaxTable);
			panggilAjaxTable();
			$('.fileinput').fileinput();
		});
		function panggilAjaxTable() {
			TableAjax.init({
				tableID: $('.table-responsive'),
				dataTable: "<?php echo $go ?>",
				url: "<?php echo $self ?>"
			});
			return;
		};
		</script>
         	<script type="text/javascript">
			$(function(){
				// fancybox
				$(".fancybox").fancybox({
					openEffect : 'elastic',
					closeEffect : 'elastic',
					nextEffect : 'elastic',
					prevEffect : 'elastic'
				});
			});
			</script>
		<?php
		break;
}
?>