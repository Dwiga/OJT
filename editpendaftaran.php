<?php
require_once dirname(__FILE__) . "/ojtadmin/koneksi.php";
require_once dirname(__FILE__) . "/ojtadmin/class_admin.php";
$admin = new adminPage;
$profil = $admin->profil();
$slideshow=$admin->slideshow();
$link=$admin->link();
$ketlink=$admin->ketlink();
?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

    <!-- Basic -->
    <title>Victory | Home</title>

    <!-- Define Charset -->
    <meta charset="utf-8">

    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Page Description and Author -->
    <meta name="description" content="Margo - Responsive HTML5 Template">
    <meta name="author" content="iThemesLab">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">

    <!-- Margo CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

    <!-- Responsive CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

    <!-- Css3 Transitions Styles  -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="css/colors/red.css" title="red" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/jade.css" title="jade" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/green.css" title="green" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/blue.css" title="blue" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/beige.css" title="beige" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/cyan.css" title="cyan" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/orange.css" title="orange" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/peach.css" title="peach" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/pink.css" title="pink" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/purple.css" title="purple" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/sky-blue.css" title="sky-blue" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/yellow.css" title="yellow" media="screen" />


    <!-- Margo JS  -->
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.migrate.js"></script>
    <script type="text/javascript" src="js/modernizrr.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.appear.js"></script>
    <script type="text/javascript" src="js/count-to.js"></script>
    <script type="text/javascript" src="js/jquery.textillate.js"></script>
    <script type="text/javascript" src="js/jquery.lettering.js"></script>
    <script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/mediaelement-and-player.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

    <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>

<body>

<!-- container-->
<div id="container">
<!-- header -->
<div class="hidden-header"></div>
<header class="clearfix">
<!-- top bar -->
 <div class="top-bar">
  <div class="container">
   <div class="row">
    <div class="col-md-7">
<!-- contact info -->
<ul class="contact-details">
  <li><a ><i class="fa fa-envelope-o"></i><?php echo $profil->email ?></a></li>
  <li><a><i class="fa fa-phone"></i><?php echo $profil->telp ?></a></li>
</ul>
    </div>
<div class="col-md-5">
<!-- social link -->
 <ul class="social-list">
  <li><a class="facebook itl-tooltip" data-placement="bottom" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
  <li><a class="twitter itl-tooltip" data-placement="bottom" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
  <li><a class="google itl-tooltip" data-placement="bottom" title="Gmail" href="#"><i class="fa fa-google-plus"></i></a></li>
 </ul>
<!-- tutup social link-->
</div>
   </div>
  </div>
<!-- tutup top bar-->
 </div>
<div class="navbar navbar-default navbar-top">
 <div class="container">
<!-- navigation list -->
   <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
     <li>
       <a  class="active" href="index.php">Beranda</a>
    	<ul class="dropdown">
		 <li><a href="legalitas.php">Legalitas Broker</a></li>
	     <li><a href="model.php">Model Bisnis</a></li> 
    	 <li><a href="penghargaan.php">Penghargaan Broker</a></li>
        </ul>
     </li>
    <li>
      <a>Kebijakan Trading</a>
    	<ul class="dropdown">
		 <li><a href="eksekusi.php">Kebijakan Eksekusi Trading</a></li>
         <li><a href="BAS.php">Bid,Ask & Spread</a></li>
         <li><a href="komisi.php">Komisi dan biaya</a></li>
	     <li><a href="pembatalan.php">Pembatalan Perdagangan</a></li> 
    	 <li><a href="slippage.php">Slippage</a></li>
        </ul>
    </li>
    <li>
	  <a>Download Metatrader</a>
    	<ul class="dropdown">
		 <li><a href="desktopterminal.php">Dekstop Terminal</a></li>
	     <li><a href="desktopmulti.php">Dekstop Multiterminal</a></li> 
    	 <li><a href="android.php">Android</a></li>
         <li><a href="mobile.php">Mobile Terminal</a></li>
         <li><a href="smartphone.php">Smart Phone</a></li>
         
        </ul>
   </li>
    
