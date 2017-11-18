<?php session_start(); ob_start();
ini_set( 'display_errors', 1 ); 
 error_reporting( E_ALL );

    $filepath = realpath(dirname(__FILE__));
    include $filepath.'/../lib/Session.php';
    include $filepath.'/../lib/Database.php';
    include $filepath.'/../helper/Format.php';
    include $filepath.'/../classes/Pdf.php';
    include $filepath.'/../classes/Subject.php';
    include $filepath.'/../classes/User.php';
    include $filepath.'/../classes/Contact.php';
    include $filepath.'/../classes/Utility.php';
    
    Session::init();
    //Session::chkAdminSession();

    $db = new Database();
    $fm = new Format();
    $pdf = new Pdf();
    $subject = new Subject();
    $user = new User();
    $contact = new Contact();
    $utility = new Utility();


?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php 
	if (isset($_GET['logout'])) {
		Session::destroy();
	}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Xatta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>
<body>
	<nav class="navbar navbar-expand-md xt-nav-white fixed-top " id="sticker">
		<div class="container">
			<a href="index.php" class="navbar-brand xt-logo"><span class="logo-color">X</span>atta<span class="logo-color">T</span>rone</a>
			<button class="navbar-toggler navbar-toggle-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbarResponsive">
<?php 
		$path  = $_SERVER['SCRIPT_FILENAME'];
		$currentpage = basename($path,'.php');
?>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php" class="nav-link <?php if($currentpage=='index'){echo 'active';} ?>">Home</a></li>
					<li class="nav-item"><a href="content.php" class="nav-link <?php if($currentpage=='content'){echo 'active';} ?>">PDF's</a></li>
<?php if (Session::get('isLoggedIn')) { ?>
					<li class="nav-item"><a href="profile.php" class="nav-link <?php if($currentpage=='profile'){echo 'active';} ?>">Profile</a></li>
					<li class="nav-item"><a href="?logout=true" class="nav-link">Logout</a></li>
<?php } else{ ?>
					<li class="nav-item"><a href="login.php" class="nav-link <?php if($currentpage=='login'){echo 'active';} ?>">Login</a></li>
<?php } ?>
					<li class="nav-item"><a href="contact.php" class="nav-link <?php if($currentpage=='contact'){echo 'active';} ?>">Contact</a></li>
<?php if(Session::get('isAdmin')){ ?>
					<li class="nav-item"><a href="/pl/admin/index.php" class="nav-link">Admin</a></li>
<?php } ?>
					
				</ul>
			</div>
		</div>
	</nav>