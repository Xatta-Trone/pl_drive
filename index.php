<?php include 'inc/header.php'; ?>

	<div class="header-section xt-table">
		<div class="xt-table-cell">
			<div class="container">
				<div class="row">
					<div class="xt-header-content mx-auto zindex-1">
						<h1>Need Something !!</h1>
						<div class="header-form">
							<form class="haeder-form" action="search.php" method="get">
								<input type="text" name="query" class="header-input" placeholder="Search here......">
						        <button class="" type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="process text-center">
		<div class="container">
			<div class="row">
				<div class="col-4">
					<div class="process-data">
						<i class="fa fa-user-o"></i>
						<h2>Users</h2>
						<span><?php $getTotal = $utility->getUserCount('user_list');if ($getTotal) {echo $getTotal;}else{echo "0";}?>+</span>
					</div>
				</div>
				<div class="col-4">
					<div class="process-data">
						<i class="fa fa-download"></i>
						<h2>Downloads</h2>
						<span><?php $getTotal = $utility->getUserCount('table_download');if ($getTotal) {echo $getTotal;}else{echo "0";}?>+</span>
					</div>
				</div>
				<div class="col-4">
					<div class="process-data">
						<i class="fa fa-file-text"></i>
						<h2>PDF</h2>
						<span><?php $getTotal = $utility->getUserCount('table_pdf');if ($getTotal) {echo $getTotal;}else{echo "0";}?>+</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="newsletter-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2>Subscribe for new <span class="logo-color">UPDATE</span></h2>
				</div>
				<div class="col-md-6">
					<?php if (isset($_POST['Newsletter'])) {
						$insertNewsLetter = $contact->insertNewsLetter($_POST);
						if (isset($insertNewsLetter)) {
							echo $insertNewsLetter;
						}
					}?>
					<form method="POST">
						<div class="form-group float-right">
							<input type="text" name="email" placeholder="Your Email Here..">
							<input type="submit" name="Newsletter" value="Subscribe">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<div class="clearfix"></div>

	<div class="recent-docs">
		<div class="container text-center">
			<div class="row">
<?php 
	$getLatestPdf = $pdf->getLatestPdf();
	if ($getLatestPdf) {
		foreach ($getLatestPdf as $latestPdf) { ?>

						<div class="col-md-3 col-sm-6">
							<div class="doc-wrapper">
								<a href="single-pdf.php?pdf=<?php echo $latestPdf['id']; ?>">
									<div class="doc-img" style="background-image:url(admin/upload/img/<?php echo $latestPdf['pdfImage']; ?>); ">
										<div class="doc-data">
											Downloads:<span><?php echo $latestPdf['download']; ?></span>
											<br>
											View:<span><?php echo $latestPdf['view']; ?></span>
											<br>
											Likes:<span><?php echo $latestPdf['likes']; ?></span>
										</div>
									</div>
								</a>
								<div class="doc-stat">
									<h3><?php echo $latestPdf['pdfName']; ?></h3>
									Uploader:
									<span><a href="single-pdf.php?pdf=<?php echo $latestPdf['id']; ?>"><?php echo $latestPdf['name']; ?></a></span>
								</div>
							</div>
						</div>

			
<?php		}//end foreach
	}//end if
 ?>
			</div>
		</div>
	</div>

<?php include 'inc/footer.php'; ?>