<?php 

$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../classes/Ajax.php');

$ajax  = new Ajax();

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$query = $_POST['query'];

	$pdf = $ajax->searchResult($query);
	//echo $pdf;
}



 ?>