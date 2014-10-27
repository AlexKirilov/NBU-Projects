<?php
//Creating DB Table
    require("DBConnection.php");

$sql =  "CREATE TABLE users (".
			"ID			INT		NOT NULL	AUTO_INCREMENT,".
			"Guest  		VARCHAR(60) 	COLLATE utf16_general_ci,".
                        "IPAdd			INT UNSIGNED    NULL            DEFAULT NULL,".
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
