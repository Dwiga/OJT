<?php
switch($_POST['aksi'])
{
	case'data':
	try{
		$admin->beginTransaction();
		$admin->query("SELECT * FROM profil WHERE idprofil = :id");
		$admin->bind(":id", 1);
		$admin->execute();
		$row = $admin->fetch();
		$admin->endTransaction();
	} catch (PDOException $e) {}
	?>
		<div class="form-group">
            <label class="control-label col-md-3" style="text-align:left"><b class="require">*</b> Alamat</label>
            <div class="col-md-9">
                <input id="data" name="alamat" class="form-control" placeholder="Alamat perusahaan" type="text" value="<?php echo $row->alamat ?>">
            </div>
        </div>
		<div class="form-group">
            <label class="control-label col-md-3" style="text-align:left"><b class="require">*</b> E-mail</label>
            <div class="col-md-9">
                <input id="data" name="email" class="form-control" placeholder="E-mail perusahaan" type="email" value="<?php echo $row->email ?>">
            </div>
        </div>
		<div class="form-group">
            <label class="control-label col-md-3" style="text-align:left"><b class="require">*</b> Telpon</label>
            <div class="col-md-9">
                <input id="data" name="telpon" class="form-control" placeholder="Telpon perusahaan" type="text" value="<?php echo $row->telp ?>">
            </div>
        </div>
		<div class="form-group">
            <label class="control-label col-md-3" style="text-align:left"><b class="require">*</b> Deskripsi</label>
            <div class="col-md-9">
                <textarea id="data" name="deskripsi" class="form-control" placeholder="Deskripsi perusahaan" rows="3"><?php echo $row->deskripsi ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" style="text-align:left"><b class="require">*</b> Data Tambahan</label>
            <div class="col-md-9">
                <textarea id="data" name="data" class="form-control" placeholder="Data perusahaan" rows="3"><?php echo $row->tambahan ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan Perubahan</button>
                <input type="hidden" name="aksi"  value="simpan">
            </div>
        </div>
    <?php
	break;
	case 'simpan':
		$alamat=$_POST['alamat'];
		$email=$_POST['email'];
		$deskripsi=$_POST['deskripsi'];
		$telpon=$_POST['telpon'];
		$tambahan=$_POST['data'];
		if (!isset($err['s'])) {
			try {
				$admin->beginTransaction();
				$admin->query("UPDATE profil set alamat='$alamat',email='$email',deskripsi='$deskripsi',telp='$telpon',tambahan='$tambahan' WHERE idprofil = :id");
				$admin->bind(":id", 1);
				$admin->execute();
				$admin->endTransaction();
				$err['b'] = 'Berhasil disimpan';
			} catch (PDOException $e) {
				$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penyimpanan data";
			}
		}	
	echo json_encode($err,true);exit;
	break;
}
?>