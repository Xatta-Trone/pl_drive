<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include $filepath.'/../classes/User.php';
    $user = new User();
    $getAllUser  = $user->getAllUser();
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
<?php 
	if (isset($_GET['makeadmin']) && !is_null($_GET['makeadmin'])) {
		$id = $_GET['makeadmin'];
		$adminMake = $user->makeAdmin($id);
		if (isset($makeadmin)) {
			echo $makeadmin;
		}
	}
	if (isset($_GET['unadmin']) && !is_null($_GET['unadmin'])) {
		$id = $_GET['unadmin'];
		$unadmin = $user->unAdmin($id);
		if (isset($unadmin)) {
			echo $unadmin;
		}
	}



 ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th> Name</th>
							<th> Id</th>
							<th>Email</th>
							<th>Is admin ?</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php 
	if ($getAllUser) {
		$i = 0;
		foreach ($getAllUser as $singleUser) {
			$i++; 
?>

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $singleUser['name']; ?></td>
							<td><?php echo $singleUser['studentId']; ?></td>
							<td><?php echo $singleUser['email']; ?></td>
							<td><?php echo $singleUser['isAdmin']; ?></td>
							<td>
								<a onclick="return confirm('Are you sure')" href="?makeadmin=<?php echo $singleUser['id'] ?>">Make Admin</a> ||
								<a onclick="return confirm('Are you sure')" href="?unadmin=<?php echo $singleUser['id'] ?>">un Admin</a> 
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