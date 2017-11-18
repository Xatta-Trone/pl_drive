<?php 

$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../classes/Ajax.php');

$ajax  = new Ajax();
echo "xatta";

die;

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$pdfId = $_POST['pdfId'];

	$pdf = $ajax->pdfDownloadCount($pdfId);
}



 ?>

 <!-- 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	$.ajax({
		url: "ajax/down.php",
		method: "POST",
		dataType: "text",
		data: {pdfId:"<?php echo $pdfId; ?>"}
	})
	
	
});
</script> -->