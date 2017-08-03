<?php
switch ($_GET['aksi']) {
	default:
		try {
			$admin->beginTransaction();
			$admin->query("SELECT * FROM legalitas");
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
					$tr .= '<th>Nama</th>';
					$tr .= '<th>Nomor</th>';
                    $tr .= '<th>Legalitas</th>';
					$tr .= '<th>Opsi</th>';
				$tr .= '</tr>';
			$tr .= '</thead><tbody>';
			if ( $admin->rowCount() > 0 ):
				foreach ( $admin->fetchAll() as $key ):
					$tr .= "<tr>";
					$tr .= "<td>{$key->idlegalitas}</td>";
					$tr .= "<td>{$key->nama}</td>";
					$tr .= "<td>{$key->nomor}</td>";
                    $tr .= "<td>{$key->legalitas}</td>";					
					$tr .= "<td>";
					$tr .= "<a class='btn btn-xs btn-success' title='Ubah Legalitas' data-toggle='modal' data-target='#myModal' href='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=form&opsi=ubah&id={$key->idlegalitas}'><i class='glyphicon glyphicon-edit'></i></a>";
					$tr .= " ";
					$tr .= "<a class='btn btn-xs btn-danger' title='Hapus Legalitas' data-toggle='modal' data-target='#myModal' href='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=form&opsi=hapus&id={$key->idlegalitas}'><i class='glyphicon glyphicon-remove'></i></a>";
					$tr .= "</td>";
					$tr .= "</tr>";
				endforeach;
			endif;
			$tr .= '</tbody></table><script type="text/javascript">$(document).ready(function(){$(".tabelku").dataTable();});</script>';
		else:
			$tr .= $err_kon;
		endif;
		echo $tr; return;
	break;
	
	case 'hapus':
		try {
			$admin->beginTransaction();
			$admin->query("DELETE FROM legalitas WHERE idlegalitas = :id");
			$admin->bind(":id", $_POST['id']);
			$admin->execute();
			$err['b'] = 'Berhasil';
			$admin->endTransaction();
		} catch ( PDOException $e ) {
			$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penghapusan data2";
		}
		echo json_encode($err, true); return;	
	break;
	
	case 'simpan':
		try {
			$id=$_POST['idlegalitas'];
			$nama=$_POST['nama'];
			$nomor=$_POST['nomor'];
            $legalitas=$_POST['legalitas'];
			$status;
			if($_GET['opsi']=="ubah")
			{
				if(empty($nama)||empty($nomor)||empty($legalitas))
				{
					$err['s'] = 'Lengkapi Data';
				}
				
				else
				{
					$status=1;
					$data="UPDATE legalitas set nama='$nama',nomor='$nomor',legalitas='$legalitas' WHERE idlegalitas = :id";
				}
			}
			else
			{				
				$data="INSERT into legalitas values('','','$nama','$nomor','$legalitas')";			
			}
			
			$admin->beginTransaction();
			if($_GET['opsi']=="ubah")
			{
				if($status==1){
					$admin->query($data);
				}
				$admin->bind(":id", $_POST['id']);
			}
			else
			{
				$admin->query($data);
			}
			$admin->execute();
			$err['b'] = 'Berhasil';
			$admin->endTransaction();
		} catch ( PDOException $e ) {
			$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penyimpanan data3";
		}
		echo json_encode($err, true); return;	
	break;
	

/*
==========================================
		GET DATA HANYA DALAM 1 FILE
==========================================
 */
	case'form':
		$id = $_GET['id'];
		try {
			if($_GET['opsi']=="ubah"||$_GET['opsi']=="hapus")
			{
				$admin->beginTransaction();
				$admin->query("SELECT * FROM legalitas WHERE idlegalitas = :id");
				$admin->bind(":id", $id);
				$admin->execute();
				$row = $admin->fetch();
				$admin->endTransaction();
			}
			?>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">

                </div>
              </div>
            </div>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php if($_GET['opsi']=="ubah"){echo "Ubah Penghargaan";}elseif($_GET['opsi']=="hapus"){echo"Hapus Penghargaan";}else{ echo"Tambah Penghargaan";} ?></h4>
			</div>
			<form action="<?php if($_GET['opsi']=="ubah"){echo"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=simpan&opsi=ubah";}elseif($_GET['opsi']=="hapus"){echo"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=hapus";}else{echo"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=simpan&opsi=tambah";}?>" method="post" id="formAksiHapus" class="form" onsubmit="return false" enctype="multipart/form-data">
				<div class="modal-body">
					<div id="pesan"></div>
                    <?php if($_GET['opsi']=="hapus"){
					echo"<input type='hidden' name='id' value='{$id}'>";
                    echo"Hapus Legalitas id: {$id}, judul: {$row->nama} ?";
					}else{?>
					<table class="table table-bordered table-hover">
						<tbody>
							<?php
							if($_GET['opsi']=="ubah")
							{
								echo"
                            <tr>
								<td>ID</td>
								<td><input type='text' readonly name='id' value='{$row->idlegalitas}' placeholder='ID Legalitas'></td>
							</tr>
                            	";
							}
							?>
							<tr>
								<td><b class="require">*</b>judul</td>
								<td><input type="text" name="nama" value="<?php if($_GET['opsi']=="ubah"){echo $row->nama;} ?>" placeholder="Nama"></td>
							</tr>
                            <tr>
								<td><b class="require">*</b>Nomor</td>
								<td><input type="text" name="nomor" value="<?php if($_GET['opsi']=="ubah"){echo $row->nomor;} ?>" placeholder="Nomor"></td>
							</tr>
                            <tr>
								<td><b class="require">*</b>Legalitas</td>
								<td><textarea type="text" name="legalitas" placeholder="Legalitas"><?php if($_GET['opsi']=="ubah"){echo $row->legalitas;} ?></textarea></td>
							</tr>
						</tbody>
					</table>
                    <?php }?>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php if($_GET['opsi']=="hapus"){echo"Ya";}else{echo"Simpan";}?></button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
				</div>
			</form>
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
			echo $e->getCode() . " : Terjadi ERROR dalam pemanggilan data4";
		}
	break;
}