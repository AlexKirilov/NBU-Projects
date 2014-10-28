<?php

require("DBConnection.php");// MySQL Connection
require("getIP.php"); //Get the reall IP

    //Checking for local IP
    if ($user_ip === '::1'){
        $user_ip = '127.0.0.1';
    }
    
    $user_ip = ip2long ($user_ip);//Comverting the IP into INT to be saved in DB

    $selectData  = mysql_query("SELECT * FROM users"); 
    if (!$selectData ) 
    {
            die('Could not get data: ' . mysql_error());
    }
    else {
        $boolIP = FALSE;
        $i = 1; // index for next guest, how`s not at the system.
        $guest = 'Guest'.$i;
        while ($row = mysql_fetch_array($selectData) )
        {
            //Checking for existing IP
            if ( $user_ip == $row[2])
            {
                $boolIP = TRUE;
                $guestTrue = $row[1];
            }else{
            $i++;
            $guest = 'Guest'.$i;
            }
        }
        // IP doestn`exist - creating the Account
        if ($boolIP == FALSE)
        {
            $sql = "INSERT INTO users ( ID , Guest , IPAdd )
                    VALUES ('0','$guest','$user_ip')";
            $_SESSION['is_logged'] = true;
            $_SESSION['Name'] = $guest;
            $retval = mysql_query( $sql, $conn );
            if(! $retval )
            {
              die('Could not enter data: ' . mysql_error());
            }
            echo "<p id = sessionI >Session Start successfully Create new guest\n</p>";
        }//IP exist - welcome to user
        elseif ($boolIP == TRUE) 
        {
            $_SESSION['is_logged'] = true;
            $_SESSION['Name'] = $guestTrue;
            echo "<p id = sessionI >Session Start successfully\n</p>";
        }  
    }  	
mysql_close($conn);
