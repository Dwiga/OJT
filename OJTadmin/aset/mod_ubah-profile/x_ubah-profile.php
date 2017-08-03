<?php
switch($_POST['aksi'])
{
	case'data':
		try {
		$admin->beginTransaction();
		$admin->query("SELECT * FROM user WHERE iduser = :id");
		$admin->bind(":id", $_SESSION['id']);
		$row = $admin->fetch();
		$admin->endTransaction();		
		} catch (PDOException $e) {}
	?>
		
        <div class="form-group">
            <label class="control-label col-md-3"><b class="require">*</b> Username</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="user" value="<?php echo $row->user ?>" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3"><b class="require">*</b> Nama</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="nama" value="<?php echo $row->nama ?>" placeholder="Nama">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Foto</label>
			<div class="col-md-9">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;">
                    <?php echo"<img src='{$row->poto}' style='width:100px;height:90px;'>"; ?>
                    </div>
                <div>
                        <span class="btn btn-success btn-file"><span class="fileinput-new">Pilih Gambar/</span><span class="fileinput-exists">Ganti</span><input type="file" name="foto"></span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                    </div>
                </div>
                <span class="help-block">* Harus ber-extensi (.PNG / .JPG) dan maksimal 1MB</span>
			</div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan Perubahan</button>
                <input type="hidden" name="id" value="<?php echo $row->iduser ?>">
                <input type="hidden" name="fotolama" value="<?php echo $row->poto ?>">
                <input type="hidden" name="aksi" value="simpan">
                <input type="hidden" name="opsi" value="user">
            </div>
        </div>
    <?php
	break;
	case 'simpan':
		try {
				$user=$_POST['user'];
				$nama=$_POST['nama'];				
				$gambar2_tmp		 = $_FILES['foto']['tmp_name'];
				$gambar2_name		= $_FILES['foto']['name'];
				$gambar2_size		= $_FILES['foto']['size'];
				$extensi2			= pathinfo($gambar2_name, PATHINFO_EXTENSION);
				$allowed_file2	   = array('png', 'jpg');
				$detected_file2	  = !empty($gambar2_tmp) ? $extensi2:'';
				$direktori = "images/users/$gambar2_name";
					$admin->beginTransaction();
					$admin->query("SELECT * FROM user WHERE iduser = :id");
					$admin->bind(":id",$_SESSION['id']);
					$row1 = $admin->fetch();
					$admin->endTransaction();
			
			if($_POST['opsi']=="user")
			{
				if(empty($nama)||empty($user))
				{
					$err['s'] = 'Lengkapi Data';
				}
				else
				{
					if(!empty($gambar2_name))
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
				$passbaru=md5($_POST['password_br']);
				$passulang=md5($_POST['password_ul']);
				$passlama=md5($_POST['password_lm']);
				if(empty($passbaru)||empty($passulang)||empty($passlama))
				{
					$err['s'] = 'Lengkapi Data';
				}
				else
				{
					if($passbaru!=$passulang){
						$err['s'] = 'Password tidak sama';
					}elseif($passlama!=$row1->password){
						$err['s'] = 'Password lama salah';
					}else{
						$data="UPDATE user set password='$passbaru' WHERE iduser = :id";
					}
				}
			}
			
			if(!isset($err['s']))
			{
				$admin->beginTransaction();
				if($_POST['opsi']=="user")
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
					$admin->query($data);
					$admin->bind(":id", $_SESSION['id']);
				}
				$admin->execute();
				$err['b'] = 'Berhasil';
				$admin->endTransaction();
			}
		} catch ( PDOException $e ) {
			$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penyimpanan data";
		}
		echo json_encode($err, true); return;	
	break;
}
?>