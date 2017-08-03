<?php
switch($_GET['aksi'])
{
		default:
		try {
			$admin->beginTransaction();
			$admin->query("SELECT * FROM cmb ORDER by 'id' DESC");
			$admin->execute();
			$admin->endTransaction();
		} catch ( PDOException $e ) {
			$err_kon .= "<div class='alert alert-danger'>{$e->getCode()} : Terjadi ERROR dalam pemanggilan data</div>";
		}
		if ( !isset($err_kon) ):
			$tr .= '<table class="tabelku table table-bordered table-striped table-hover table-condensed">';
			$tr .= '<thead>';
				$tr .= '<tr>';
					$tr .= '<th>ID</th>';
					$tr .= '<th>Tanggal</th>';
					$tr .= '<th>Status</th>';
					$tr .= '<th>Nama</th>';
					$tr .= '<th>Telpon</th>';
					$tr .= '<th>Jam</th>';
					$tr .= '<th>Alamat</th>';
					$tr .= '<th>Kota</th>';
					$tr .= '<th>Opsi</th>';
				$tr .= '</tr>';
			$tr .= '</thead><tbody>';
			if ( $admin->rowCount() > 0 ):
				foreach ( $admin->fetchAll() as $key ):
					$tr .= "<tr>";
					$tr .= "<td>{$key->idcmb}</td>";
					$tr .= "<td>{$key->tanggal}</td>";
					$tr .= "<td>";
					if($key->status == 0)
					{
						$tr .= "* <i class='glyphicon glyphicon-envelope'></i>";
					}
					else
					{
						$tr .= "<i class='glyphicon glyphicon-folder-open'></i>";
					}
					$tr .= '</td>';
					$tr .= "<td>{$key->nama}</td>";
					$tr .= "<td>{$key->telp}</td>";
					$tr .= "<td>{$key->jam}</td>";
					$tr .= "<td>{$key->alamat}</td>";
					$tr .= "<td>{$key->kota}</td>";
					$tr .= "<td>";
					$tr .= "<a class='btn btn-xs btn-info' title='Lihat CMB' data-toggle='modal' data-target='#myModal' href='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=form&id={$key->idcmb}'><i class='glyphicon glyphicon-eye-open'></i> Lihat CMB</a>";
					$tr .= " ";
					$tr .= "<a class='btn btn-xs btn-danger' title='Hapus CMB' data-toggle='modal' data-target='#myModal' href='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=form&opsi=hapus&id={$key->idcmb}'><i class='glyphicon glyphicon-remove'></i></a>";
					
					$tr .= "</td>";
					$tr .= "</tr>";
				endforeach;
			endif;
			$tr .= '</tbody></table><script type="text/javascript">$(document).ready(function(){$(".tabelku").dataTable();});</script>';
		else:
			$tr .= $err_kon;
		endif;
		echo $tr; return;
		?>
        <?php
	break;
	case 'hapus':
		try {
			$admin->beginTransaction();
			$admin->query("DELETE FROM cmb WHERE idcmb = :id");
			$admin->bind(":id", $_POST['id']);
			$admin->execute();
			$err['b'] = 'Berhasil';
			$admin->endTransaction();
		} catch ( PDOException $e ) {
			$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penghapusan data2";
		}
		echo json_encode($err, true); return;	
	break;
	case 'baca':
		try {
			$admin->beginTransaction();
			$admin->query("UPDATE cmb set status='1' WHERE idcmb = :id");
			$admin->bind(":id", $_POST['id']);
			$admin->execute();
			$err['b'] = 'Telah Terbaca';
			$admin->endTransaction();
		} catch ( PDOException $e ) {
			$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penyimpanan data 2";
			//$err_kon .= "<div class='alert alert-danger'>{$e->getCode()} : Terjadi ERROR dalam pemanggilan data</div>";
		}
		echo json_encode($err, true); return;	
	break;
	case'form':
		$id = $_GET['id'];
		try {
				$admin->beginTransaction();
				$admin->query("SELECT * FROM cmb WHERE idcmb = :id");
				$admin->bind(":id", $id);
				$admin->execute();
				$row = $admin->fetch();
				$admin->endTransaction();
			?>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">

                </div>
              </div>
            </div>
			<?php if($_GET['opsi']=="hapus"){?>
			<form action="<?php if($_GET['opsi']=="hapus"){echo"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=hapus";}?>" method="post" id="formAksiHapus" class="form" onsubmit="return false" enctype="multipart/form-data">
				<div class="modal-header">
				<button type="submit" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
				<h4 class="modal-title" id="myModalLabel">Hapus CMB</strong></h4>
				</div>
				<div class="modal-body">
					<div id="pesan"></div>
                    <?php if($_GET['opsi']=="hapus"){
					echo"<input type='hidden' name='id' value='{$id}'>";
                    echo"Hapus cmb id: {$id}, nama: {$row->nama} ?";
					}?>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php if($_GET['opsi']=="hapus"){echo"Ya";}else{echo"Simpan";}?></button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
				</div>
			</form>
			<?php }else{ ?>
            <form action="<?php echo $self."&aksi=baca" ?>" method="post" id="formAksiHapus" class="form" onsubmit="return false" enctype="multipart/form-data">
			<div class="modal-header">
				<button type="submit" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
				<h4 class="modal-title" id="myModalLabel">CMB dari <strong style="color:#F00"><?php echo $row->nama ?></strong></h4>
			</div>
				<div class="modal-body">
					<div id="pesan"></div>
					<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
							<div class="form-group">
								<label class="label-control col-md-3">Tanggal</label>
								<div class="col-md-9">
									<label class=""><?php echo $row->tanggal ?></label>
                                    <input type="hidden" name="id" value="<?php echo $id ?>" />
								</div>
							</div>
                            <div class="form-group">
								<label class="label-control col-md-3">Telpon</label>
								<div class="col-md-9">
									<label class=""><?php echo $row->telp ?></label>
								</div>
							</div>
                            <div class="form-group">
								<label class="label-control col-md-3">Jam</label>
								<div class="col-md-9">
									<label class=""><?php echo $row->jam ?></label>
								</div>
							</div>
							<div class="form-group">
								<label class="label-control col-md-3">Alamat</label>
								<div class="col-md-9">
									<label class=""><?php echo $row->alamat ?></label>
								</div>
							</div>
							<div class="form-group">
								<label class="label-control col-md-3">Kota</label>
								<div class="col-md-9">
									<label class=""><?php echo $row->kota ?></label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-4 col-md-8">
								</div>
							</div>
					</div>
					<div class="panel-footer">
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
				</div>
				<div class="modal-footer">
                	<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-folder-close"></i>&nbsp;&nbsp;Tutup</button>
				</div>
			</form>
			<?php } ?>
			<script type="text/javascript">
			$(document).ready(function() {
				AksiForm.init({
					formID: $('#formAksiHapus'),
					modalID: $('#myModal'),
				}, panggilAjaxTable);
				$('.fileinput').fileinput();
			});
			</script>
			<?php
		} catch ( PDOException $e ) {
			echo $e->getCode() . " : Terjadi ERROR dalam pemanggilan data 4";
		}
	break;
}
?>