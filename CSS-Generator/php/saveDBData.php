<?php
session_start();
require("DBConnection.php");

if ($_SESSION['is_logged'] == TRUE) {

    $guest = $_SESSION['Name'];
    
    // SELECT COUNT(*) as Total FROM users GROUP BY Guest
    
    $selectData  = mysql_query("SELECT * FROM users");
    if (!$selectData ) 
    {
            require_once("../php/CreateDBUserTable.php");
            die('Could not get data: ' . mysql_error());
    }
    else {
        $UserCode; //Тук поставя ме Данните при натискане на Save Button-a
        //Нужна е проверка за достигането на лимита на Всеки Гост до 5 CSS-a
        $Max = 1;
       /* while ($row = mysql_fetch_array($selectData) )
        {
            if($row[1] == $guest && $row[2] < 5 )
            {
               if ($Max < $row[2]) { $Max = $row[2]; }
               // //Iskame da prowerim koq e poslednata stojnost
                //while($row = mysql_fetch_array($selectData) )
                
            }
            
        }*/ // Pravilen kod za SQL SELECT `Guest`,`AddAt`, COUNT(*) FROM `users` GROUP BY `Guest` 
        $sql = mysql_query("SELECT COUNT(*) as Total FROM users GROUP BY Guest");
        echo $sql;
        $Max++; // Увеличаваме с единица за да можем да запазим данни на следващата стойност
        //$sql = "INSERT INTO `CSSGenDB`.`users` (`CodeID`, `User_code`) 
          //      VALUES ('0', '$UserCode');";
    }

}

