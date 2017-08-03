<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class=" main chart">
                    <div class="row mtbox">
                        <a href="?go=data-manager">
                  		<div class="col-md-3 box0">
                  			<div class="box1">
					  			<span class="li_user"></span>
                                <?php $mng = mysql_num_rows(mysql_query("select * from manager")); ?>                                
					  			<h3><?php echo "$mng"; ?></h3>
                  			</div>                                
					  			<p>kita punya <?php echo "$mng"; ?> manager</p>
                  		</div>
                        </a>
                        <a href="?go=data-slideshow">
                  		<div class="col-md-3 box0">
                  			<div class="box1">
					  			<span class="li_tv"></span>
                                <?php $sld = mysql_num_rows(mysql_query("select * from slideshow where status=1")); $sld1 = mysql_num_rows(mysql_query("select * from slideshow")); ?>
					  			<h3><?php echo "$sld"; ?>/<?php echo "$sld1" ?></h3>
                  			</div>
					  			<p>ada <?php echo "$sld"; ?> slide show yang aktif</p>
                  		</div>
                        </a>
                        <a href="?go=data-cmb">
                  		<div class="col-md-3 box0">
                  			<div class="box1">
					  			<span class="li_phone"></span>
                                <?php $cmb = mysql_num_rows(mysql_query("select * from cmb where status=0")); ?><?php $cmb1 = mysql_num_rows(mysql_query("select * from cmb")); ?>
					  			<h3><?php echo "$cmb" ?>/<?php echo "$cmb1" ?></h3>
                  			</div>
					  			<p>Sebanyak <?php echo "$cmb" ?> pengunjung yang ingin di hubungi</p>
                  		</div>
                        </a>
                  	
                  	</div><!-- /row mt -->
            </div>
          </div>
    </section>
</section>

<div class="row">
    <a href="?go=data-slideshow">
	<div class="col-xs-6 col-sm-6 col-md-4">
		<div class="panel panel-back noti-box">
			<span class="icon-box bg-color-brown set-icon">
				<i class="fa fa-fw fa-image"></i>
			</span>
			<div class="text-box">
				<p class="main-text">SlideShow</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
    </a>
    <a href="?go=kebijakan">
    <div class="col-xs-6 col-sm-6 col-md-4">
		<div class="panel panel-back noti-box">
			<span class="icon-box bg-color-red set-icon">
				
                <i class="fa fa-fw fa-warning"></i>
			</span>
			<div class="text-box">
				<p class="main-text">Kebijakan</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
    </a>
    <a href="?go=link">
    <div class="col-xs-6 col-sm-6 col-md-4">
		<div class="panel panel-back noti-box">
			<span class="icon-box bg-color-green set-icon">
				<i class="fa fa-fw fa-download"></i>
			</span>
			<div class="text-box">
				<p class="main-text">Link</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
    </a>
    <a href="?go=data-profile">
    <div class="col-xs-6 col-sm-6 col-md-4">
		<div class="panel panel-back noti-box">
			<span class="icon-box bg-color-orange set-icon">
				<i class="fa fa-fw fa-windows"></i>
			</span>
			<div class="text-box">
				<p class="main-text">Tentang</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
    </a>
    <a href="?go=beranda">
    <div class="col-xs-6 col-sm-6 col-md-4">
		<div class="panel panel-back noti-box">
			<span class="icon-box bg-color-yellow set-icon">
				<i class="fa fa-fw fa-paw"></i>
			</span>
			<div class="text-box">
				<p class="main-text">Beranda</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
    </a>
    <a href="?go=data-penghargaan">
    <div class="col-xs-6 col-sm-6 col-md-4">
		<div class="panel panel-back noti-box">
			<span class="icon-box bg-color-yellow set-icon">
				<i class="fa fa-fw fa-glass"></i>
			</span>
			<div class="text-box">
				<p class="main-text">Penghargaan</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
    </a>
</div>

</body>
</html>