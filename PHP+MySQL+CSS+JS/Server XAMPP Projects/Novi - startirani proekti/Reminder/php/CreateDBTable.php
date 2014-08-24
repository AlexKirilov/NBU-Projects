<?php
$dbhost	= 'localhost';
$dbuser = 'root';
$dbpass = '';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$conn) {
	die ('Could not connect: '.mysql_error());
}

//echo 'Connect successfully';

mysql_select_db('CalendarDB');

$sql =  "CREATE TABLE USERS (".
			"ID				INT				NOT NULL	AUTO_INCREMENT,".
			"Username		VARCHAR(50) 	COLLATE utf16_general_ci,".
			"Password		VARCHAR(30) 	COLLATE utf16_general_ci, ".
			"Email			VARCHAR(120) 	COLLATE utf16_general_ci, ".
			"First_name		VARCHAR(60) 	COLLATE utf16_general_ci, ".
			"Second_name	VARCHAR(60) 	COLLATE utf16_general_ci,".
	//		"BirthDay		DATE,".
	//		"Status			INT,".
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
?>