<?php
	session_start(); 		
	require_once dirname(__FILE__) . "/ojtadmin/koneksi.php"; 	
	$user=$_POST['user']; 	
	$password=$_POST['password']; 	

	$query=mysql_query("select * from cmb where user='$user' and password='$password'");	
	$xxx=mysql_num_rows($query);	 
	if($xxx==TRUE){ 		
		$_SESSION['user']=$user;  
		header("location:editpendaftaran.php");  
	}else{   
		echo "gagal login";
	}

?>