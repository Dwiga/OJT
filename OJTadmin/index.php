<?php
header("Expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");


error_reporting(E_ALL ^ E_NOTICE);
session_start();
$go = (preg_match('/^[a-z\-]+$/', $_GET['go'])) ? $_GET['go']:'';
$ak = (preg_match('/^[a-z]+$/', $_GET['ak'])) ? $_GET['ak']:'';
$self = $_SERVER['HTTP_SELF']. "?go=" . $go;
require_once dirname(__FILE__) . "/koneksi.php";
require_once dirname(__FILE__) . "/class_admin.php";
$admin = new adminPage;
$user = new user();
if (!$user->get_sesi()){
	header("location:login/");
}if($_GET['go'] == 'logout'){
	$user->logout();
	header("location:login/");
} 

if ( (isAjax() && isset($_POST['aksi'])) || (isAjax() && isset($_GET['aksi'])) ) {
	include dirname(__FILE__) . "/aset/mod_{$go}/x_{$go}.php";
	return;
}
try {
	$admin->beginTransaction();
	$admin->query("SELECT * FROM user where iduser=:id");
	$admin->bind(":id", $_SESSION['id']);
	$adm=$admin->fetch();
	$admin->execute();
	$admin->endTransaction();
} catch ( PDOException $e ) {}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Administrator</title>
        <link rel="shortcut icon" href="">
		<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700,600' rel='stylesheet' type='text/css'>-->
        
        <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
    
    <link rel="stylesheet" type="text/css" href="cssx/stylesheets.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
        
		<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="style/js/dataTables/dataTables.bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style/css/custom.css">
		<script type="text/javascript" src="style/js/modernizr.js"></script>
		<script type="text/javascript" src="style/js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/plugins/cleditor/jquery.cleditor.js"></script>        
	</head>
	<body>
		
		<div id="wrapper">
        
			<nav class="navbar navbar-default navbar-cls-top navbar-fixed-top" role="navigation" style="margin-bottom:0px;background-color:#00c">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./" style="font-weight:bold"><img src="<?php echo $adm->poto ?>" style="width::30px;position:absolute;height:40px;margin-top:-11px">&nbsp; Administrator</a> 
                </div>
                <div id="logout">
                	<?php echo date('D, d M Y. H:i') ?> &nbsp;
                    <a href="?go=logout" class="btn btn-danger square-btn-adjust" style="font-weight:bold;font-size:16px"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a>
                </div>
            </nav>
            <nav class="navbar-default navbar-side" role="navigation" style="background-color:#f50;">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu" style="background-color:#F50">
                        <li class="text-center" style="border-bottom:none"><img style="border-radius:10px;max-width:50%;max-height:180px;margin-top:20px" src="<?php echo $adm->poto ?>" class="user-image img-responsive"></li>
                        <li class="text-center" style="padding:0px 0px 15px 0px;margin-top:-25px;color:#FFF;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:18px"><?php echo $adm->nama ?></li>
                        <?php echo $admin->displayMenu($go) ?>
                    </ul>
                </div>
            </nav>
			
			<div id="page-wrapper">
				<div id="page-inner">
					<div class="row">
						<div class="col-md-12 judul-page">
							<?php echo $admin->judulPage($go) ?>
						</div>
					</div>
					<hr>					
					
					<?php
						if($go=="")
						{
							include dirname(__FILE__) . "/aset/mod_home/home.php";
                        }
						else if ( file_exists("./aset/mod_{$go}/{$go}.php") ) {
							include dirname(__FILE__) . "/aset/mod_{$go}/{$go}.php";
						} 
						else {
							echo "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>Maaf, halaman tidak tersedia</div></div></div>";
						}                        
					?>
                    
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content"></div>
			</div>
		</div>
		<script type="text/javascript" src="style/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="style/js/metisMenu/jquery.metisMenu.js"></script>
		<script type="text/javascript" src="style/js/malsupForm/jquery.form.js"></script>
		<script type="text/javascript" src="style/js/jqueryValidate/jquery.validate.js"></script>
		<script type="text/javascript" src="style/js/jqueryValidate/message_id.js"></script>
		<script type="text/javascript" src="style/js/dataTables/jquery.dataTables.js"></script>
		<script type="text/javascript" src="style/js/dataTables/dataTables.bootstrap.js"></script>
		<script type="text/javascript" src="style/js/rioTextarea.js"></script>
		<script type="text/javascript" src="style/js/custom.js"></script>
        <script type="text/javascript" src="style/js/fileinput.js"></script>
		<link rel="stylesheet" type="text/css" href="style/source/jquery.fancybox.css?v=2.1.5">
		<script type="text/javascript" src="style/source/jquery.fancybox.pack.js?v=2.1.5"></script> 
        <script type="text/javascript" src="style/js/jscolor/jscolor.js"></script>
	</body>
</html>