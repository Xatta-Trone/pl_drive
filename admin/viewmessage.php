<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include $filepath.'/../classes/Contact.php';
    //include $filepath.'/../helper/Format.php';
    $contact = new Contact();
    $fm = new Format();
    
?>
<?php 
	if (!isset($_GET['mid']) || $_GET['mid']==NULL) {
		header("Location: inbox.php");
	}else{
		$mid = $_GET['mid'];
	}

	$getMsgById  = $contact->getMsgById($mid);
 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View msg</h2>
                <div class="block">
<?php 
	if ($getMsgById) {
		while ($result = $getMsgById->fetch_assoc()) { ?>
			
 
                 <form action="" method="post" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly="1" value="<?php echo $result['name']; ?>"  class="medium" />
                            </td>
                        </tr>
                     <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly="1"  value="<?php echo $result['email']; ?>" class="medium" />
                            </td>
                        </tr>
                     <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" readonly="1"   value="<?php echo $fm->formatDate($result['time']); ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td >
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea readonly="1"  class="tinymce">
                                     <?php echo $result['message']; ?>
                                </textarea>
                            </td>
                        </tr>
                         
						<tr>
                            <td></td>
                            <td>
                                <a href="replymail.php?mid=<?php echo $result['id']; ?>">Reply</a>
                            </td>
                        </tr>
                        
                    </table>
                    </form>
<?php	}
	}
 ?> 
                    
                </div>
            </div>
        </div>
         <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<?php include 'inc/footer.php'; ?>

