<?php 

$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../classes/Ajax.php');

$ajax  = new Ajax();

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$pdfId = (int)$_POST['pdfId'];
	$userId = (int)$_POST['userId'];

	$pdf = $ajax->likeCount($pdfId,$userId);
	echo $pdf;
}



 ?>