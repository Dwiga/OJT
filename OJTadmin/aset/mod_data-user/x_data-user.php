<?php
switch ($_GET['aksi']) {
	default:
		try {
			$admin->beginTransaction();
			$admin->query("SELECT * FROM user");
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
					$tr .= '<th>UserName</th>';
					$tr .= '<th>Opsi</th>';
				$tr .= '</tr>';
			$tr .= '</thead><tbody>';
			if ( $admin->rowCount() > 0 ):
				foreach ( $admin->fetchAll() as $key ):
					$tr .= "<tr>";
					$tr .= "<td>{$key->iduser}</td>";
					$tr .= "<td>{$key->nama}</td>";
					$tr .= "<td>{$key->user}</td>";
					$tr .= "<td>";
					$tr .= "<a class='btn btn-xs btn-success' title='Ubah User' data-toggle='modal' data-target='#myModal' href='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=form&opsi=ubah&id={$key->iduser}'><i class='glyphicon glyphicon-edit'></i></a>";
					$tr .= " ";
					$tr .= "<a class='btn btn-xs btn-danger' title='Hapus User' data-toggle='modal' data-target='#myModal' href='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=form&opsi=hapus&id={$key->iduser}'><i class='glyphicon glyphicon-remove'></i></a>";
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
			unlink($_POST['hpsft']);
			if($_POST['id']==1)
			{
				$err['s'] = 'Id 1 tidak boleh dihapus';
			}else{
			$admin->query("DELETE FROM user WHERE iduser = :id");
			$admin->bind(":id", $_POST['id']);}
			$admin->execute();
			$err['b'] = 'Berhasil';
			$admin->endTransaction();
		} catch ( PDOException $e ) {
			$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penghapusan data";
			//$err_kon .= "<div class='alert alert-danger'>{$e->getCode()} : Terjadi ERROR dalam pemanggilan data</div>";
		}
		echo json_encode($err, true); return;	
	break;
	
	case 'simpan':
		try {
			$nama=$_POST['nama'];			
			$user=$_POST['user'];
			$pass=md5($_POST['pass']);
			$gambar2_tmp		 = $_FILES['foto']['tmp_name'];
			$gambar2_name		= $_FILES['foto']['name'];
			$gambar2_size		= $_FILES['foto']['size'];
			$extensi2			= pathinfo($gambar2_name, PATHINFO_EXTENSION);
			$allowed_file2	   = array('png', 'jpg');
			$detected_file2	  = !empty($gambar2_tmp) ? $extensi2:'';
			$direktori = "images/users/$gambar2_name";
			$status;
			if($_GET['opsi']=="ubah")
			{
				if(empty($nama)||empty($user)||empty($pass))
				{
					$err['s'] = 'Lengkapi Data';
				}
				else
				{
						if($gambar2_name!="")
						{
						if (!in_array($detected_file2, $allowed_file2)) {
							$err['s'] = 'File gambar logo di anjurkan PNG atau JPG';
						} else if ($gambar2_size > 1000000) {
							$err['s'] = 'File gambar logo lebih besar dari 1MB';
						} else {
							$status=1;
							$data="UPDATE user set nama='$nama',user='$user',poto='$direktori' WHERE iduser = :id";
						}
					}
					else
					{
							$status=0;
							$data="UPDATE user set nama='$nama',user='$user' WHERE iduser = :id";
					}
				}
			}
			else
			{
				if (!in_array($detected_file2, $allowed_file2)) {
					$err['s'] = 'File gambar logo di anjurkan PNG atau png';
				} else if ($gambar2_size > 1000000) {
					$err['s'] = 'File gambar logo lebih besar dari 1MB';
				} else {
					$data="INSERT into user values('','$user','$nama','$pass','$direktori')";
				}
			}
			
			$admin->beginTransaction();
			if($_GET['opsi']=="ubah")
			{
				if($status==1){
					unlink($_POST['fotolama']);
					move_uploaded_file($gambar2_tmp,$direktori);
					$admin->query($data);
				}else{
					$admin->query($data);
				}
				$admin->bind(":id", $_POST['id']);
			}
			else
			{
				move_uploaded_file($gambar2_tmp,$direktori);
				$admin->query($data);
			}
			$admin->execute();
			$err['b'] = 'Berhasil';
			$admin->endTransaction();
		} catch ( PDOException $e ) {
			$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penyimpanan data";
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
				$admin->query("SELECT * FROM user WHERE iduser = :id");
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
				<h4 class="modal-title" id="myModalLabel"><?php if($_GET['opsi']=="ubah"){echo "Ubah User";}elseif($_GET['opsi']=="hapus"){echo"Hapus User";}else{ echo"Tambah User";} ?></h4>
			</div>
			<form action="<?php if($_GET['opsi']=="ubah"){echo"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=simpan&opsi=ubah";}elseif($_GET['opsi']=="hapus"){echo"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=hapus";}else{echo"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=simpan&opsi=tambah";}?>" method="post" id="formAksiHapus" class="form" onsubmit="return false" enctype="multipart/form-data">
				<div class="modal-body">
					<div id="pesan"></div>
                    <?php if($_GET['opsi']=="hapus"){
					echo"<input type='hidden' name='id' value='{$id}'>";
                    echo"Hapus user id: {$id}, nama: {$row->nama}, Username: {$row->user} ?";
					echo"<input type='hidden' name='hpsft' value='{$row->poto}'>";
					}else{?>
					<table class="table table-bordered table-hover">
						<tbody>
							<?php
							if($_GET['opsi']=="ubah")
							{
								echo"
                            <tr>
								<td>ID</td>
								<td><input type='text' readonly name='id' value='{$row->iduser}' placeholder='ID User'></td>
							</tr>
                            	";
							}
							?>
							<tr>
								<td><b class="require">*</b>Nama</td>
								<td><input type="text" name="nama" value="<?php if($_GET['opsi']=="ubah"){echo $row->nama;} ?>" placeholder="Nama User"></td>
							</tr>
                            <tr>
								<td><b class="require">*</b>UserName</td>
								<td><input type="text" name="user" value="<?php if($_GET['opsi']=="ubah"){echo $row->user;} ?>" placeholder="UserName"></td>
							</tr>
							<?php if($_GET['opsi']=="tambah"){ ?>
                            <tr>
								<td><b class="require">*</b>Password</td>
								<td><input id="passku" type="password" data-rule-minlength="5" data-rule-maxlength="15" name="pass" value="<?php if($_GET['opsi']=="ubah"){echo $row->password;} ?>" placeholder="Password"></td>
							</tr>
							<tr>
								<td><b class="require">*</b>Ulangi Password</td>
								<td><input type="password" data-rule-minlength="5" data-rule-maxlength="15" data-rule-equalto="#passku" name="pass1" value="<?php if($_GET['opsi']=="ubah"){echo $row->password;} ?>" placeholder="Ulangi Password"></td>
							</tr>
							<?php } ?>
                            <tr>
                            	<td><b class="require">*</b>Foto</td>
                                <td>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;">
                                    <?php if($_GET['opsi']=="ubah"){ echo"<img src='{$row->poto}' style='width:95px;height:90px;'>"; } ?>
                                    </div>
                                	<div>
                                        <span class="btn btn-success btn-file"><span class="fileinput-new">Pilih Gambar/</span><span class="fileinput-exists">Ganti</span><input id="gambar_icon" type="file" name="foto"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                    </div>
                                    <span class="help-block">* Harus ber-extensi (.PNG / .JPG) dan maksimal 2MB</span>
                                </div>
                                <input type="hidden" name="fotolama" value="<?php echo $row->poto ?>">
                                </td>
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
			echo $e->getCode() . " : Terjadi ERROR dalam pemanggilan data";
		}
	break;
}