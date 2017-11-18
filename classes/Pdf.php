<?php
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Session.php');
	//Session::chkLogin();
	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* sub add delete update 
	view 1
	download 2
	like 3
	dislike 4
	love 5
	download 
	system admin upload 6
	search 7


*/
class Pdf{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insertPdf($data,$file){
		$pdfName = $this->fm->validation($data['pdfName']);
		$pdfName = mysqli_real_escape_string($this->db->link,$pdfName);

		$pdfCategory = $this->fm->validation($data['pdfCategory']);
		$pdfCategory = mysqli_real_escape_string($this->db->link,$pdfCategory);

		$pdfDescription = $this->fm->validation($data['pdfDescription']);
		$pdfDescription = mysqli_real_escape_string($this->db->link,$pdfDescription);

		$uploader = $this->fm->validation($data['uploader']);
		
		$permittedImg = array('jpg','jpeg');
		$permittedPdf = array('pdf');

		$imageName = $file['pdfImage']['name'];
		$imageSize = $file['pdfImage']['size'];
		$imageTemp = $file['pdfImage']['tmp_name'];


		$Pdf_name = $file['pdfData']['name'];
		$Pdf_size = $file['pdfData']['size'];
		$Pdf_temp = $file['pdfData']['tmp_name'];


		$img_extension = explode('.', $imageName);
		$img_extension = strtolower(end($img_extension));
		$unique_image = substr(md5(time()), 0,10).'.'.$img_extension;
		$upload_img = "upload/img/".$unique_image;


		$pdf_extension = explode('.', $Pdf_name);
		$pdf_extension = strtolower(end($pdf_extension));

		$unique_pdf = "upload/pdf/".$pdfName.".pdf";

		if (empty($pdfName) || empty($pdfCategory) || empty($pdfDescription) || empty($uploader)) {
			$msg = "<span class='error'>Fields must not be empty</span>";
	    	return $msg;
		}elseif ($imageSize>5242835) {
			$msg = "<span class='error'>Image size must be less than 5MB</span>";
	    	return $msg;
		}elseif ($Pdf_size>5242835) {
			$msg = "<span class='error'>Pdf size must be less than 5MB</span>";
	    	return $msg;
		}elseif (in_array($img_extension,$permittedImg)==false) {
			$msg = "<span class='error'>Img type not allowed</span>";
	    	return $msg;
		}elseif (in_array($pdf_extension, $permittedPdf)== false) {
			$msg = "<span class='error'>pdf type not allowed</span>";
	    	return $msg;
		}else{
			move_uploaded_file($imageTemp, $upload_img);
			move_uploaded_file($Pdf_temp, $unique_pdf);

			$query = "INSERT INTO table_pdf(pdfName,pdfCategory,pdfImage,pdfDescription,uploader) VALUES('$pdfName','$pdfCategory','$unique_image','$pdfDescription','$uploader')";

			$Insert_pdf = $this->db->insert($query);

			if ($Insert_pdf) {
				$msg = "<span class='success'>Pdf inserted successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>pdf not inserted</span>";
				return $msg;
			}

		}
	}


	public function getAllPdf(){
		$query = "SELECT pdf.* , sub.subName, user.name
				FROM table_pdf as pdf, table_subject as sub, user_list as user
				WHERE pdf.pdfCategory = sub.id AND 
				pdf.uploader = user.id
				ORDER BY pdf.id DESC";

		$result = $this->db->select($query);
		return $result;
	}

	public function getLatestPdf(){
		$query = "SELECT pdf.* , sub.subName, user.name
				FROM table_pdf as pdf, table_subject as sub, user_list as user
				WHERE pdf.pdfCategory = sub.id AND 
				pdf.uploader = user.id
				ORDER BY pdf.id DESC LIMIT 4";

		$result = $this->db->select($query);
		return $result;
	}

	public function deletePdfById($id){
		$query = "SELECT * FROM table_pdf WHERE id='$id'";

		$getData = $this->db->select($query);
		if ($getData) {
			while ($delPdf = $getData->fetch_assoc()) {
				$img = "upload/img/".$delPdf['pdfImage'];
				unlink($img);
				$pdf ="upload/pdf/".$delPdf['pdfName'].".pdf";
				unlink($pdf);
			}
		}

		$delQuery = "DELETE FROM table_pdf WHERE id='$id'";

		$del_row = $this->db->delete($delQuery);

		if ($del_row) {
			$msg = "<span class='success'>Pdf deleted</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Pdf not deleted</span>";
			return $msg;
		}
	}

	public function getPdfById($pdfId){
		$query = "SELECT * FROM table_pdf WHERE id='$pdfId'";

		$result = $this->db->select($query);
		return $result;
	}

