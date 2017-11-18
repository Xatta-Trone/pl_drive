<?php
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/Pdf.php');
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
class Ajax{
	private $db;
	private $fm;
	private $pdf;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
		$this->pdf = new Pdf();
	}

	public function pdfDownloadCount($pdfId){
		$query = "SELECT * FROM table_pdf WHERE id='$pdfId'";

		$downloadresult = $this->db->select($query);
		if ($downloadresult) {
			while ($downloadCount = $downloadresult->fetch_assoc()) {
				$download = $downloadCount['download'] + 1;

		$updateQuery = "UPDATE `table_pdf` SET `download`='$download' WHERE `id`='$pdfId'";
		$result  =$this->db->update($updateQuery);
		return $result;
			}
		}
	}

	public function likeCount($pdfId,$userId){
		$query = "INSERT INTO table_like(pdfId,userId) VALUES('$pdfId','$userId')";
		$result = $this->db->insert($query);

		$getqury = "SELECT * FROM table_pdf WHERE id='$pdfId'";
		$select = $this->db->select($getqury);

		if ($select) {
			while ($total_like = $select->fetch_assoc()) {
				$new_like = (int)$total_like['likes'];
				$new_dislike = (int)$total_like['dislikes'];

				if (self::ifdisLiked($pdfId,$userId)) {
					$new_dislike = $new_dislike - 1;
					$new_like = $new_like + 1;

					self::deletedisLikeByUserId($pdfId,$userId);

					$updateQuery = "UPDATE `table_pdf` SET `likes`='$new_like',`dislikes`='$new_dislike' WHERE `id`='$pdfId'";
					$update  =$this->db->update($updateQuery);
					$this->pdf->activity($userId,'3',$pdfId);
					return $new_like;
				}else{
					$new_like = $new_like + 1;

					$updateQuery = "UPDATE `table_pdf` SET `likes`='$new_like',`dislikes`='$new_dislike' WHERE `id`='$pdfId'";
					$update  =$this->db->update($updateQuery);
					$this->pdf->activity($userId,'3',$pdfId);
					return $new_like;
				}
				
			}
		}
			
	}


	public function disLikeCount($pdfId,$userId){
		$query = "INSERT INTO table_dislike(pdfId,userId) VALUES('$pdfId','$userId')";
		$result = $this->db->insert($query);

		$getqury = "SELECT * FROM table_pdf WHERE id='$pdfId'";
		$select = $this->db->select($getqury);

		if ($select) {
			while ($total_dislike = $select->fetch_assoc()) {
				$new_dislike = (int)$total_dislike['dislikes'];
				$new_like = (int)$total_dislike['likes'];
				
				if (self::ifLiked($pdfId,$userId)) {
					$new_like = $new_like - 1;
					$new_dislike = $new_dislike + 1;

					self::deleteLikeByUserId($pdfId,$userId);
					//$delquery = "DELETE FROM table_like WHERE pdfId='$pdfId' AND userId='$userId'";
					//$result = $this->db->delete($delquery);

					$updateQuery = "UPDATE `table_pdf` SET `likes`='$new_like' ,`dislikes`='$new_dislike' WHERE `id`='$pdfId'";
					$update  =$this->db->update($updateQuery);
					$this->pdf->activity($userId,'4',$pdfId);

					return $new_dislike;
					//return $new_dislike;
				}else{
					$new_dislike = $new_dislike +1;
					$updateQuery = "UPDATE `table_pdf` SET `likes`='$new_like', `dislikes`='$new_dislike' WHERE `id`='$pdfId'";
					$update  =$this->db->update($updateQuery);
					$this->pdf->activity($userId,'4',$pdfId);

					return $new_dislike;
					//return $new_dislike;
				}
			}
		}	
	}

	public function ifLiked($pdfId,$userId){
		$query = "SELECT * FROM table_like WHERE userId='$userId' AND pdfId='$pdfId'";
		$result = $this->db->select($query);
		if ($result) {
			$num_rows = $result->num_rows;
			if ($num_rows >0) {
				return true;
			}else{
				return false;
			}
		}
		
	}

	

	public function ifdisLiked($pdfId,$userId){
		$query = "SELECT * FROM table_dislike WHERE userId='$userId' AND pdfId='$pdfId'";
		$result = $this->db->select($query);
		if ($result) {
			$num_rows = $result->num_rows;
			if ($num_rows >0) {
				return true;
			}else{
				return false;
			}
		}
		
	}

	public function deleteLikeByUserId($pdfId,$userId){
		$delquery = "DELETE FROM table_like WHERE pdfId='$pdfId' AND userId='$userId'";
		$result = $this->db->delete($delquery);
	}

	public function deletedisLikeByUserId($pdfId,$userId){
		$delquery = "DELETE FROM table_dislike WHERE pdfId='$pdfId' AND userId='$userId'";
		$result = $this->db->delete($delquery);
	}


	public function loveCount($pdfId,$userId){
		$query = "INSERT INTO table_love(pdfId,userId) VALUES('$pdfId','$userId')";
		$result = $this->db->insert($query);

		$getqury = "SELECT * FROM table_pdf WHERE id='$pdfId'";
		$select = $this->db->select($getqury);

		if ($select) {
			while ($total_love = $select->fetch_assoc()) {
				$new_love = (int)$total_love['love'];
				$new_love = $new_love + 1;
					$updateQuery = "UPDATE `table_pdf` SET `love`='$new_love' WHERE `id`='$pdfId'";
					$update  =$this->db->update($updateQuery);
					$this->pdf->activity($userId,'5',$pdfId);

					return $new_love;
				
				/*if (self::ifLoved($pdfId,$userId)) {
					$updateQuery = "UPDATE `table_pdf` SET `love`='$new_love' WHERE `id`='$pdfId'";
					$update  =$this->db->update($updateQuery);
					$this->pdf->activity($userId,'5',$pdfId);

					return $new_love;
					//return $new_dislike;
				}else{
					$new_love = $new_love + 1;
					$updateQuery = "UPDATE `table_pdf` SET `love`='$new_love' WHERE `id`='$pdfId'";
					$update  =$this->db->update($updateQuery);
					$this->pdf->activity($userId,'5',$pdfId);

					return $new_love;
					//return $new_dislike;
				}*/
			}
		}	
	}

	public function ifLoved($pdfId,$userId){
		$query = "SELECT * FROM table_love WHERE userId='$userId' AND pdfId='$pdfId'";
		$result = $this->db->select($query);
		if ($result) {
			$num_rows = $result->num_rows;
			if ($num_rows >0) {
				return true;
			}else{
				return false;
			}
		}
		
	}

	public function downloadCount($pdfId,$userId){
		$result = $this->pdf->pdfDownloadCount($pdfId,$userId);
		return $result;
	}

	public function searchResult($dataquery){
		$query = "SELECT pdf.*, sub.subName, sub.subCode, user.name FROM table_pdf as pdf 
			INNER JOIN table_subject as sub ON pdf.pdfCategory = sub.id 
			INNER JOIN user_list as user ON pdf.uploader = user.id 
			WHERE pdfName like '%$dataquery%' OR pdfDescription LIKE '%$dataquery%' 
			OR subName LIKE '%$dataquery%' OR subCode LIKE '%$dataquery%' OR name LIKE '%$dataquery%' ORDER BY id DESC";

		$result = $this->db->select($query);
		$returnData = '';
		$returnData .= '<div class="queryresult"><ul>';

		if ($result) {
			while ($data = $result->fetch_assoc()) {
				$returnData .= '<li>'.$data['pdfName'].'</li>';
			}
		}else{
				$returnData .= '<li>No Result found</li>';
		}

		$returnData .= '</ul></div>';

		echo $returnData;
	}



	

}//end of class 

?>