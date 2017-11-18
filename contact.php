<?php include 'inc/header.php'; ?>
<?php 
	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
		$contactSubmit = $contact->insertContact($_POST);
	}

 ?>
	
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="contact-header text-center">
						<h2 class="text-uppercase">Contact Us</h2>
						<?php 
							if (isset($contactSubmit)) {
								echo $contactSubmit;
							}
						?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="contact-meta">
						<h4>Headquarter</h4>
						<span><i class="fa fa-home"></i>Lorem ipsum dolor sit amet.</span>
						<span><i class="fa fa-envelope"></i>xatta@xatta.com</span>
						<span><i class="fa fa-phone"></i>+11111111</span>
						<span><i class="fa fa-clock-o"></i>24 hr/7 day/week</span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-wrapper">
						<p>*All fields are required</p>
						<form class="contact-form" method="POST">
							<input type="text" name="name" placeholder="Enter your name..." class="contact-input">
							<input type="text" name="email" placeholder="Enter your email.." class="contact-input">
							<textarea cols="30" rows="7" class="contact-input" placeholder="your message......." name="mesaage"></textarea>
							<button type="submit" name="submit" class="contact-submit-btn">Send <i class="fa fa-paper-plane-o"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
		
	
	
<?php include 'inc/footer.php'; ?>