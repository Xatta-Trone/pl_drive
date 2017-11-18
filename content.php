<?php include 'inc/header.php'; ?>
<?php Session::chkUserLogin(); ?>
<?php 
	$getAllSubject  = $subject->getAllSubject();
 ?>
	
	
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>All PDF's</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-11 mx-auto">
					<div class="recent-pdf-all">
						<div id="accordion" role="tablist" aria-multiselectable="true">
							<!-- accordion start -->
<?php 
	if ($getAllSubject) {
		foreach ($getAllSubject as $singleSubject) { ?>
			

							<div class="card">
								<div class="card-header" role="tab" id="heading<?php echo $singleSubject['id']; ?>">
									<h5 class="mb-0">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $singleSubject['id']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $singleSubject['id']; ?>">
											<?php echo $singleSubject['subName']; ?>
											<i class="fa fa-angle-up"></i> <i class="fa fa-angle-down"></i>
										</a>
									</h5>
								</div>
						
								<div id="collapse<?php echo $singleSubject['id']; ?>" class="collapse single-collapse" role="tabpanel" aria-labelledby="heading<?php echo $singleSubject['id']; ?>">
									<div class="card-block">
										<div class="row">
<?php 
	$subject_id = $singleSubject['id'];
	$getSinglePdfBySubject = $pdf->getSinglePdfBySubject($subject_id);

	if ($getSinglePdfBySubject) {
		foreach ($getSinglePdfBySubject as $singlePdfBYSubjectId) { ?>
											<!-- singlepdf start -->
											<div class="col-md-3">
												<a href="single-pdf.php?pdf=<?php echo $singlePdfBYSubjectId['id']; ?>" class="single-pdf-item">
													<span>
														<?php 
															echo $singlePdfBYSubjectId['pdfName'];
														?>
													</span>
												</a>
											</div>
											<!-- singlepdf end -->
<?php		}//end foreach for singlePdfBYSubjectId
	}//end if for singlePdfBYSubjectId
	else{ ?>
		<div class="col-sm-12">
			<a href="#" class="single-pdf-item">
				<span>No Pdf Found <br> :(</span>
			</a>
		</div>

<?php	}// end of else for singlePdfBYSubjectId
 ?>
										</div>
									</div>
								</div>
							</div>
							<!-- Accordion end -->
<?php		}//end foreach for singleSubject
	}//end if for singleSubject
	else{ ?>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>No Subject Found</h2>
			</div>
		</div>
	</div>

<?php 	}//end else for singleSubject
 ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include 'inc/footer.php'; ?>