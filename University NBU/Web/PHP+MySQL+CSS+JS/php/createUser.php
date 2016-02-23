<!-- Запис в Базата Данни на новия потребител -->

<?php
    //Svurzvane kum localniq server
	$dbhost	= 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if (!$conn) {
		die ('Could not connect: '.mysql_error());
	}
	//echo 'Connect successfully<br />';

			$UsernameAdd   = trim($_POST['IDUserName']);
			$PasswordAdd   = trim($_POST['pass']);	
			$RePasswordAdd = trim($_POST['re-pass']);
			$FirstNameAdd  = trim($_POST['first-name']);
			$SecondNameAdd = trim($_POST['second-name']);
			$EMailAdd      = trim($_POST['eMail']);
			$ReEmailAdd    = trim($_POST['re-eMail']);
	
	if (strlen($UsernameAdd)>3 && strlen($PasswordAdd)>4)
	{
		//Proverka za sushtestvuvasht Username
		mysql_select_db('CalendarDB');
		$selectData  = mysql_query("SELECT * FROM USERS"); /////////////////////////////////////////////////////////
		if (!$selectData ) 
		{
			die('Could not get data: ' . mysql_error());
		}
		else {
			while ($row = mysql_fetch_array($selectData) )
			{
				if($row[1]== $UsernameAdd || $row[3]==$EMailAdd ){
					$checkUser = $row[1];
					$checkMail = $row[3];
					break;
				}
			}
		}
			/*
		//Proverka za veche sus6testvuvasht E-mail addres.
		while ($row = mysql_fetch_array($selectData) 
		{
			if($row[3]==$EMailAdd) {
				header('Location: ../php/createNewUser.php?error=5'); //5 = Email already Exist
			}
		}*/

		if ($checkUser != $UsernameAdd)	
		{										
			if ($PasswordAdd == $RePasswordAdd)
			{

				if ($EMailAdd == $ReEmailAdd)
				{

				    $sql = "INSERT INTO `calendardb`.`users` (`ID`, `Username`, `Password`, `Email`, `First_name`, `Second_name`) 
				  		    VALUES ('0', '$UsernameAdd', '$PasswordAdd', '$EMailAdd', '$FirstNameAdd', '$SecondNameAdd');";
				 	
				 	mysql_select_db('CalendarDB');

				    $retval = mysql_query( $sql, $conn );
				    if(! $retval )
					{
					  die('Could not enter data: ' . mysql_error());
					}
					echo "Entered data successfully\n";	
					header('location: ../index.php');
				}
				else {
					header('location: ../php/createNewUser.php?error=2');//2 = wrongemail
				}

			}
			else {
				header('location: ../php/createNewUser.php?error=1');//1 = wrongpass
			}
		}
		else {
			header('Location: ../php/createNewUser.php?error=4'); //4 = User Exist
		}

	}
	else {
		header('Location: ../php/createNewUser.php?error=3');//3= na nepravilno vuvedeni danni
	}

	mysql_close($conn);

	//Ostavashti proverki: Fname and Sname / E-mail - vuvejdane i sushtestvuvasht.
?>