</ul>
<!-- tutup navigation list-->

   </div>
 </div>
</div>


</header>
<!--Victory Slider-->
<section id="home">
 <div id="main-slide" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
   <li data-target="#main-slide" data-slide-to="0" class="active"></li></li>
   <li data-target="#main-slide" data-slide-to="1"></li>
   <li data-target="#main-slide" data-slide-to="2"></li>
  </ol>
       <div class="carousel-inner">
         <div class="item active">
               <img class="img-responsive" src="images/slider/bg1.jpg" alt="slider">
           <div class="slider-content">
            <div class="col-md-12 text-center">
                            <h2 class="animated2">
                            	<span>the way<strong> of success</strong></span>
                            </h2>
                            <h3 class="animated3">
                                <span>why you are waiting</span>
                            </h3>
                               <a class="animated4"><a href="daftar.php" class="slider animated6 btn btn-system btn-large"><i class="fa fa-tasks"></i>Call Me Back</a></a>
                               
            </div>
                     <?php
    $no=0;
    foreach($slideshow as $pin)
    {
    if($no==0){
   echo"<li data-target='#main-slide' data-slide-to='$no' class='active'></li>";
   }else{
   echo"<li data-target='#main-slide' data-slide-to='$no'></li>";
    }$no++;
    }
  ?>
           </div>
         </div>

         <?php
            $no=1;
            foreach($slideshow as $show){
        ?>
        <div class="<?php if($no==0){echo "item active";$no=1;}else{echo "item";}?>">
                	<img class="img-responsive" src="ojtadmin/<?php echo $show->gambar ?>" alt="slider">
                     <div class="slider-content">
                    	<div class="col-md-12 text-center">
                        	<h2 class="animated2">
                            	<span><?php echo $show->keterangan ?></span>
                            </h2>
                            <h3 class="animated3">
                                <span>victory international futures</span>
                            </h3>
                              <a class="animated4"><a href="<?php echo $link->panbuk ?>" class="slider animated6 btn btn-system btn-large"><i class="fa fa-tasks"></i>Panduan Pembukaan Akun Real</a></a>
                              <a class="animated4"><a href="<?php echo $link->pandep ?>" class="slider animated6 btn btn-default btn-large"><i class="fa fa-tasks"></i>panduan Deposit & Withdrawal</a></a>
                        </div>
                     </div>
        </div> 
        <?php
        }
        ?> 
                        </div>
                <!-- Carousel inner end-->

                <!-- Controls -->
                <a class="left carousel-control" href="#main-slide" data-slide="prev">
                    <span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#main-slide" data-slide="next">
                    <span><i class="fa fa-angle-right"></i></span>
                </a>
       </div>
<!-- tutup victory slider-->
</section>
<!-- pilihan -->
<div class="section service">
<!-- container 2-->
 <div class="container">
  <div class="row">
<!-- pilihan 1-->
   <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadein" data-animation-delay="01">
    <div class="service-icon">
     <i class="fa fa-leaf icon-large"></i>
      <div class="service-content">
       <h4><a href="<?php echo $link->bar ?>">Buka Akun Real</a></h4>
      </div>
    </div>
<!-- tutup pilihan 1-->
   </div>
<!-- pilihan 2-->
   <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadein" data-animation-delay="02">
    <div class="service-icon">
     <i class="fa fa-rocket icon-large"></i>
      <div class="service-content">
       <h4><a href="<?php echo $link->tt ?>">Top Trader</a></h4>
      </div>
    </div>
<!-- tutup pilihan 2-->
   </div>
<!-- pilihan 3-->
   <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadein" data-animation-delay="02">
    <div class="service-icon">
     <i class="fa fa-css3 icon-large"></i>
      <div class="service-content">
       <h4><a href="<?php echo $link->iwv ?>">injection & withdrawal Vif</a></h4>
      </div>
    </div>
