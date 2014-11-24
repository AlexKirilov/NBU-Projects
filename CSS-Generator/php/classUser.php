<?php
require ("DBConnection.php"); // MySQL Connection
require ("getIP.php"); // Get the reall IP
class User {
	public $username;
	public $user_id;
	public $is_loged = false;
	private $session_timeout = 300000;
	private $db;
	function __construct(DB $db) {
		$this->is_loged = $this->isLogged ();
		$this->db = $db;
	}
	function isLogged() {
		if (isset ( $_SESSION ['logged'] ) && ! empty ( $_SESSION ['logged'] ) && time () - $_SESSION ['lastAction'] < $this->session_timeout) {
			return true;
		} else {
			return false;
		}
	}
	function login($username, $password) {
		$username = mysql_real_escape_string ( $username );
		$password = mysql_real_escape_string ( $password );
		$query = "SELECT * FROM users WHERE username='$username' and `password`=MD5('$password')";
		$result = $this->db->query($query);
		if (mysql_num_rows ( $result ) == 1) {
			$row=mysql_fetch_array($result);
			$_SESSION ['logged'] = true;
			$_SESSION['userid'] = $row['ID'];
			$_SESSION ['lastAction'] = time ();
			return true;
		} else {
			return false;
		}
	}
	function register($username,$password,$email,$firstname, $lastname){
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		$email = mysql_real_escape_string($email);
		$firstname = mysql_real_escape_string($firstname);
		$lastname = mysql_real_escape_string($lastname);
		$fields = array();
		$fields['password'] =  md5($password);
		$fields['email'] = $email;
		$fields['first_name'] = $firstname;
		$fields['last_name'] = $lastname;
		$fields['username'] = $username;
		$query= "SELECT * FROM users WHERE username='$username' ";
		$result = $this->db->query($query);
		if (mysql_num_rows( $result ) > 0) {
			return false;
		} else {
			$result = $this->db->insert('users',$fields);
			if (!$result) return false;
			$userID = $this->db->getInsertID();
			$_SESSION['logged'] = true;
			$_SESSION['lastAction'] = time();
			$_SESSION['userid'] = mysql_insert_id();
			return true;
		}
	}
	function update_details($user_id,$password,$email,$firstname, $lastname){
		$fields = array();
		$fields['password'] =  md5($password);
		$fields['email'] = $email;
		$fields['first name'] = $firstname;
		$fields['last name'] = $lastname;
		$result = $this->db->update('users',$fields,"ID = '$user_id'");
		$_SESSION['logged'] = true;
		$_SESSION['lastAction'] = time();
		$_SESSION['userid'] = $username;
		return true;
	}
}
?>