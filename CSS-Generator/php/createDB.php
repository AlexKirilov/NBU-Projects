<?php
    //Creating DB
    require_once ("DBConnection.php");
	if (!mysql_select_db('CSSGenDB'))
	{
		$sql = 'CREATE DATABASE CSSGenDB COLLATE utf16_general_ci';
		$retval = mysql_query( $sql, $conn );
		if(! $retval ) {
			die ('Could not create database: '.mysql_error());
		}
		//echo '<br>'."Database CSSGenDB created successfully\n";
	}
	mysql_close($conn);

