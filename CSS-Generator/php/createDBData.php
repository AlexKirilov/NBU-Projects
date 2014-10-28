<?php
//Creating DB Table
    require("DBConnection.php");

$sql =  "CREATE TABLE CODE (".
			"ID			INT		NOT NULL	AUTO_INCREMENT,".
			"GuestID  		VARCHAR(60) 	COLLATE utf16_general_ci,".
			"CodeID                 INT		NOT NULL,".
                        "CodeName  		VARCHAR(100) 	COLLATE utf16_general_ci,".
                        "User_code        	TEXT	 	COLLATE utf16_general_ci,".
			"PRIMARY KEY(ID));";
				
$retval = mysql_query( $sql, $conn );
if (! $sql) 
{
        if(! $retval )
        {
          die('Could not create table: ' . mysql_error());
        }
}
//echo '<br>'."Table created successfully\n";
mysql_close($conn);
