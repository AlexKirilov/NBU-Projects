<?php
        $dbhost	= 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if (!$conn) {
		die ('Could not connect: '.mysql_error());
	}
	//echo 'Connect successfully <br />';
	mysql_select_db('CSSGenDB');// Connecting with DB

