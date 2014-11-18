<?php
//Creating DB Table
    require("DBConnection.php");

$sql =  "CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`username`),
  KEY `password` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=3 ;";
				
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
