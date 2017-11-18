<?php include 'inc/header.php'; ?>
<?php Session::chkUserLogin(); ?>
<?php 
	if (isset($_SESSION['userId'])) {
		$id = $_SESSION['userId'];
	}
?>
<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['passwordChange'])) {
		$pwdChnge = $user->changePassword($_POST,$id);
	}
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['Updateprofile'])) {
		$profileUpdate = $user->UpdateProfileById($_POST,$id);
	}



 ?>
<?php 
	$userData = $user->getUserDataById($id);
	if ($userData) {
		while ($value = $userData->fetch_assoc()) { ?>


<div class="user-profile-area">
	<div class="xt-table">
		<div class="xt-table-cell">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="user-image-container">
							<img src="img/22274105.png" alt="" class="user-image">
						</div>
						<h3><?php echo $value['name']; ?></h3>
						<p>
							<?php if (isset($pwdChnge)) {
								echo $pwdChnge;
							}
							if (isset($profileUpdate)) {
								echo $profileUpdate;
							} ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="user-details-area">
	<div class="container">
		<div class="row">
			<div class="user-nav">
				<ul class="nav nav-pills nav-justified" role="tablist" id="MyTab">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#userDetails" role="tab"><span class="fa fa-info"> </span> Details</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#activity" role="tab"><span class="fa fa-bolt"></span> Activity</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#chpsd" role="tab"> <span class="fa fa-key"></span> Change Password</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#updateProfile" role="tab"> <span class="fa fa-user"></span>  Update Profile</a>
				  </li>
				</ul>
			</div>
			<div class="user-details">
				<div class="tab-content">
				  <div class="tab-pane fade in active show" id="userDetails" role="tabpanel">
				  	 <table class="table">
				  	 	<thead>
				  	 		<tr>
				  	 			<td colspan="2" class="text-center">
				  	 				<h3><strong>User Details</strong></h3>
				  	 			</td>
				  	 		</tr>
				  	 	</thead>
					    <tbody>
					      <tr>
					        <td style="text-align: right;"><b>Name :</b></td>
					        <td><?php echo $value['name']; ?></td>
					      </tr>
					      <tr>
					        <td style="text-align: right;"><b>Email :</b></td>
					        <td><?php echo $value['email']; ?></td>
					      </tr>
					      <tr>
					        <td style="text-align: right;"><b>ID :</b></td>
					        <td><?php echo $value['studentId']; ?></td>
					      </tr>
					      <tr>
					        <td style="text-align: right;"><b>Joined :</b></td>
					        <td><?php echo $fm->formatDate($value['joinDate']); ?></td>
					      </tr>
					      <tr>
					        <td style="text-align: right;"><b>Download :</b></td>
					        <td>11</td>
					      </tr>
					      <tr>
					        <td style="text-align: right;"><b>Upload :</b></td>
					        <td>11</td>
					      </tr>
					      <tr>
					        <td style="text-align: right;"><b>Reputation :</b></td>
					        <td>11</td>
					      </tr>
					      <tr>
					        <td colspan="2" class="text-center">Contact <a href=""><b>Site Admin</b></a> for any query</td>
					      </tr>
					      
					    </tbody>
					  </table>
				  </div>
				  <div class="tab-pane fade" id="activity" role="tabpanel">
				  	<table class="table table-hover">
				  	 	<thead>
				  	 		<tr>
				  	 			<td colspan="2" class="text-center">
				  	 				<h3><strong>Your Activity</strong></h3>
				  	 			</td>
				  	 		</tr>
				  	 	</thead>
					    <tbody>
<?php 
	$getAllActivity = $user->userActivity($id);
	if ($getAllActivity) {
		foreach ($getAllActivity as $singleActivity) { ?>
			<tr>
	        	<td>
	        		<span class="fa fa-clock-o"></span> <b><?php echo $fm->formatDate($singleActivity['dateTime']); ?> : </b> 
	        		<?php echo $fm->Activity($singleActivity['activity']); ?> 
	        		<a href="single-pdf.php?pdf=<?php echo $singleActivity['pdfId']; ?>"><?php echo $singleActivity['pdfName']; ?></a>
	        	</td>
	      </tr>

<?php	}//end foreach
	}//end if

?>
					    </tbody>
					</table>
				  	
				  </div>
				  <div class="tab-pane fade" id="chpsd" role="tabpanel">
				  	<div class="col-md-6">
				  		<form method="post">
						    <div class="form-group">
						      <label for="oldpwd">Old Password:</label>
						      <input type="password" class="form-control" name="oldPassword" id="oldpwd">
						    </div>
						    <div class="form-group">
						      <label for="newpwd">New Password:</label>
						      <input type="password" class="form-control" name="newPassword" id="newpwd">
						    </div>
						    <div class="form-group">
						      <label for="newpwd">Retype New Password:</label>
						      <input type="password" class="form-control" name="renewPassword" id="renewpwd">
						    </div>
						    <div class="form-group">
						    	<input type="submit" name="passwordChange" class="btn btn-primary" value="Change password">
						    </div>
						  </form>
				  	</div>
				  </div>
				  <div class="tab-pane fade" id="updateProfile" role="tabpanel">
				  	<table class="table">
				  	 	<thead>
				  	 		<tr>
				  	 			<td colspan="2" class="text-center">
				  	 				<h3><strong>User Details</strong></h3>
				  	 			</td>
				  	 		</tr>
				  	 	</thead>
					    <tbody>
					      <form method="post">
					      	<tr>
						        <td class="text-right"><b>Name :</b></td>
						        <td ><input type="text" class="form-control" name="name" value="<?php echo $value['name']; ?>"></td>
						      </tr>
						      <tr>
						        <td style="text-align: right;"><b>Email :</b></td>
						        <td ><input type="text" class="form-control" name="email" value="<?php echo $value['email']; ?>"></td>
						      </tr>
						      <tr>
						      	<td></td>
						        <td><input type="submit" name="Updateprofile" value="Updateprofile" class="btn"></td>
						      </tr>
					      </form>
					    </tbody>
					</table>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php		}//end while
	}//end if
 ?>

<?php include 'inc/footer.php'; ?>