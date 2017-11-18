<?php 
	$filepath = realpath(dirname(__FILE__));
    include $filepath.'/../classes/User.php';

    $User = new User();
?>
<?php
	
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['AdminLogin'])) {
		$AdminLogin = $User->UserLogin($_POST);
	}


?>



<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>
<?php 
	
	if (isset($AdminLogin)) {
		echo $AdminLogin;
	}
 ?>
			<div>
				<input type="text" placeholder="Username" required="" name="idemail"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" name="AdminLogin" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>