	public function updatePdfById($data,$file,$pdfId){
		$pdfName = $this->fm->validation($data['pdfName']);
		$pdfName = mysqli_real_escape_string($this->db->link,$pdfName);

		$pdfCategory = $this->fm->validation($data['pdfCategory']);
		$pdfCategory = mysqli_real_escape_string($this->db->link,$pdfCategory);

		$pdfDescription = $this->fm->validation($data['pdfDescription']);
		$pdfDescription = mysqli_real_escape_string($this->db->link,$pdfDescription);

		$uploader = $this->fm->validation($data['uploader']);
		
		$permittedImg = array('jpg','jpeg');
		$permittedPdf = array('pdf');

		$imageName = $file['pdfImage']['name'];
		$imageSize = $file['pdfImage']['size'];
		$imageTemp = $file['pdfImage']['tmp_name'];


		$Pdf_name = $file['pdfData']['name'];
		$Pdf_size = $file['pdfData']['size'];
		$Pdf_temp = $file['pdfData']['tmp_name'];


		$img_extension = explode('.', $imageName);
		$img_extension = strtolower(end($img_extension));
		$unique_image = substr(md5(time()), 0,10).'.'.$img_extension;
		$upload_img = "upload/img/".$unique_image;


		$pdf_extension = explode('.', $Pdf_name);
		$pdf_extension = strtolower(end($pdf_extension));

		$unique_pdf = "upload/pdf/".$pdfName.'.pdf';

		if (empty($pdfName) || empty($pdfCategory) || empty($pdfDescription) || empty($uploader)) {
			$msg = "<span class='error'>Fields must not be empty</span>";
	    	return $msg;
		}else{
			if (!empty($imageName) && !empty($Pdf_name)) {
				if ($imageSize>5242835) {
					$msg = "<span class='error'>Image size must be less than 5MB</span>";
			    	return $msg;
				}elseif ($Pdf_size>5242835) {
					$msg = "<span class='error'>Pdf size must be less than 5MB</span>";
			    	return $msg;
				}elseif (in_array($img_extension,$permittedImg)==false) {
					$msg = "<span class='error'>Img type not allowed</span>";
			    	return $msg;
				}elseif (in_array($pdf_extension, $permittedPdf)== false) {
					$msg = "<span class='error'>pdf type not allowed</span>";
			    	return $msg;
				}else{
					move_uploaded_file($imageTemp, $upload_img);
					move_uploaded_file($Pdf_temp, $unique_pdf);

					/*$query = "INSERT INTO table_pdf(pdfName,pdfCategory,pdfImage,pdfDescription,uploader) VALUES('$pdfName','$pdfCategory','$unique_image','$pdfDescription','$uploader')";*/

					$query = "UPDATE table_pdf SET 
						pdfName='$pdfName',
						pdfCategory='$pdfCategory',
						pdfImage='$unique_image',
						pdfDescription='$pdfDescription',
						uploader='$uploader'
						WHERE id='$pdfId'
					";

					$pdfUpdate = $this->db->update($query);

					if ($pdfUpdate) {
						$msg = "<span class='success'>pdf Updated successfully</span>";
						return $msg;
					}else{
						$msg = "<span class='success'>pdf not Updated </span>";
						return $msg;
					}
				}
			}elseif (!empty($imageName)) {
				if ($imageSize>5242835) {
					$msg = "<span class='error'>Image size must be less than 5MB</span>";
			    	return $msg;
				}elseif (in_array($img_extension,$permittedImg)==false) {
					$msg = "<span class='error'>Img type not allowed</span>";
			    	return $msg;
				}else{
					move_uploaded_file($imageTemp, $upload_img);
					//move_uploaded_file($Pdf_temp, $unique_pdf);

					/*$query = "INSERT INTO table_pdf(pdfName,pdfCategory,pdfImage,pdfDescription,uploader) VALUES('$pdfName','$pdfCategory','$unique_image','$pdfDescription','$uploader')";*/

					$query = "UPDATE table_pdf SET 
						pdfName='$pdfName',
						pdfCategory='$pdfCategory',
						pdfImage='$unique_image',
						pdfDescription='$pdfDescription',
						uploader='$uploader'
						WHERE id='$pdfId'
					";

					$pdfUpdate = $this->db->update($query);

					if ($pdfUpdate) {
						$msg = "<span class='success'>pdf Updated successfully</span>";
						return $msg;
					}else{
						$msg = "<span class='success'>pdf not Updated </span>";
						return $msg;
					}
				}
			}elseif (!empty($Pdf_name)) {
				if ($Pdf_size>5242835) {
					$msg = "<span class='error'>Pdf size must be less than 5MB</span>";
			    	return $msg;
				}elseif (in_array($pdf_extension, $permittedPdf)== false) {
					$msg = "<span class='error'>pdf type not allowed</span>";
			    	return $msg;
				}else{

					//move_uploaded_file($imageTemp, $upload_img);
					move_uploaded_file($Pdf_temp, $unique_pdf);

					/*$query = "INSERT INTO table_pdf(pdfName,pdfCategory,pdfImage,pdfDescription,uploader) VALUES('$pdfName','$pdfCategory','$unique_image','$pdfDescription','$uploader')";*/

					$query = "UPDATE table_pdf SET 
						pdfName='$pdfName',
						pdfCategory='$pdfCategory',
						pdfDescription='$pdfDescription',
						uploader='$uploader'
						WHERE id='$pdfId'
					";

					$pdfUpdate = $this->db->update($query);

					if ($pdfUpdate) {
						$msg = "<span class='success'>pdf Updated successfully</span>";
						return $msg;
					}else{
						$msg = "<span class='success'>pdf not Updated </span>";
						return $msg;
					}
				}
			}else{

				//move_uploaded_file($imageTemp, $upload_img);
				//move_uploaded_file($Pdf_temp, $unique_pdf);

				/*$query = "INSERT INTO table_pdf(pdfName,pdfCategory,pdfImage,pdfDescription,uploader) VALUES('$pdfName','$pdfCategory','$unique_image','$pdfDescription','$uploader')";*/

				$query = "UPDATE table_pdf SET 
					pdfName='$pdfName',
					pdfCategory='$pdfCategory',
					pdfDescription='$pdfDescription',
					uploader='$uploader'
					WHERE id='$pdfId'
				";

				$pdfUpdate = $this->db->update($query);

				if ($pdfUpdate) {
					$msg = "<span class='success'>pdf Updated successfully</span>";
					return $msg;
				}else{
					$msg = "<span class='success'>pdf not Updated </span>";
					return $msg;
				}
			}
		}
	}//end


