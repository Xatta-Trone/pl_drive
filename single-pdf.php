<?php include 'inc/header.php'; ?>
<?php Session::chkUserLogin(); ?>
<?php 
	if (!isset($_GET['pdf']) || $_GET['pdf']==NULL) {
		header("Location:content.php");
	}else{
		$pdfId = $_GET['pdf'];
	}
 ?>

<?php 
	$getSinglePdfById = $pdf->getSinglePdfById($pdfId);
	if ($getSinglePdfById) {
		while ($singlePdf = $getSinglePdfById->fetch_assoc()) { ?>

	<div class="single-pdf-section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="pdf-prview-image pdf-front-page" style="background-image: url(admin/upload/img/<?php echo $singlePdf['pdfImage']; ?>);"></div>
					<div class="like-dislike">

						<div class="like" id="like" data-pdfid="<?php echo $singlePdf['id']; ?>" data-userid="<?php echo Session::get('userId'); ?>">
							<i class="fa fa-hand-o-up"></i>
						</div>
						<div class="dislike" id="dislike"  data-pdfid="<?php echo $singlePdf['id']; ?>" data-userid="<?php echo Session::get('userId'); ?>">
							<i class="fa fa-hand-o-down"></i>
						</div>
						<div class="love" id="love"  data-pdfid="<?php echo $singlePdf['id']; ?>" data-userid="<?php echo Session::get('userId'); ?>">
							<i class="fa fa-heart-o"></i>
						</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="pdf-title">
						<h3><?php echo $singlePdf['pdfName']; ?></h3>
					</div>
					<div class="pdf-meta">
						<p><i class="fa fa-user-o"></i><?php echo $singlePdf['name']; ?></p>
						<p><i class="fa fa-cloud-download"></i><span id="downloadcount" data-download="<?php echo $singlePdf['download'];?>" class="xt-m5"><?php echo $singlePdf['download'];?></span></p>
						<p><i class="fa fa-eye"></i><?php echo $singlePdf['view']; ?></p>
						<p><i class="fa fa-hand-o-up"></i><span id="likecount" data-like="<?php echo $singlePdf['likes'];?>" class="xt-m5"><?php echo $singlePdf['likes'];?></span></p>
						<p><i class="fa fa-hand-o-down"></i><span id="dislikecount" data-dislike="<?php echo $singlePdf['dislikes'];?>" class="xt-m5"><?php echo $singlePdf['dislikes'];?></span></p>
						<p><i class="fa fa-heart-o"></i><span id="lovecount" data-love="<?php echo $singlePdf['love'];?>" class="xt-m5"><?php echo $singlePdf['love'];?></span></p>
						
						
					</div>
					<div class="pdf-download">
						<a href="download.php?pdf=<?php echo $singlePdf['pdfName'].'.pdf'; ?>" class="pdf-dwn-btn" id="pdfDownloadtrigger" data-pdfid="<?php echo $singlePdf['id']; ?>" data-userid="<?php echo Session::get('userId'); ?>">
							<i class="fa fa-download"></i>Download
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php	}//end while
	}//end if
 ?>


<?php include 'inc/footer.php'; ?>