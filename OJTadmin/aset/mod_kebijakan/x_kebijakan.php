<?php
switch($_POST['aksi'])
{
	case'data':
	try{
		$admin->beginTransaction();
		$admin->query("SELECT * FROM kebijakan WHERE idkebijakan = :id");
		$admin->bind(":id", 1);
		$admin->execute();
		$row = $admin->fetch();
		$admin->endTransaction();
	} catch (PDOException $e) {}
	?>
        <div class="form-group">
            <label class="control-label col-md-3" style="text-align:left"><b class="require">*</b> Pembatalan</label>
            <div class="col-md-9">
                <textarea id="btl" name="btl" class="form-control" placeholder="Data Pembatalan" rows="3"><?php echo $row->pembatalan ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" style="text-align:left"><b class="require">*</b> Slippage</label>
            <div class="col-md-9">
                <textarea id="slp" name="slp" class="form-control" placeholder="Data Slippage" rows="3"><?php echo $row->slippage ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" style="text-align:left"><b class="require">*</b> BAS</label>
            <div class="col-md-9">
                <textarea id="bas" name="bas" class="form-control" placeholder="Data Bid, Ask dan Spread" rows="3"><?php echo $row->bas ?></textarea>
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
		$btl=$_POST['btl'];
        $slp=$_POST['slp'];
        $bas=$_POST['bas'];
        
        	
		$status;
		// gambar 2 {logo}
		// end gambar
		
		if (empty($btl) ||empty($slp)||empty($bas)) 
        {
		$err['s'] = 'Lengkapi Data !';
		}
        else
		{
				$admin->query("UPDATE kebijakan set pembatalan='$btl',slippage='$slp',bas='$bas' where idkebijakan=:id");
		}
        if (!isset($err['s'])) {
			try {
				$admin->beginTransaction();
				$admin->query("UPDATE kebijakan set pembatalan='$btl',slippage='$slp',bas='$bas' where idkebijakan=:id");
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