<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include $filepath.'/../classes/Subject.php';
    include $filepath.'/../classes/Pdf.php';
    $subject = new Subject();
    $pdf = new Pdf();
?>
<?php 
    if (!isset($_GET['pdfId']) || $_GET['pdfId']==NULL) {
       header("Location:postlist.php");
    }else{
        $pdfId = $_GET['pdfId'];
    }
 ?>
 <?php
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])) {
        $updatePdf = $pdf->updatePdfById($_POST,$_FILES,$pdfId);
    }
 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">
<?php 
if (isset($updatePdf)) {
    echo $updatePdf;
}
?>

<?php 
    $getPdf = $pdf->getPdfById($pdfId);
    if ($getPdf) {
        while ($value = $getPdf->fetch_assoc()) { ?>

                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Pdf Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $value['pdfName']; ?>" class="medium" name="pdfName" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Subject Code</label>
                            </td>
                            <td>
                                <select id="select" name="pdfCategory">
                                    <option>select Subject Code</option>
<?php 
    $getSubject  = $subject->getAllSubject();
    if ($getSubject) {
        foreach ($getSubject as $singleSubject) { ?>

            <option value="<?php echo $singleSubject['id'];?>"
                <?php if ($singleSubject['id']==$value['pdfCategory']) {
                   echo 'selected="selected"';
                } ?>>
                <?php echo $singleSubject['subCode']; ?>
            </option>
            
<?php    }//end forecah
    }//endif
 ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload New Image</label>
                            </td>
                            <td>
                                <input type="file" name="pdfImage" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label> Image</label>
                            </td>
                            <td>
                                <img height="300px" width="300px" src="upload/img/<?php echo $value['pdfImage']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload File</label>
                            </td>
                            <td>
                                <input type="file" name="pdfData" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>description</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="pdfDescription">
                                    <?php echo $value['pdfName'];?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" name="uploader" Value="<?php echo Session::get('userId');?>" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="update" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
<?php   }//end while
    }//endif
 ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
<!-- Load TinyMCE
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
Load TinyMCE -->
    <?php include 'inc/footer.php'; ?>
