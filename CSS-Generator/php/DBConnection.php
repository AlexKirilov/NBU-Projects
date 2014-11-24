<?php
	require_once 'php/classDB.php';

    $DBHOST	= 'localhost';
	$DBUSER = 'root';
	$DBPASS = '';
	$DATABASE = 'cssgendb';

	$db = new DB($DBHOST,$DBUSER, $DBPASS);
	$conn = $db->_link;
	$db->selectDB($DATABASE);

