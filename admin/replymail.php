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
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
       $sendMail  = $contact->sendMail($_POST);

       if ($sendMail) {
          echo $sendMail;
       }
    }


 ?>
                 <form action="" method="post" >
 <?php   if ($getMsgById) {
        while ($result = $getMsgById->fetch_assoc()) { ?>
                    <table class="form">
                       
                     <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" readonly="" name="toemail"  value="<?php echo $result['email']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>from</label>
                            </td>
                            <td>
                                <input type="text" name="fromemail"  class="medium" />
                            </td>
                        </tr>

                     <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                 <input type="text" name="subject"  class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td >
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea name="body"  class="tinymce">
                                    
                                </textarea>
                            </td>
                        </tr>
                         
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="send" />
                            </td>
                        </tr>
                        
                    </table>
<?php   }
    }
 ?> 
                    </form>
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

