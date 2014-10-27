<?php

require("DBConnection.php");
require("getIP.php");
//Дата на създаване не потребителя
//$date  = time();
//$day   = date('d' , $date);
//$month = date('m' , $date);
//$year  = date('Y' , $date);
//$AddDate = $day."/".$month."/".$year;

//Дали да правим проверка за IP адреса на потребителя, за да се избегнат различните 
//Guest-ove с различните Browser-s и тези IP-a  ги запазваме в базата данни ???????
    echo $user_ip."<br>";
    if ($user_ip === '::1'){
        $user_ip = '127.0.0.1';
    }
    $user_ip = ip2long ($user_ip);
    echo $user_ip."<br>";
    //Проверява ме за вече съществъващ гост
    $selectData  = mysql_query("SELECT * FROM users"); 
    if (!$selectData ) 
    {
            die('Could not get data: ' . mysql_error());
    }
    else {
        $i = 1; // index za poreden nomer na potrebitelq.
        $guest = 'Guest'.$i;
        while ($row = mysql_fetch_array($selectData) )
        {
            if($row[1] == $guest && $row[2] != $user_ip )
            {
                $i++;
                $guest = 'Guest'.$i;
            }     
        }
        $sql = "INSERT INTO `cssgendb`.`users` (`ID`, `Guest`, 'IPAdd') 
                VALUES ('0', '$guest', '$user_ip');";
        $_SESSION['is_logged'] = true;
        $_SESSION['Name'] = $guest;
    }
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
        {
          die('Could not enter data: ' . mysql_error());
        }
        echo "Session Start successfully\n";	
mysql_close($conn);
