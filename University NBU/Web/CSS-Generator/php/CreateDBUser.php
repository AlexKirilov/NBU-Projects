<?php

require("DBConnection.php");// MySQL Connection
require("getIP.php"); //Get the reall IP

class User {
    public $username;
    public $user_id;
    public $is_loged = false;
    private $session_timeout = 300000;
    function __construct(){
        $this->is_loged = $this->isLogged();
    }
    function isLogged(){
        if (isset($_SESSION['logged']) && !empty($_SESSION['logged']) && time() - $_SESSION['lastAction']< $this->session_timeout){
            return true;
        } else {
           return false;
        }
    }
    function login($username, $password){
         $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        $query = "SELECT * FROM users WHERE username='$username' and `password`=MD5('$password')";
        $result = mysql_query($query);
        if (mysql_num_rows($result)==1){
            $_SESSION['logged']= true;
            $_SESSION['lastAction'] = time();
            return true;
        } else {
            return false;
        }
    }
    function register($username, $password){
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        $query = "SELECT * FROM users WHERE username='$username' ";
        $result = mysql_query($query);
        if (mysql_num_rows($result)>0){
            return false;
        } else {
            $query = "INSERT INTO users (username,`password`) VALUES ('$username',MD5('$password')) ";
            mysql_query($query);
            return true;
        }
        
    }
    
}
?>