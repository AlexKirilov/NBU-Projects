<!DOCTYPE html>
<html lang="en"
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/common.css">

		<title>Login</title>
		<?php


		if ($_POST['submitForm']==1)
		{
			//Svurzvane kum localniq server
				$dbhost	= 'localhost';
				$dbuser = 'root';
				$dbpass = '';

				$conn = mysql_connect($dbhost, $dbuser, $dbpass);
				if (!$conn) {
				 die ('Could not connect: '.mysql_error());
				}
				//echo 'Connect successfully<br />';
				$loginMail = trim($_POST['e-mail-receive']);

				if (strlen($loginMail)>5)
				{

					//proverka za nali4nostta na potrebitelq
					mysql_select_db('CalendarDB');
					$selectData  = mysql_query("SELECT * FROM USERS");

					if (!$selectData ) 
					{
						die('Could not get data: ' . mysql_error());
					}
					else 
					{
						while ($row = mysql_fetch_array($selectData) )
						{
							if($row[3]== $loginMail ){
								$selectUser = $row[1];
								$selectPass = $row[2];
								echo '<br>'.
									 "Your Username is: ". $selectUser . '<br>' .
									 "Your Password is: ". $selectPass . '<br>';
							}
						}
					}
				}
				else echo "To short E-Mail";
		}

		?>
	</head>
	<body>
	<div id="main-cover">
		<div class="inner">
			<h1><span style="color:red">C</span>alendar</h1>
			<h3>Forget Password?</h3>
			<a href="../index.php" class="nachalo">Начало</a>
		</div>
			<div class="main-body">
				<form class="loginform" method="POST" action="../php/forgetpass.php">
					<div>
						<input type="hidden" name="submitForm" value="1">
						<input type="text" name="e-mail-receive" value="E-mail">
						<input type="submit" name="passreceive" value="Send" class="buttonStyle" id="buttons">
					</div>				
				</form>
			</div>
			<div class="footer">
				

			</div>
		</div>
		

	</body>
</html>

