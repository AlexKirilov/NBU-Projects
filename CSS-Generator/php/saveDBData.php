<?php
session_start();
require("DBConnection.php");
// Includes the user class and creates instance of it.
require_once ("php/classUser.php");
$user = new User ($db); //Creates user object and constructor is responsible for checking if the user is already logged

if ($user->is_loged) {

    $guestDB = $_SESSION['Name'];
    
    $selectData  = mysql_query("SELECT * FROM code WHERE GuestID = '".$user->user_id."'");
    if (!$selectData ) 
    {
        die('Could not get data: ' . mysql_error());
    }
    else 
    {       
        $UserCode; //Ð¢ÑƒÐº Ð¿Ð¾Ñ�Ñ‚Ð°Ð²Ñ� Ð¼Ðµ Ð”Ð°Ð½Ð½Ð¸Ñ‚Ðµ Ð¿Ñ€Ð¸ Ð½Ð°Ñ‚Ð¸Ñ�ÐºÐ°Ð½Ðµ Ð½Ð° Save Button-a
        $CodeName; //Imeto na code
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
        
        if ($Max <= 5) {
            $sql = "INSERT INTO code ( ID , GuestID , CodeID ,CodeName, User_code )
                    VALUES ( '0','$guestDB','$Max','$CodeName', '$UserCode' )";
        }
        else {
            //Izvajda JS suobshtenie za maksimalen broi zapisi
            echo 'Sorry you`ve reached the maximum options for saving data. /n ';
        }
    }
} else {
	echo "You should be logged in, in order to use that functionality.";
}
mysql_close($conn);
