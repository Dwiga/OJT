<?php
switch($_POST['aksi'])
{
	case'data':
	try{
		$admin->beginTransaction();
		$admin->query("SELECT * FROM model");
		$admin->execute();
		$mdl = $admin->fetch();
		$admin->endTransaction();
	} catch (PDOException $e) {}
	?>
        <div class="form-group">
            <label class="control-label col-md-3" style="text-align:left"><b class="require">*</b> Model</label>
            <div class="col-md-9">
                <textarea id="btl" name="mdl" class="form-control" placeholder="Data Pembatalan" rows="3"><?php echo $mdl->model ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan Perubahan</button>&nbsp;&nbsp;
                <input type="hidden" name="aksi"  value="simpan">
            </div>
        </div>
    <?php
	break;
	case 'simpan':
		$mdl=$_POST['mdl'];
        $nml=$_POST['nml'];
        $nmrl=$_POST['nmrl'];
        $lgl=$_POST['lgl'];
        
        	
		$status;
		// gambar 2 {logo}
		// end gambar
		
		if (empty($mdl)) 
        {
		$err['s'] = 'Lengkapi Data !';
		}
        else
		{
				$admin->query("UPDATE model set model='$mdl' where idmodel=:id");
		}
        if (!isset($err['s'])) {
			try {
				$admin->beginTransaction();
				$admin->query("UPDATE model set model='$mdl' where idmodel=:id");
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