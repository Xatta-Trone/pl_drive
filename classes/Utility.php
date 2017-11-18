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
class Utility{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getUserCount($table='user_list'){
		$query = "SELECT COUNT('id') as total FROM $table";

		$result = $this->db->select($query);
		//return $result;
		if ($result) {
			while ($data = $result->fetch_assoc()) {
				return $data['total'];
			}
		}
	}

	public function getSearchResult($searchQuery){
		$query = "SELECT pdf.*, sub.subName, sub.subCode, user.name FROM table_pdf as pdf 
				INNER JOIN table_subject as sub ON pdf.pdfCategory = sub.id 
				INNER JOIN user_list as user ON pdf.uploader = user.id 
				WHERE pdfName like '%$searchQuery%' OR pdfDescription LIKE '%$searchQuery%' 
				OR subName LIKE '%$searchQuery%' OR subCode LIKE '%$searchQuery%' OR name LIKE '%$searchQuery%' ORDER BY id DESC";

			$result = $this->db->select($query);
			return $result;
	}

	




}//end of class 

?>