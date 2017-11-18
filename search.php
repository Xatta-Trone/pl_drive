<?php include 'inc/header.php'; ?>
<?php error_reporting(E_ALL & ~E_NOTICE);
	if (isset($_GET['query'])) {
		$searchQuery = $_GET['query'];
		if (!empty($searchQuery) && $searchQuery !='') {
			$searchResult = $utility->getSearchResult($searchQuery);
		}else{
			$msg = "<strong>Please Input something</strong>";
		}
	}
 ?>
	
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-11">
					<div class="header-form">
						<form class="haeder-form search" action="search.php" method="get">
							<input type="text" id="searchquery" name="query" class="header-input" placeholder="Search here......" autocomplete="0">
					        <button class="" type="submit"><i class="fa fa-search"></i></button>
						</form>
						<div id="searchqueryresult"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="search-result">
						<span>Showing Result for <strong><?php echo $searchQuery; ?></strong></span>
						<?php if (isset($msg)) {
							echo $msg;
						} ?>
<?php 
	if ($searchResult) {
		$count  = $searchResult->num_rows; ?>
					<span><?php echo $count; ?> results found</span>
		<?php 
			foreach ($searchResult as $result) {?>
				
				<div class="single-search-result">
					<a href="single-pdf.php?pdf=<?php echo $result['id'] ?>" class="pdf-link"><?php echo $result['pdfName'] ?></a>
					<span>CourseName: <strong><?php echo $result['subName'] ?></strong></span>
					<span>Uploader: <strong><?php echo $result['name'] ?></strong></span>
				</div>

		<?php	}//end foreach?>
<?php	}//end if 
	else{ ?>
		<div class="single-search-result">
			<span><strong>OOPs Nothing Found</strong></span>
		</div>
<?php	}//end else?>
					</div>
				</div>
			</div>	
		</div>
	</div>
	
		
	
	
<?php include 'inc/footer.php'; ?>