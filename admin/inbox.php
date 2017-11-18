<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include $filepath.'/../classes/Contact.php';
    //include $filepath.'/../helper/Format.php';
    $contact = new Contact();
    $fm = new Format();
    $getAllmessage  = $contact->getAllmessage();
    $getAllReadmessage  = $contact->getAllReadmessage();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox(unseen)</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>name</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php 
	if ($getAllmessage) {
		$i=0;
		foreach ($getAllmessage as $singleMessage) { $i++; ?>
			<tr class="odd gradeX">
				<td><?php echo $i; ?></td>
				<td><?php echo $singleMessage['name']; ?></td>
				<td><?php echo $fm->textShorten($singleMessage['message'],25); ?></td>
				<td><a href="viewmessage.php?mid=<?php echo $singleMessage['id']; ?>">View</a></td>
			</tr>
			
<?php }//end foreach
	}//end if

 ?>
					</tbody>
				</table>
               </div>

               <hr>

                <h2>Already seen</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>name</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php 
	if ($getAllReadmessage) {
		$i=0;
		foreach ($getAllReadmessage as $singleReadMessage) { $i++; ?>
			<tr class="odd gradeX">
				<td><?php echo $i; ?></td>
				<td><?php echo $singleReadMessage['name']; ?></td>
				<td><?php echo $fm->textShorten($singleReadMessage['message'],25); ?></td>
				<td><a href="viewmessage.php?mid=<?php echo $singleReadMessage['id']; ?>">View</a></td>
			</tr>
			
<?php }//end foreach
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
<?php include 'inc/footer.php'; ?>