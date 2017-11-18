<?php ini_set( 'display_errors', 1 ); 
 error_reporting( E_ALL );
    $filepath = realpath(dirname(__FILE__));
	//echo $filepath;//exit();
    include_once $filepath.'/classes/Pdf.php';
    $pdf = new Pdf();
	if (isset($_REQUEST['pdf'])) {
		$pdfName = $_REQUEST['pdf'];
		$filepathe = $filepath."/../admin/upload/pdf/".$pdfName;
		if (file_exists($filepathe)) {
					header('Content-Description: File Transfer');
					header('Content-Type: application/pdf');
					header('Content-Disposition: attachment; filename="'.$pdfName.'"');
					header('Expires: 0');
					header('Cache-Control: must-revalidate');
					header('Pragma: public');
					header('Content-Length: '.filesize($filepathe));
					flush();
					readfile($filepathe);
					header("Location:content.php");
					 exit;
				}
	}
 ?>
