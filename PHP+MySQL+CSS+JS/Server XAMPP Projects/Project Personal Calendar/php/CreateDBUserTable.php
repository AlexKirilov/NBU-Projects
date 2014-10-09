<?php
session_start();
if ($_SESSION['is_logged'] == false) {
		header('location: ../index.php');
	} else 
	{
		//$dbName = "DB_".$_SESSION['Name'];
		$dbhost	= 'localhost';
		$dbuser = 'root';
		$dbpass = '';

		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if (!$conn) {
			die ('Could not connect: '.mysql_error());
		}

		//echo 'Connect successfully';

		mysql_select_db('CalendarDB');

		$sql =  "CREATE TABLE dbUSER (".
					"ID				INT				NOT NULL	AUTO_INCREMENT,".
					//"year		 	INT	 	 		NOT NULL,".
					"month		 	INT	 	 		NOT NULL, ".
					"day		 	INT	 	 		NOT NULL, ".
					"User_ID		INT 			NOT NULL,".
					"User_Name		VARCHAR(50) 	COLLATE utf16_general_ci,".
					"User_data  	TEXT 		 	COLLATE utf16_general_ci,".
					"PRIMARY KEY(ID));";/*".$dbName."*/
						
			$retval = mysql_query( $sql, $conn );
			if (! $sql) 
			{
				if(! $retval )
				{
				  die('Could not create table: ' . mysql_error());
				}
			}
			echo '<br>'."Table created successfully\n";
		mysql_close($conn);
	}
?>