<!-- tutup pilihan 3-->
   </div>
<!-- pilihan 4-->
   <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadein" data-animation-delay="02">
    <div class="service-icon">
     <i class="fa fa-desktop icon-large"></i>
      <div class="service-content">
       <h4><a href="<?php echo $link->iwm ?>">injection & withdrawal Millenium</a></h4>
      </div>
    </div>
<!-- tutup pilihan 4-->
   </div>  
  </div>
 </div><!-- tutup container 2-->
<!-- tutup pilihan-->
</div>


<!-- Start Content -->
<div id="content">
	<div class="container">
		
		<div class="row">
			
			<div class="col-md-8">
				
				<!-- Classic Heading -->
				<h4 class="classic-title"><span>Silahkan isi data di bawah ini :</span></h4>
                <?php
                // Jika Tombol Simpan ditekan
if (isset($_POST['edit'])){
// Cek Jika Input Masih ada yang Kosong
if ((!empty($_POST['tanggal'])) && (!empty($_POST['alamat'])) && (!empty($_POST['telp'])) && (!empty($_POST['nama'])) && (!empty($_POST['jam'])) && (!empty($_POST['kota'])) && (!empty($_POST['user'])) && (!empty($_POST['password']))){
// Simpan Data
$sql = "UPDATE cmb SET tanggal= '".$_POST['tanggal']."', alamat = '".$_POST['alamat']."', telp = '".$_POST['telp']."', nama = '".$_POST['nama']."', jam = '".$_POST['jam']."', kota = '".$_POST['kota']."', user = '".$_POST['user']."', password = '".$_POST['password']."' WHERE idcmb = '".$_GET['idcmb']."'";

if ($simpan) {
echo "<script>alert('Data Tersimpan'); </script>";
} else { 
echo "<script>alert('Gagal disimpan');</script>";
}
// Jika Inputan Masih ada yang Kosong
} else {
echo "<script>alert('Input Masih ada yang Kosong'); history-go(-1);</script>";
}
}
                ?>
                <?php 
// Ambil data Berdasarkan ID
$sql = "SELECT * FROM cmb WHERE idcmb = '".$_GET['idcmb']."'";
$tampil = mysql_query($sql);
while ($cmb = mysql_fetch_array($tampil)){ ?>
				
				<!-- Start Contact Form -->
    <form role="form" class="contact-form" id="contact-form" method="post">
        <div class="form-group">
    <div class="controls">
    <input type="text" value="<?php echo $cmb['tanggal']; ?> name="tanggal">
    </div>
    </div>
        <div class="form-group">
    <div class="controls">
    <input type="text" placeholder="alamat" name="alamat">
    </div>
    </div>
        <div class="form-group">
    <div class="controls">
    <input type="text" placeholder="telp" name="telp">
    </div>
    </div>
        <div class="form-group">
    <div class="controls">
    <input type="text" placeholder="Nama" name="nama">
    </div>
    </div>
        <div class="form-group">
    <div class="controls">
    <input type="text" placeholder="jam" name="jam">
    </div>
    </div>
        <div class="form-group">
    <div class="controls">
    <input type="text" placeholder="kota" name="kota">
    </div>
    </div>
    
        <div class="form-group">
    <div class="controls">
    <input type="text" class="requiredField" placeholder="id" name="user">
    </div>
    </div>
        <div class="form-group">
    <div class="controls">
    <input type="text" class="requiredField" placeholder="password" name="password">
    </div>
    </div>
    <?php } ?>
    <button type="submit" id="edit" name="edit" class="btn-system btn-large">Edit</button><div id="success" style="color:#34495e;"></div>
    
    </form>
				<!-- End Contact Form -->
				
			</div>
			
			<div class="col-md-4">
				
				<!-- Classic Heading -->
				<h4 class="classic-title"><span>Information</span></h4>
				
				<!-- Some Info -->
				<p>Terima kasih atas kunjungan anda,silahkan hubungi kami lewat :</p>
				
				<!-- Divider -->
				<div class="hr1" style="margin-bottom:10px;"></div>
				
				<!-- Info - Icons List -->
				<ul class="icons-list">
					<li><i class="fa fa-envelope-o"></i> <strong>Email:</strong> <?php echo $profil->email ?></li>
				</ul>
				
				<!-- Divider -->
				<div class="hr1" style="margin-bottom:15px;"></div>
				
				<!-- Classic Heading -->
				<h4 class="classic-title"><span>Working Hours</span></h4>
				
				<!-- Info - List -->
				<ul class="list-unstyled">
					<li><strong>Monday - Friday</strong> - 9am to 5pm</li>
					<li><strong>Saturday</strong> - Closed</li>
					<li><strong>Sunday</strong> - Closed</li>
				</ul>
				
			</div>
			
		</div>
		
	</div>
