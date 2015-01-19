<?php
	$currentPath = dirname(__FILE__);
	require_once $currentPath.'/classDB.php';

    $DBHOST	= 'localhost';
	$DBUSER = 'root';
	$DBPASS = '';
	$DATABASE = 'cssgendb';

	$db = new DB($DBHOST,$DBUSER, $DBPASS);
	$conn = $db->_link;
	$db->selectDB($DATABASE);

