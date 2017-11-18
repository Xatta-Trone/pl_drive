<?php include 'inc/header.php'; ?>
<?php
 	$login = Session::get('isUser');
 	if ($login== TRUE) {
 		header("Location: index.php");
 	}
 ?>
 <?php
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['Userlogin'])) {
		$UserLogin = $user->UserLogin($_POST);
	}
?>
 <?php
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['registerUser'])) {
		$UserReg = $user->UserRegister($_POST);
	}
?>
	
	<div class="login-register-area">
		<div class="container">
		   <div class="row">
		   		<div class="col-md-6">
		   			<div class="login-form">
		   				<h2>Login</h2>
		   				<?php 
							if (isset($UserLogin)) {
								echo $UserLogin;
							}
						?>
		   				<form method="POST">
					  		<div class="form-group">
					  			<input type="text" name="idemail" class="form-control lr-form" placeholder="username or student id">
					  		</div>
					  		<div class="form-group">
					  			<input type="password" name="password" class="form-control lr-form" placeholder="password">
					  		</div>
					  		<div class="form-group">
					  			<button type="submit" name="Userlogin" class="lr-submit-reg">Login</button>
					  		</div>
					  	</form>
		   			</div>
		   		</div>
		   		<div class="col-md-6">
		   			<div class="register-area">
		   				<h2>Register</h2>
		   				<p><strong>Every field is required</strong></p>
						<p style='color:#fff;font-size:16px;'>
							<?php 
								if (isset($UserReg)) {
									echo $UserReg;
								}
							?>
						</p>
						<form method="POST">
					  		<div class="form-group">
					  			<input type="text" name="email" class="form-control lr-form" placeholder="Email..">
					  		</div>
					  		<div class="form-group">
					  			<input type="text" name="name" class="form-control lr-form" placeholder="Name...">
					  		</div>
					  		<div class="form-group">
					  			<input type="text" name="studentId" class="form-control lr-form" placeholder="student id">
					  		</div>
					  		<div class="form-group">
					  			<input type="password" name="password" class="form-control lr-form" placeholder="password">
					  		</div>
					  		<div class="form-group">
					  			<input type="hidden" name="isAdmin" class="form-control lr-form" value="0">
					  		</div>
					  		<div class="form-group">
					  			<button type="submit" name="registerUser" class="lr-submit-reg">Register</button>
					  		</div>
					  	</form>
		   			</div>
		   		</div>
			</div>
		</div>
	</div>
	
		
	
	
<?php include 'inc/footer.php'; ?>