	public function getSinglePdfBySubject($subject_id){
		$query = "SELECT * FROM table_pdf WHERE pdfCategory='$subject_id' ORDER BY id DESC";

		$result = $this->db->select($query);
		return $result;
	}


	public function getSinglePdfById($pdfId){
		$userId = Session::get('userId');

		self::viewedPdfbyId($pdfId);
		self::pdfViewedBy($userId,$pdfId);
		//self::likeCount($pdfId,$userId);



		$query = "SELECT pdf.*, user.name FROM table_pdf as pdf, user_list as user
			WHERE pdf.uploader = user.id AND pdf.id='$pdfId'";

		$result = $this->db->select($query);
		return $result;
	}

	public function pdfDownloadCount($pdfId,$userId){
		$query = "SELECT * FROM table_pdf WHERE id='$pdfId'";
		//$userId = Session::get('userId');

		self::activity($userId,'2',$pdfId);
		self::pdfDownloadedBY($userId,$pdfId);

		$downloadresult = $this->db->select($query);
		if ($downloadresult) {
			while ($downloadCount = $downloadresult->fetch_assoc()) {
				$download = $downloadCount['download'] + 1;

		$updateQuery = "UPDATE `table_pdf` SET `download`='$download' WHERE `id`='$pdfId'";
		$result  =$this->db->update($updateQuery);
		return $download;
			}
		}
	}

	public function viewedPdfbyId($id){
		$query = "SELECT * FROM table_pdf WHERE id='$id'";

		$Viewresult = $this->db->select($query);
		if ($Viewresult) {
			while ($viewCount = $Viewresult->fetch_assoc()) {
				$view = (int)$viewCount['view'] + 1;

		$updateQuery = "UPDATE `table_pdf` SET `view`='$view' WHERE `id`='$id'";
		$result  =$this->db->update($updateQuery);
		return $result;
			}
		}
	}

	public function pdfViewedBy($userId,$pdfId){

		self::activity($userId,'1',$pdfId);

		$query = "INSERT INTO table_viewedby(userId,pdfId) VALUES('$userId','$pdfId')";
		$result = $this->db->insert($query);
	}

	public function pdfDownloadedBY($userId,$pdfId){
		$query = "INSERT INTO table_download(userId,pdfId) VALUES('$userId','$pdfId')";
		$result = $this->db->insert($query);
	}

	public function activity($userId,$activity,$pdfId){
		$query = "INSERT INTO table_activity(userId,activity,pdfId) VALUES('$userId','$activity','$pdfId')";
		$result = $this->db->insert($query);
	}

/*	public function likeCount($pdfId,$userId){
		$query = "INSERT INTO table_like(pdfId,userId) VALUES('$pdfId','$userId')";
		$result = $this->db->insert($query);

		if ($result) {
			$msg   = "ok";
			return $msg;
		}else{
			$msg = "not ok";
			return $msg;
		}
	}*/


	


	




}//end of class 

?>