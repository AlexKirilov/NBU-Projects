<?php
session_start();
require("../php/DBConnection.php");
// Includes the user class and creates instance of it.
require_once ("../php/classUser.php");
$user = new User ($db); //Creates user object and constructor is responsible for checking if the user is already logged

if ($user->is_loged) {
	$cssID = $_POST['id'];
    
    $selectData  = mysql_query("SELECT * FROM code WHERE GuestID = '".$user->user_id."' AND ID = '".$cssID."' ");
    if (!$selectData ) 
    {
        die('Could not get data: ' . mysql_error());
    }
    else 
    {       
       $row = mysql_fetch_array($selectData);
       echo  "css style - ".$row['CodeName']. " - " .$row['User_code'];
    }
} else {
	echo "error";
}
mysql_close($conn);
