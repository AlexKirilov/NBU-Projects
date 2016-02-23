<?php
session_start();
require("../php/DBConnection.php");
// Includes the user class and creates instance of it.
require_once ("../php/classUser.php");
$user = new User ($db); //Creates user object and constructor is responsible for checking if the user is already logged

if ($user->is_loged) {
	$cssCode = $_POST['css'];
	$cssName = $_POST['cssname'];
    
    $selectData  = mysql_query("SELECT * FROM code WHERE GuestID = '".$user->user_id."'");
    if (!$selectData ) 
    {
        die('Could not get data: ' . mysql_error());
    }
    else 
    {       
        $UserCode = $cssCode; //Тук поставя ме Данните при натискане на Save Button-a
        $CodeName = $cssName; //Imeto na code
        $Max = 1;
        //SELECT COUNT(*) as Total FROM users GROUP BY Guest
        $guestDB = $user->user_id;
        while ($row = mysql_fetch_array($selectData) )
        {
            if( $guestDB == $row[1] && $Max < 6 )
            {
                $Max++;
            }
        }
        
		$sql = "INSERT INTO code ( GuestID , CodeID ,CodeName, User_code )
                    VALUES ( '$guestDB','$Max','$CodeName', '$UserCode' )";
		mysql_query($sql,$conn);
		include("savedcssclasses.php");
        
    }
} else {
	echo "error";
}
mysql_close($conn);
