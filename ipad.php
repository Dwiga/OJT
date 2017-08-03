<?php
require_once dirname(__FILE__) . "/ojtadmin/koneksi.php";
require_once dirname(__FILE__) . "/ojtadmin/class_admin.php";
$admin = new adminPage;
$baranda = $admin->baranda();
$profil = $admin->profil();
$slideshow=$admin->slideshow();
$link=$admin->link();
$tt=$admin->tt();
$iwv=$admin->iwv();
$iwm=$admin->iwm();
$ppar=$admin->ppar();
$ketlink=$admin->ketlink();
?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

    <!-- Basic -->
    <title>Victory | Download</title>

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
                     <div class="navbar-header">
                        <!-- Stat Toggle Nav Link For Mobiles -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                            <a class="navbar-brand" href="index.php">
                            <img alt="" src="images/logo/3.png">
                        </a>
                    </div>
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
   <li data-target="#main-slide" data-slide-to="0" class="active"></li>
        <?php
  $num=1;
  foreach ($slideshow as $slide)
  {
    if ($num==1){
   echo"<li data-target='#main-slide' data-slide-to='$num'></li>";
   }else{
   echo"<li data-target='#main-slide' data-slide-to='$num'></li>";
   }$num++;
   }
  ?>
  </li>
  </ol>
       <div class="carousel-inner">
        <div class="item active">
                	<img class="img-responsive" src="images/slider/bg1.jpg" alt="slider">
                     <div class="slider-content">
                    	<div class="col-md-12 text-center">
                        	<h2 class="animated2">
                            	<span>welcome to<strong> VICTORY</strong></span>
                            </h2>
                            <h3 class="animated3">
                                <span>international futures</span>
                            </h3>
                              <a class="animated4"><a href="<?php echo $link->panbuk ?>" class="slider animated6 btn btn-system btn-large"><i class="fa fa-tasks"></i>Panduan Pembukaan Akun Real</a></a>
                              <a class="animated4"><a href="<?php echo $link->pandep ?>" class="slider animated6 btn btn-default btn-large"><i class="fa fa-tasks"></i>panduan Deposit & Withdrawal</a></a>
                        </div>
                     </div>
        </div> 
         <div class="item">
               <img class="img-responsive" src="images/slider/bg1.jpg" alt="slider">
          <div class="slider-content">
           <div class="col-md-12 text-center">
                            <h2 class="animated2">
                            	<span>victory<strong> international futures</strong></span>
                            </h2>
                            <h3 class="animated3">
                                <span>The key of your success</span>
                            </h3>
                               <a class="animated4"><a href="<?php echo $link->panbuk ?>" class="slider animated6 btn btn-system btn-large"><i class="fa fa-tasks"></i>Panduan Pembukaan Akun Real</a></a>
                               <a class="animated4"><a href="<?php echo $link->pandep ?>" class="slider animated6 btn btn-default btn-large"><i class="fa fa-tasks"></i>panduan Deposit & Withdrawal</a></a>
           </div>
        
          </div>
         </div>
         <div class="item">
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
        
           </div>
         </div>
       </div>
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
<div id="content"><!--profil-->
 <div class="container"><!-- container profil-->
  <div class="page-content"><!--page-->
   <div class="row"><!--row-->    
    <div class="col-md-7"><!-- bagian tulisan-->            
     <h4 class="popover-title"><strong><span>MT4 FOR IPAD</span></strong></h4>
     <p>Salah satu platform transaksi paling populer di dunia, MetaTrader4, kini tersedia untuk iPhone dan iPad secara gratis. Melalui aplikasi ini, Anda dapat mengelola account transaksi Anda, melakukan transaksi dan menggunakan analisis pasar dengan 30 indikator teknikal.</p>
     <p><strong>TRANSAKSI</strong></p>
          <ul style="list-style-type: circle;">;
     <li>Kuotasi harga real-time</li>
     <li>Dukungan berbagai jenis order, termasuk pending orders.</li>
     <li>Transaksi langsung dari chart</li>
     <li>Dukungan atas seluruh jenis eksekusi transaksi</li>
     <li>History transaksi</li>
     </ul>
     <p></p>
     <p><strong>ANALISIS TEKNIKAL</strong></p>
     <ul style="list-style-type: circle;">;
     <li>Chart interaktif realtime dengan fitur zoom dan scroll</li>
     <li>Tersedia 30 indikator populer: Accelerator Oscillator, Accumulation/Distribution, Alligator, Average Directional Movement Index, Average True Range, Awesome Oscillator, Bears Power, Bollinger Bands, Bulls Power, Commodity Channel Index, DeMarker, Envelopes, Force Index, Fractals, Gator Oscillator, Ichimoku Kinko Hyo, MACD, Market Facilitation Index, Momentum, Money Flow Index, Moving Average, Moving Average of Oscillator, On Balance Volume, Parabolic SAR, Relative Strength Index, Relative Vigor Index, Standard Deviation, Stochastic Oscillator, Volumes and Williamsí Percent Range</li>
     <li>Tujuh timeframe: M1, M5, M15, M30, H1, H4 and D1</li>
     <li>Tiga jenis chart: Bars, Japanese Candlesticks dan Line</li>
     <li>Dukungan untuk penyesuaian setting grafik indikator teknikal (color, line width)</li>
     </ul>
     <p></p>
     <p><strong>KENYAMANAN</strong></p>
     <ul style="list-style-type: circle;">;
     <li>Antar muka yang mudah dioperasikan</li>
     <li>Chart dengan dukungan informasi Trade levels serta volumes</li>
     <li>Modus offline (symbol prices dan charts)</li>
     <li>Traffic internet yang ringan</li>
     <li>Fitur Push notifications dari Desktop Terminal dan MQL5 Community Services, melihat notifikasi yang dierima, klasifikasi pesan yang diterima yang terdiri atas 5 kategori yakni: Chat, Broker, Terminal, Community dan Other</li>
     <li>Dukungan untuk melakukan percakapan via chatting dengan user MQL5.com</li>
     </ul>
     <p></p>
     <p>Download MetaTrader 4 ke iPhone atau iPad Anda dan nikmati kemampuan bertransaksi kapanpun dan dimanapun.</p>
     </div>	
     
    </div><!-- tutup bagian tulisan-->          
   </div><!-- tutup row-->
  </div><!-- tutup page-->
 </div><!-- tutup container profil-->
</div><!-- tutup profil-->




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
