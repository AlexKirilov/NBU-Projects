<?php
  session_start();
		
				//Svurzvane kum localniq server
				$dbhost	= 'localhost';
				$dbuser = 'root';
				$dbpass = '';

				$conn = mysql_connect($dbhost, $dbuser, $dbpass);
				if (!$conn) {
				 die ('Could not connect: '.mysql_error());
				}
				//echo 'Connect successfully<br />';

	//parametri premahvashti praznite prostranstva predi i sled vuvedenite danni
	$loginUser = trim($_POST['IDLogin']);
	$loginPass = trim($_POST['pass']);
	//$loginPassCoded = md5($loginPass);               za kodirane na Password s MD5
	//echo $loginUser. ' | ' . $loginPass.'<br>';
	
	//proverka za nali4nostta na potrebitelq
	mysql_select_db('CalendarDB');
	$selectData  = mysql_query("SELECT * FROM USERS");
	
	//$selectPass  = mysql_query("SELECT 'Password' FROM USERS \n"."");
	//echo  $selectUser . '<br>'. $selectPass;
	//$sql = "SELECT `Username`,`Password` FROM `USERS` \n"	. "\n"	. "";
	//$returnuser = mysql_query( $selectUser, $conn);
	//$returnpass = mysql_query( $selectPass, $conn);

	if (!$selectData ) 
	{
		die('Could not get data: ' . mysql_error());
	}
	else {
		while ($row = mysql_fetch_array($selectData) )
		{
			if($row[1]== $loginUser && $row[2]==$loginPass){
				$selectID   = $row[0];
				$selectUser = $row[1];
				$selectPass = $row[2];
				$_SESSION['is_logged']=true;
				$_SESSION['Name'] = $loginUser;
				$_SESSION['ID'] = $selectID;
				header('location: ../php/welcome.php');
			}
		}
			echo '<br>'.'Sorry wrong Username or Password';
	}

mysql_close($conn);
?>
