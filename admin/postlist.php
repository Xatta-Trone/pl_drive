<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    //include $filepath.'/../classes/Subject.php';
    include $filepath.'/../classes/Pdf.php';
    //include $filepath.'/../helper/Format.php';
    //$subject = new Subject();
    $pdf = new Pdf();
    //$format = new Format();
?>
<?php 
	if (isset($_GET['pdfDel'])) {
		$deletePdf = $pdf->deletePdfById($_GET['pdfDel']);
	}
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>pdf List</h2>
                <div class="block">
<?php 
	if (isset($deletePdf)) {
		echo $deletePdf;
	}
?>  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Post Name</th>
							<th>Category</th>
							<th>Descriotion</th>
							<th>uploader</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php 
	$allPdf = $pdf->getAllPdf();
	if ($allPdf) {
		foreach ($allPdf as $singlePdf) { ?>

						<tr class="odd gradeX">
							<td><?php echo $singlePdf['pdfName'] ; ?></td>
							<td><?php echo $singlePdf['subName'] ; ?></td>
							<td><?php echo $singlePdf['pdfDescription'] ; ?></td>
							<td><?php echo $singlePdf['name'] ; ?></td>
							<td><a href="postedit.php?pdfId=<?php echo $singlePdf['id'] ; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete')" href="?pdfDel=<?php echo $singlePdf['id'] ; ?>">Delete</a></td>
						</tr>
<?php		}//end foreach
	}//end if
 ?>
						
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    <?php include 'inc/footer.php'; ?>
