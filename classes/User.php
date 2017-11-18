<?php
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Session.php');
	//Session::chkLogin();
	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* User andmin login class 
*/
class User{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function UserLogin($data){
		$idemail = $this->fm->validation($data['idemail']);
		$idemail = mysqli_real_escape_string($this->db->link, $idemail);

		$password = $this->fm->validation($data['password']);
		$password = mysqli_real_escape_string($this->db->link, $password);
		$password = md5($password);

		if (empty($idemail) || empty($password)) {
			$msg = "<div style='color:#fff;font-size:16px;'>
  						<strong>Error!</strong> Both Fields are required.</div>";
  			return $msg;
		}

		$query = "SELECT * FROM user_list WHERE (studentId='$idemail' OR email='$idemail') AND password='$password'";
		$result = $this->db->select($query);

		if ($result !=false) {
			$values = $result->fetch_assoc();
			Session::init();
			Session::set("username", $values['name']);
			Session::set("studentId", $values['studentId']);
			Session::set("userId", $values['id']);
			Session::set("isLoggedIn",true);

			
			if ($values['isAdmin']=='1') {
				Session::set("isAdmin",true);
				Session::set("isUser",true);
			}else{
				Session::set("isAdmin",false);
				Session::set("isUser",true);
			}
			header("Location: index.php");

			
		}else{
			$msg = "<div style='color:#fff;font-size:16px;'>
  						<strong>Error!</strong> Student Id or email and password do not match.</div>";
  			return $msg;
		}

	}


	public function UserRegister($data){
		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->link, $email);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		$name = $this->fm->validation($data['name']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		$studentId = $this->fm->validation($data['studentId']);
		$studentId = mysqli_real_escape_string($this->db->link, $studentId);

		$password = $this->fm->validation($data['password']);
		$password = mysqli_real_escape_string($this->db->link, $password);
		$password = md5($password);

		$isAdmin = $this->fm->validation($data['isAdmin']);
		$isAdmin = mysqli_real_escape_string($this->db->link, $isAdmin);



		if (empty($email) || empty($name) || empty($studentId) || empty($password)) {
			$msg = "Please fill out every field";
			return $msg;
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$msg = "$email is not a valid email";
			return $msg;
		}else{
			$mailquery = "SELECT * FROM user_list WHERE email='$email'";
			$mailChk = $this->db->select($mailquery);
			$idquery = "SELECT * FROM user_list WHERE studentId='$studentId'";
			$idChk = $this->db->select($idquery);
			if ($mailChk != false) {
				$msg = "$email already exists";
				return $msg;
			}elseif($idChk != false){
				$msg = "$studentId already exists";
				return $msg;
			}else{
				$query = "INSERT INTO user_list(studentId,name,email,password,isAdmin)
				VALUES('$studentId','$name','$email','$password','$isAdmin')";

				$userReg = $this->db->insert($query);

				if ($userReg) {
					$msg = "You have been registerd successfully.<br> Please Login now";
					return $msg;
				}else{
					$msg = "There was an error<br> please try again or contact site admin";

					return $msg;
				}
			}
		}


	}

	public function getUserDataById($id){
		$query = "SELECT * FROM user_list WHERE id='$id'";
		$data = $this->db->select($query);
		return $data;
	}

	public function changePassword($data,$id){

		$oldPassword = $this->fm->validation($data['oldPassword']);
		$oldPassword = mysqli_real_escape_string($this->db->link, $oldPassword);
		$hashed_oldPassword = md5($oldPassword);

		$newPassword = $this->fm->validation($data['newPassword']);
		$newPassword = mysqli_real_escape_string($this->db->link, $newPassword);
		$hashed_newPassword = md5($newPassword);

		$renewPassword = $this->fm->validation($data['renewPassword']);
		$renewPassword = mysqli_real_escape_string($this->db->link, $renewPassword);
		//$renewPassword = md5($renewPassword);

		if (empty($oldPassword) || empty($newPassword) || empty($renewPassword)) {
			$msg = "please fill all the fields";
			return $msg;
		}else{

			if ($newPassword !== $renewPassword) {
				$msg = "New passwords do not match";
				return $msg;
			}else{
				$pwdquery = "SELECT * FROM user_list WHERE id='$id'";

				$result = $this->db->select($pwdquery);
				if ($result) {
					$passwordData = $result->fetch_assoc();
					if ($passwordData['password'] !== $hashed_oldPassword) {
						$msg = "Please Enter the right password";
						return $msg;
					}else{
						$query = "UPDATE user_list SET
							password = '$hashed_newPassword'
							WHERE id='$id'";

						$pwdChng = $this->db->update($query);
						if ($pwdChng) {
							$msg = "password changed";
							return $msg;
						}else{
							$msg = "there was an error changing password";
							return $msg;
						}
					}
				
				}else{
					Session::destroy();
				}
				
			}
		}
	}


	public function UpdateProfileById($data,$id){
		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->link, $email);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		$name = $this->fm->validation($data['name']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		if (empty($email) || empty($name)) {
			$msg = "Every field must be filled";
			return $msg;
		}else{
			$query = "UPDATE user_list SET
							email = '$email',
							name = '$name'
							WHERE id='$id'";

				$updateProfile = $this->db->update($query);
				if ($updateProfile) {
					$msg = "Profile Updated";
					return $msg;
				}else{
					$msg = "there was an error updating profile";
					return $msg;
				}
		}
	}


	public function userActivity($id){
		$query = "SELECT activity.*, pdf.pdfName FROM table_activity as activity, table_pdf  as pdf WHERE activity.userId='$id' AND activity.pdfId=pdf.id ORDER BY activity.id DESC LIMIT 15";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllUser(){
		$query = "SELECT * FROM user_list ORDER BY id DESC";

		$result = $this->db->select($query);
		return $result;
	}

	public function makeAdmin($id){
		$query = "UPDATE user_list SET
							isAdmin = '1'
							WHERE id='$id'";

			$makeAdmin = $this->db->update($query);
			if ($makeAdmin) {
				$msg = "Profile Updated";
				return $msg;
			}else{
				$msg = "there was an error updating profile";
				return $msg;
			}
	}


	public function unAdmin($id){
		$query = "UPDATE user_list SET
							isAdmin = '0'
							WHERE id='$id'";

			$makeAdmin = $this->db->update($query);
			if ($makeAdmin) {
				$msg = "Profile Updated";
				return $msg;
			}else{
				$msg = "there was an error updating profile";
				return $msg;
			}
	}


}//end of class 

?>