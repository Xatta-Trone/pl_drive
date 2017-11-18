
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="single-footer-item">
						<span class=" xt-logo"><span class="logo-color">X</span>atta<span class="logo-color">T</span>rone</span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, molestias.</p>
					</div>
				</div>
				<div class="col-md-3 col-6">
					<div class="single-footer-item">
						<h3 class="footer-link-title logo-color">QuickLink</h3>
						<ul>
							<li><a href="">Home</a></li>
							<li><a href="">Home</a></li>
							<li><a href="">Home</a></li>
							<li><a href="">Home</a></li>
							<li><a href="">Home</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-6">
					<div class="single-footer-item">
						<h3 class="footer-link-title logo-color">QuickLink</h3>
						<ul>
							<li><a href="">Home</a></li>
							<li><a href="">Home</a></li>
							<li><a href="">Home</a></li>
							<li><a href="">Home</a></li>
							<li><a href="">Home</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="single-footer-item">
						<?php if (isset($_POST['Newsletter'])) {
							$insertNewsLetter = $contact->insertNewsLetter($_POST);
							if (isset($insertNewsLetter)) {
								echo $insertNewsLetter;
							}
						}?>
						<form method="POST">
							<div class="form-group">
								<input type="text" name="email" placeholder="Your Email Here..">
								<input type="submit" name="Newsletter" value="Subscribe">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-12 col-sm-6">
					<div class="footer-slogan">
						<span>Made with <i class="fa fa-heart-o"></i> by<a href="https://www.facebook.com/monzurul.islam1112" target="_blank"  class="logo-color"> XattaTrone</a></span>
					</div>
				</div>
				<div class="col-12 col-sm-6">
					<div class="footer-social float-right">
						<span><a href="https://www.facebook.com/monzurul.islam1112" target="_blank"><i class="fa fa-facebook"></i></a></span>
						<span><a href="https://www.youtube.com/channel/UCFNwcLQwU2W3bGSa1MXOGTA" target="_blank"><i class="fa fa-youtube"></i></a></span>
						<span><a href="https://twitter.com/xatta_trone" target="_blank"><i class="fa fa-twitter"></i></a></span>
						<span><a href="https://www.linkedin.com/in/monzurul-islam/" target="_blank"><i class="fa fa-linkedin"></i></a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
</body>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.sticky.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>