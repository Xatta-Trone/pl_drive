<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include $filepath.'/../classes/Subject.php';
    $subject = new Subject();

   if (!isset($_GET['edit']) || $_GET['edit']==NULL) {
       header("Location: catlist.php");
   }else{
        $id = $_GET['edit'];
   }
?>
<?php 
    if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['catUpdate'])) {
        $subjectUpdate = $subject->updateSubjectById($_POST,$id);
    }
?>
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Add New subject</h2>
               <div class="block copyblock">
<?php 
    if (isset($subjectUpdate)) {
        echo $subjectUpdate;
    }
?>
<?php 
    $getSubject = $subject->getSubjectById($id);
    if ($getSubject) {
        while ($result = $getSubject->fetch_assoc()) {?>
                 <form method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['subName']; ?>" class="medium" name="subName" />
                            </td>
                        </tr>                   
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['subCode']; ?>" class="medium" name="subCode" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="catUpdate" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
<?php   }//end while
    }//end if
 ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
   <?php include 'inc/footer.php'; ?>