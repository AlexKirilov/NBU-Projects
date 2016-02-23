<?php
  session_start();

	if ($_SESSION['is_logged'] == false) {
		header('location: ../index.php');
	} else 
	{
	    //Svurzvane kum localniq server
		$dbhost	= 'localhost';
		$dbuser = 'root';
		$dbpass = '';

		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if (!$conn) {
			die ('Could not connect: '.mysql_error());
		}
		mysql_select_db('CalendarDB');
		$selectData  = mysql_query("SELECT * FROM  dbUSER");
		if (!$selectData ) 
		{
			require_once("../php/CreateDBUserTable.php");
			die('Could not get data: ' . mysql_error());
		}
		else {
		//echo 'Connect successfully <br />';

				$DateMonth	   = $_GET['mon'];
				$DateDay	   = $_GET['day'];
				$UserID 	   = $_SESSION['ID'];
				$UserName 	   = $_SESSION['Name'];	
				$UserData	   = trim($_POST['userInfo']);
		
		if (strlen($UserData) >= 2 )
		{

			$sql = "INSERT INTO `calendardb`. dbUSER (`ID`, `month`, `day`, `User_ID`, `User_Name`, `User_data`) 
				    VALUES ('0', '$DateMonth', '$DateDay', '$UserID', '$UserName', '$UserData');";
					 	
			mysql_select_db('CalendarDB');

			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
			  die('Could not enter data: ' . mysql_error());
			}
			//echo "Entered data successfully\n";	
			header('location: ../php/welcome.php?mon='.$DateMonth.'&day='.$DateDay. '&I=1' );
		}
		//Dobavqne na greshka pri lipsa ili po maluk text. Error1 Welcome.php
		}			
	mysql_close($conn);
}
?>
