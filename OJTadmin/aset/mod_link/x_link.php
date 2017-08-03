<?php
switch($_POST['aksi'])
{
	case'data':
	try{
		$admin->beginTransaction();
		$admin->query("SELECT * FROM link WHERE idlink = :id");
		$admin->bind(":id", 1);
		$admin->execute();
		$row = $admin->fetch();
		$admin->endTransaction();
	} catch (PDOException $e) {}
	case'data':
	try{
		$admin->beginTransaction();
		$admin->query("SELECT * FROM link WHERE idlink = :id");
		$admin->bind(":id", 2);
		$admin->execute();
		$rows = $admin->fetch();
		$admin->endTransaction();
	} catch (PDOException $e) {}
	?>                        
                        <div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b> Desktop Terminal</label>
                            <div class="col-md-5"><input type="text" class="form-control col-md-4" id="dester" name="dester" placeholder="Link Download Desktop Terminal" value="<?php echo $row->dester ?>"></div>                            
                        </div>
						<div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b>Keterangan Desktop Terminal</label>
                            <div class="col-md-5"><textarea class="form-control col-md-4" id="kdester" name="kdester" placeholder="Link Download Desktop Terminal"><?php echo $rows->dester ?></textarea></div>                            
                        </div>
						<div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b> Desktop Multi</label>
                            <div class="col-md-5"><input type="text" class="form-control" id="desmul" name="desmul" placeholder="Link Download Desktop Multi" value="<?php echo $row->desmul ?>"> </div>                            
                        </div>
						<div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b>Keterangan Desktop Multi</label>
                            <div class="col-md-5"><textarea class="form-control" id="kdesmul" name="kdesmul" placeholder="Link Download Desktop Multi"><?php echo $rows->desmul ?></textarea> </div>                            
                        </div>
						<div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b> Android</label>
                            <div class="col-md-5"><input type="text" class="form-control" id="android" name="android" placeholder="Link Download Android" value="<?php echo $row->android ?>"></div>                            
                        </div>
						<div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b>Keterangan Android</label>
                            <div class="col-md-5"><textarea class="form-control" id="kandroid" name="kandroid" placeholder="Link Download Android"><?php echo $rows->android ?></textarea></div>                            
                        </div>
                        <div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b> Mobile Terminal</label>
                            <div class="col-md-5"><input type="text" class="form-control" name="mobter" name="mobter" placeholder="Link Download Mobile Terminal" value="<?php echo $row->mobter ?>"></div>                            
                        </div>
						<div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b>Keterangan Mobile Terminal</label>
                            <div class="col-md-5"><textarea class="form-control" name="kmobter" name="kmobter" placeholder="Link Download Mobile Terminal"><?php echo $rows->mobter ?></textarea></div>                            
                        </div>
                        <div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b> SmartPhone</label>
                            <div class="col-md-5"><input type="text" class="form-control" id="smart" name="smart" placeholder="Link Download SmartPhone" value="<?php echo $row->smart ?>"></div>                            
                        </div>
						<div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b>Keterangan SmartPhone</label>
                            <div class="col-md-5"><textarea class="form-control" id="ksmart" name="ksmart" placeholder="Link Download SmartPhone"><?php echo $rows->smart ?></textarea></div>                            
                        </div>
                        <div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b> Panduan Pembukaan akun</label>
                            <div class="col-md-5"><input type="text" class="form-control" id="panbuk" name="panbuk" placeholder="Link Panduan Pembukaan Akun" value="<?php echo $row->panbuk ?>"></div>                            
                        </div>
                        <div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b> Panduan Deposit</label>
                            <div class="col-md-5"><input type="text" class="form-control" id="pandep" name="pandep" placeholder="Link Panduan Deposit" value="<?php echo $row->pandep ?>"></div>                            
                        </div>
                        <div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b> Buka Akun Real</label>
                            <div class="col-md-5"><input type="text" class="form-control" id="bar" name="bar" placeholder="Link Buka Akun Real" value="<?php echo $row->bar ?>"></div>                            
                        </div>
                        <div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b> Top Trader</label>
                            <div class="col-md-5"><input type="text" class="form-control" id="tt" name="tt" placeholder="Link Top Trader" value="<?php echo $row->tt ?>"></div>                            
                        </div>
                        <div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b> Injection & Widrawal VIF</label>
                            <div class="col-md-5"><input type="text" class="form-control" id="iwv" name="iwv" placeholder="Link injection & widrawal" value="<?php echo $row->iwv ?>"></div>                            
                        </div>
                        <div class="form-group">
                            <label class="label-control col-md-4"><b class="require">*</b> injectiin & widrawal Milenium</label>
                            <div class="col-md-5"><input type="text" class="form-control" id="iwm" name="iwm" placeholder="Link injection milenium" value="<?php echo $row->iwm ?>"></div>                            
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-8">
                                <button class="btn btn-primary"><i class="glyphicon glyphicon-save"></i>&nbsp;&nbsp;Simpan</button>
                                <input type="hidden" name="aksi"  value="simpan">
                            </div>
                        </div>
    <?php
	break;
	case 'simpan':
		$dester=$_POST['dester'];
        $desmul=$_POST['desmul'];
        $android=$_POST['android'];
        $mobter=$_POST['mobter'];
        $smart=$_POST['smart'];
		$kdester=$_POST['kdester'];
        $kdesmul=$_POST['kdesmul'];
        $kandroid=$_POST['kandroid'];
        $kmobter=$_POST['kmobter'];
        $ksmart=$_POST['ksmart'];
        $panbuk=$_POST['panbuk'];
        $pandep=$_POST['pandep'];
        $bar=$_POST['bar'];
        $tt=$_POST['tt'];
        $iwv=$_POST['iwv'];
        $iwm=$_POST['iwm'];
        
        	
		$status;
		if (empty($dester)||empty($desmul)||empty($android)||empty($mobter)||empty($smart)||empty($panbuk)||empty($pandep)||empty($bar)||empty($tt)||empty($iwv)||empty($iwm)) 
        {
		$err['s'] = 'Lengkapi Data !';
		}
        else
		{
				$admin->query("UPDATE link set dester='$dester',desmul='$desmul',android='$android',mobter='$mobter',smart='$smart',panbuk='$panbuk',pandep='$pandep',bar='$bar',tt='$tt',iwv='$iwv',iwm='$iwm' where idlink=:id");
		}
        if (!isset($err['s'])) {
			try {
				$admin->beginTransaction();
				$admin->query("UPDATE link set dester='$dester',desmul='$desmul',android='$android',mobter='$mobter',smart='$smart',panbuk='$panbuk',pandep='$pandep',bar='$bar',tt='$tt',iwv='$iwv',iwm='$iwm' where idlink=:id");
				$admin->bind(":id", 1);
				$admin->execute();
				$admin->endTransaction();
				$err['b'] = 'Berhasil disimpan';
			} catch (PDOException $e) {
				$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penyimpanan data";
			}
			try {
				$admin->beginTransaction();
				$admin->query("UPDATE link set dester='$kdester',desmul='$kdesmul',android='$kandroid',mobter='$kmobter',smart='$ksmart' where idlink=:id");
				$admin->bind(":id", 2);
				$admin->execute();
				$admin->endTransaction();
			} catch (PDOException $e) {
				$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penyimpanan data";
			}
		}
	echo json_encode($err,true);exit;
	break;
}
?>