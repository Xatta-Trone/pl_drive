<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include $filepath.'/../classes/Subject.php';
    $subject = new Subject();
?>
<?php 
    if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['catSubmit'])) {
        $subjectInsert = $subject->insertSubject($_POST);
    }


?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New subject</h2>
               <div class="block copyblock">
<?php 
    if (isset($subjectInsert)) {
        echo $subjectInsert;
    }
?>
                 <form method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter subject Name..." class="medium" name="subName" />
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter subject code..." class="medium" name="subCode" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="catSubmit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
   <?php include 'inc/footer.php'; ?>