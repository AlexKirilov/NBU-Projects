<?php
	require_once 'php/classDB.php';

    $DBHOST	= 'localhost';
	$DBUSER = 'root';
	$DBPASS = '';
	$DATABASE = 'CSSGenDB';

	$db = new DB($DBHOST,$DBUSER, $DBPASS);
	$conn = $db->_link;

