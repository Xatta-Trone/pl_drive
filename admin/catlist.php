<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include $filepath.'/../classes/Subject.php';
    $subject = new Subject();
    $getAllSubject  = $subject->getAllSubject();
?>
<?php 
	
	if (isset($_GET['del'])) {
		$deleteSub = $subject->deleteSubjectById($_GET['del']);
	}


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
<?php 
	if (isset($deleteSub)) {
		echo $deleteSub;
	}
?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php 
	if ($getAllSubject) {
		$i = 0;
		foreach ($getAllSubject as $singleSubject) {
			$i++; 
?>

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $singleSubject['subName']; ?></td>
							<td><?php echo $singleSubject['subCode']; ?></td>
							<td>
								<a href="catedit.php?edit=<?php echo $singleSubject['id'] ?>">Edit</a> 
								|| <a onclick="return confirm('Are you sure to delete')" href="?del=<?php echo $singleSubject['id'] ?>">Delete</a></td>
						</tr>
<?php }//end foreach
	}else{
		echo "<tr colspan='4'>No Subject Found <br> 
				<a href='addcat.php'>Add a new subject</a></tr>
		";
	}
 ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <script type="text/javascript"></script>

<?php include 'inc/footer.php'; ?>