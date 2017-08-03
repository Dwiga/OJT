<?php
if($adm->iduser==1){
switch( $ak ) {
	default:
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data User</div>
					<div class="panel-body">
                    	<a class="btn btn-primary" title="Tambah User" style="margin-bottom:5px" data-toggle="modal" data-target="#myModal" href="<?php echo $self ?>&aksi=form&opsi=tambah"><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;&nbsp;Tambah User</a>
						<div class="table-responsive"></div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		$(document).ready(function() {
			panggilAjaxTable();
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
		<?php
		break;
}
}else{
	echo"<div class='row'><div class='col-md-12'><div class='alert alert-info'>Maaf, halaman ini hanya untuk administrator</div></div></div>";
}