<?php
	$filepath = realpath(dirname(__FILE__));

	//include_once ($filepath.'/../lib/Session.php');
	//Session::chkLogin();
	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* sub add delete update 
*/
class Subject{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function insertSubject($data){
		$subName = $this->fm->validation($data['subName']);
		$subCode = $this->fm->validation($data['subCode']);

		$subName = mysqli_real_escape_string($this->db->link,$subName);
		$subCode = mysqli_real_escape_string($this->db->link,$subCode);

		if (empty($subName)) {
			$msg = "<span class='error'>Subject Name must not be empty</span>";
			return $msg;
		}elseif (empty($subCode)) {
			$msg = "<span class='error'>Subject Code must not be empty</span>";
			return $msg;
		}else{
			$query = "INSERT INTO table_subject(subName,subCode) VALUES('$subName','$subCode')";
			$subInsert = $this->db->insert($query);

			if ($subInsert) {
				$msg = "<span class='success'>Subject inserted successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Subject not inserted <br> please try again</span>";
				return $msg;
			}
		}
	}

	public function getAllSubject(){
		$query = "SELECT * FROM table_subject ORDER BY id DESC";

		$result = $this->db->select($query);
		return $result;
	}

	public function getSubjectById($id){
		$query = "SELECT * FROM table_subject WHERE id='$id'";

		$result = $this->db->select($query);
		return $result;
	}

	public function deleteSubjectById($id){
		$query = "DELETE FROM table_subject WHERE id='$id'";

		$deleted_sub = $this->db->delete($query);

		if ($deleted_sub) {
			$msg = "<span class='success'>Subject deleted</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Subject Not deleted</span>";
			return $msg;
		}
	}


	public function updateSubjectById($data,$id){
		$subName = $this->fm->validation($data['subName']);
		$subCode = $this->fm->validation($data['subCode']);

		$subName = mysqli_real_escape_string($this->db->link,$subName);
		$subCode = mysqli_real_escape_string($this->db->link,$subCode);

		$query = "UPDATE table_subject SET 
				 subName = '$subName',
				 subCode = '$subCode'
				 WHERE id = '$id'";

		$update_row = $this->db->update($query);

		if ($update_row) {
			$msg = "<span class='success'>Subject Updated</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Subject Not Updated</span>";
			return $msg;
		}

	}




}//end of class 

?>