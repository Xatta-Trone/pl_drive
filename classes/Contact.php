<?php
	$filepath = realpath(dirname(__FILE__));

	//include_once ($filepath.'/../lib/Session.php');
	//Session::chkLogin();
	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* sub add delete update 
*/
class Contact{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function insertContact($data){
		$name = $this->fm->validation($data['name']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->link, $email);

		$mesaage = $this->fm->validation($data['mesaage']);
		$mesaage = mysqli_real_escape_string($this->db->link, $mesaage);

		if (empty($name) || empty($email) || empty($mesaage)) {
			$msg = "<p><strong style='color:#fff;font-size:25px;'>Please Fillout all fields</strong></p>";
			return $msg;
		}else{
			$query = "INSERT INTO table_contact(name,email,message) VALUES('$name','$email','$mesaage')";
			$result = $this->db->insert($query);
			if ($result) {
				$msg = "<p style='color:#fff;font-size:25px;'>Thank you for your response</p>";
				return $msg;
			}else{
				$msg = "<p><strong style='color:#fff;font-size:25px;'>there was an error sending the message<br> please try again</strong></p>";
				return $msg;
			}
		}

	}

	public function getAllmessage(){
		$query = "SELECT * FROM table_contact WHERE seen='0' ORDER BY id DESC";

		$result = $this->db->select($query);
		return $result;
	}

	public function getMsgById($mid){
		self::markAsRead($mid);

		$query = "SELECT * FROM table_contact WHERE id='$mid'";

		$result = $this->db->select($query);
		return $result;
	}

	public function markAsRead($mid){
		$query = "UPDATE table_contact SET seen='1' WHERE id='$mid'";
		$result = $this->db->update($query);
	}

	
	public function getAllReadmessage(){
		$query = "SELECT * FROM table_contact WHERE seen='1' ORDER BY id DESC";

		$result = $this->db->select($query);
		return $result;
	}

	public function sendMail($data){
		$toemail = $this->fm->validation($data['toemail']);
		$toemail = mysqli_real_escape_string($this->db->link, $toemail);
		$toemail = filter_var($toemail, FILTER_SANITIZE_EMAIL);

		$fromemail = $this->fm->validation($data['fromemail']);
		$fromemail = mysqli_real_escape_string($this->db->link, $fromemail);
		$fromemail = filter_var($fromemail, FILTER_SANITIZE_EMAIL);

		$subject = $this->fm->validation($data['subject']);
		$subject = mysqli_real_escape_string($this->db->link, $subject);

		$body = $this->fm->validation($data['body']);
		$body = mysqli_real_escape_string($this->db->link, $body);

		$sendmail  = mail($toemail, $subject, $body,$fromemail);

		if ($sendmail) {
			$msg = "<span class='success'>mail sent successfully</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>mail not sent successfully</span>";
			return $msg;
		}
	}


	public function insertNewsLetter($data){
		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->link, $email);

		if (empty($email)) {
			$msg = "<p><strong style='color:#fff;font-size:25px;'>Please enter an email</strong></p>";
			return $msg;
		}else{
			$query = "INSERT INTO table_newsletter(email) VALUES('$email')";
			$result = $this->db->insert($query);
			if ($result) {
				$msg = "<p style='color:#fff;font-size:15px; text-align:right;'>Thank you</p>";
				return $msg;
			}else{
				$msg = "<p><strong style='color:#fff;font-size:15px;text-align:right;'>there was an error<br> please try again</strong></p>";
				return $msg;
			}
		}

	}
	


	
}//end of class 

?>

