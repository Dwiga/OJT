<?php
switch($_GET['aksi'])
{
		default:
		try {
			$admin->beginTransaction();
			$admin->query("SELECT * FROM slideshow");
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
					$tr .= '<th>Gambar</th>';
					$tr .= '<th>Keterangan</th>';
					$tr .= '<th>Opsi</th>';
				$tr .= '</tr>';
			$tr .= '</thead><tbody>';
			if ( $admin->rowCount() > 0 ):
				foreach ( $admin->fetchAll() as $key ):
					$tr .= "<tr>";
					$tr .= "<td>{$key->idslide}</td>";
					$tr .= "<td><img src='{$key->gambar}' style='width:25px;height:25px'>&nbsp;&nbsp;<a href='{$key->gambar}' title='Lihat Slide' class='fancybox btn-sm btn-success' role='button'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
					$tr .= "<td>{$key->keterangan}</td>";
					$tr .= "<td>";
					if($key->status == 0)
					{
						$tr .= "<a class='btn btn-xs btn-info' title='Stop/Start Slide' data-toggle='modal' data-target='#myModal' href='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=form&opsi=aktivasi&id={$key->idslide}'><i class='glyphicon glyphicon-play'></i></a>";
					}
					else
					{
						$tr .= "<a class='btn btn-xs btn-warning' title='Stop/Start Slide' data-toggle='modal' data-target='#myModal' href='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=form&opsi=aktivasi&id={$key->idslide}'><i class='glyphicon glyphicon-stop'></i></a>";
					}
					$tr .= " ";
					$tr .= "<a class='btn btn-xs btn-success' title='Ubah Slide' data-toggle='modal' data-target='#myModal' href='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=form&opsi=ubah&id={$key->idslide}'><i class='glyphicon glyphicon-edit'></i></a>";
					$tr .= " ";
					$tr .= "<a class='btn btn-xs btn-danger' title='Hapus Slide' data-toggle='modal' data-target='#myModal' href='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}&aksi=form&opsi=hapus&id={$key->idslide}'><i class='glyphicon glyphicon-remove'></i></a>";
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
	case 'aktivasi':
		try {
			$admin->beginTransaction();
			if($_POST['status']==0){$data="update slideshow set status='1' WHERE idslide = :id";}
			else{$data="update slideshow set status='0' WHERE idslide = :id";}
			$admin->query($data);
			$admin->bind(":id", $_POST['id']);
			$admin->execute();
			$err['b'] = 'Berhasil';
			$admin->endTransaction();
		} catch ( PDOException $e ) {
			$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penghapusan data";
			//$err_kon .= "<div class='alert alert-danger'>{$e->getCode()} : Terjadi ERROR dalam pemanggilan data</div>";
		}
		echo json_encode($err, true); return;	
	break;
	case 'hapus':
		try {
			$admin->beginTransaction();
			unlink($_POST['hpsft']);
			$admin->query("DELETE FROM slideshow WHERE idslide = :id");
			$admin->bind(":id", $_POST['id']);
			$admin->execute();
			$err['b'] = 'Berhasil';
			$admin->endTransaction();
		} catch ( PDOException $e ) {
			$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penghapusan data";
		}
		echo json_encode($err, true); return;	
	break;
	case'simpan':
		$ket=$_POST['ket'];
		$gambar2_tmp		 = $_FILES['gambar']['tmp_name'];
		$gambar2_name		= $_FILES['gambar']['name'];
		$gambar2_size		= $_FILES['gambar']['size'];
		$extensi2			= pathinfo($gambar2_name, PATHINFO_EXTENSION);
		$allowed_file2	   = array('png', 'jpg');
		$detected_file2	  = !empty($gambar2_tmp) ? $extensi2:'';
		if($_GET['opsi']=="tambah")
		{
			$admin->beginTransaction();
			$admin->query("SELECT * FROM slideshow");
			$admin->execute();
			$admin->endTransaction();
			$jumlah=$admin->rowCount()+1;
			$namabaru= 'slide'. $jumlah .'.'. $extensi2;
			if(empty($ket)||empty($gambar2_name))
			{
				$err['s'] = 'Lengkapi Data';
			}
			else
			{
				if (!in_array($detected_file2, $allowed_file2)) {
					$err['s'] = 'File gambar logo di anjurkan PNG atau JPG';
				} else if ($gambar2_size > 3000000) {
					$err['s'] = 'File gambar logo lebih besar dari 3MB';
				} else {
					$data="insert into slideshow values('','','images/slideshow/$namabaru','$ket','0')";
				}
			}
		}
		else
		{
			$namabaru= substr($_POST['gambarlama'],18,strlen($_POST['gambarlama'])-21). $extensi2;
			if(empty($ket))
			{
				$err['s'] = 'Lengkapi Data';
			}
			else
			{
				if(empty($gambar2_name))
				{
					$status=0;
					$data="update slideshow set keterangan='$ket' where idslide= :id";
				}
				else 
				{
					if (!in_array($detected_file2, $allowed_file2)) {
						$err['s'] = 'File gambar logo di anjurkan PNG atau JPG';
					} else if ($gambar2_size > 3000000) {
						$err['s'] = 'File gambar logo lebih besar dari 3MB';
					} else {
						$status=1;
						$data="update slideshow set keterangan='$ket',gambar='images/slideshow/$namabaru' where idslide= :id";
					}
				}
			}
		}
		if (!isset($err['s'])) {
			try {
				$admin->beginTransaction();
				if($_GET['opsi']=="tambah")
				{
					@move_uploaded_file($gambar2_tmp, "images/slideshow/{$namabaru}");
					$admin->query($data);
				}
				else if($_GET['opsi']=="ubah")
				{
					if($status==0)
					{
						$admin->query($data);
					}
					elseif($status==1)
					{
						unlink("../{$_POST['gambarlama']}");
						@move_uploaded_file($gambar2_tmp, "images/slideshow/{$namabaru}");
						$admin->query($data);
					}
					$admin->bind(":id", $_POST['id']);
				}
				$admin->execute();
				$admin->endTransaction();
				$err['b'] = 'Berhasil disimpan';
			} catch (PDOException $e) {
				$err['s'] = $e->getCode() . " : Terjadi ERROR dalam penyimpanan data";
			}
		}
	echo json_encode($err, true); exit;
	break;
	case'form':
		$id = $_GET['id'];
		try {
				$admin->beginTransaction();
				$admin->query("SELECT * FROM slideshow WHERE idslide = :id");
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
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php if($_GET['opsi']=="ubah"){echo "Ubah Slideshow";}elseif($_GET['opsi']=="hapus"){echo"Hapus Slideshow";}else{echo"Aktivasi Slideshow";} ?></h4>
			</div>
			<form action="<?php if($_GET['opsi']=="ubah"){echo $self."&aksi=simpan&opsi=ubah";}elseif($_GET['opsi']=="hapus"){echo $self."&aksi=hapus";}elseif($_GET['opsi']=="aktivasi"){echo $self."&aksi=aktivasi";}?>" method="post" id="formAksiHapus" class="form" onsubmit="return false" enctype="multipart/form-data">
				<div class="modal-body">
					<div id="pesan"></div>
                    <?php if($_GET['opsi']=="hapus"){
						echo"<input type='hidden' name='id' value='{$id}'>";
						echo"<img src='$row->gambar' style='width:150px;height:100px:border;border:thin #FFF solid;border-radius:5px'>&nbsp;&nbsp;Hapus Slideshow : $row->idslide ?";
						echo"<input type='hidden' name='hpsft' value='{$row->gambar}'>";
					}elseif($_GET['opsi']=="aktivasi"){
						echo"<input type='hidden' name='id' value='{$id}'>";
						if($row->status==0){
							echo"<img src='$row->gambar' style='width:150px;height:100px;border:thin #FFF solid;border-radius:5px'>&nbsp;&nbsp;Aktivkan Slideshow : $row->idslide ?";
						}else{
							echo"<img src='$row->gambar' style='width:150px;height:100px;border:thin #FFF solid;border-radius:5px'>&nbsp;&nbsp;NON Aktivkan Slideshow : $row->idslide ?";
						}
						echo"<input type='hidden' name='status' value='{$row->status}'>";
					}else{?>
					<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
							<div class="form-group">
								<label for="keterangan" class="label-control col-md-4"><b class="require">*</b> Keterangan Slide</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="keterangan" name="ket" value="<?php echo $row->keterangan ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="gambar" class="label-control col-md-4"><b class="require">*</b> Gambar Slide</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 100px;"><img src="<?php echo "".$row->gambar ?>" style="width:195px;height:90px"></div>
										<div>
											<span class="btn btn-success btn-file"><span class="fileinput-new">Pilih Gambar</span><span class="fileinput-exists">Ganti</span><input id="gambar" type="file" name="gambar"></span>
											<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
										</div>
									</div>
									<span class="help-block">* Max 3mb (.jpg) atau (.png)</span>
									<span class="help-block">** Ukuran yang di tentukan 800x400 pixel</span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-4 col-md-8">
									<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="gambarlama" value="<?php echo $row->gambar ?>">
								</div>
							</div>
					</div>
					<div class="panel-footer">
						<span class="help-block"><b class="require">*</b> ) Menandakan inputan tidak boleh kosong</span>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
                    <?php }?>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php if($_GET['opsi']=="hapus"||$_GET['opsi']=="aktivasi"){echo"Ya";}else{echo"Simpan";}?></button>
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
?>