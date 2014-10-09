<?php
	$dbhost	= 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if (!$conn) {
		die ('Could not connect: '.mysql_error());
	}
	//echo 'Connect successfully<br />';
	mysql_select_db('CalendarDB');

	if (!mysql_select_db('CalendarDB'))
	{
		$sql = 'CREATE DATABASE CalendarDB COLLATE utf16_general_ci';
		$retval = mysql_query( $sql, $conn );
		if(! $retval ) {
			die ('Could not create database: '.mysql_error());
		}
		//echo '<br>'."Database CalandarDB created successfully\n";
	}
	mysql_close($conn);

?>