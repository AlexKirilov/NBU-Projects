<?php
    session_start();
    require_once ("php/DBConnection.php");// MySQL Connection';
    //Cheking for existing DB & Tables
	if (!mysql_select_db('CSSGenDB'))
	{
            require_once("php/createDB.php");        //Creating DB
            require_once("php/createDBTable.php");  //Table fo Guest IDName and date on reg
            require_once("php/createDBData.php");  //Table for Code
        }
    require_once ("php/CreateDBUser.php");
    $user = new User();
    if (isset($_POST['username']) && isset($_POST['password'])){
        if ($user->login($_POST['username'],$_POST['password'])){
            include ("components/main.php");
        } else {
            echo "false";
        }
    } else {
        echo 'false';
    }
?>