</div>
<!-- End content -->




<footer><!--footer-->
 <div class="container"><!--container footer-->
  <div class="row footer-widgets"><!--row footer-->                  
   <div class="col-md-3 col-xs-12"><!--social footer-->
    <div class="footer-widget social-widget">
     <h4>Follow Us<span class="head-line"></span></h4>
     <ul class="social-icons">
      <li>
       <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
      </li>
      <li>
       <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
      </li>
      <li>
       <a class="google" href="#"><i class="fa fa-google-plus"></i></a>
      </li>
     </ul>
    </div>
   </div><!-- tutup social footer-->
   <div class="col-md-3 col-xs-12"><!--foto footer-->
    <div class="footer-widget flickr-widget">
      <h4>Our Relation<span class="head-line"></span></h4>
     <ul class="flickr-list">
      <li>
       <a href="images/bappepti.jpg" class="lightbox">
        <img alt="" src="images/bappepti.jpg">
       </a>
      </li>
      <li>
       <a href="images/jfx.jpg" class="lightbox">
        <img alt="" src="images/jfx.jpg">
       </a>
      </li>
      <li>
       <a href="images/icdx.jpg" class="lightbox">
        <img alt="" src="images/icdx.jpg">
       </a>
      </li>
      <li>
       <a href="images/kliring.gif" class="lightbox">
        <img alt="" src="images/kliring.gif">
       </a>
      </li>
     </ul>
    </div>
   </div><!-- tutup foto footer-->
   <div class="col-md-3 col-xs-12"><!--deskripsi footer-->
    <div class="footer-widget contact-widget">
     <h4><img src="images/vif.jpg" class="img-responsive" alt="Footer Logo" /></h4>
     <p><?php echo $profil->tambahan ?></p>
         </div>
             </div>
             
             <div class="col-md-3 col-xs-12">

     <ul>
      <li><span>Phone Number:</span> <?php echo $profil->telp ?></li>
      <li><span>Email:</span> <?php echo $profil->email ?></li>
      <li><span>Website:</span> www.redforex.com</li>
      <li><span>Alamat:</span><?php echo $profil->alamat ?></li>
     </ul>


   </div><!--deskripsi footer-->                   
  </div><!-- tutup row footer-->
   <div class="copyright-section"><!--copyright footer-->
    <div class="row">
     <div class="col-md-6">
      <p>&copy; 2015 Victory International Futures -  All Rights Reserved <a href="http://redforex.com">Redforex</a> </p>
     </div>
     <div class="col-md-6">
      <ul class="footer-nav">
       <li><a href="index.php">Home</a></li>
       <li><a href="panduan.php">Download</a></li>
       
       <li><a href="team.php">Team</a></li>
      </ul>
     </div>
    </div>
</div><!--tutup copyright footer-->
 </div><!-- tutup container footer-->
</footer><!--tutup footer-->
	
</body>
</html>
