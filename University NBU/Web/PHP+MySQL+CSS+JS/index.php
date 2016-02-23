<!--  Основна страница на сайта-->

<!-- Проверка за налична сесия и препращане към вътрешна страница-->
<?php
	session_name('mysession');
	session_start(); 	//Начало на сесията 
	//Проверка за log-нат потребител. Дали съществува запис в Сесията.
	if(isset($_SESSION['is_logged']))
	{
		//Проверка ако съществува запис го препраща ме в личната страница
	if ($_SESSION['is_logged']==true) {
		header('location: php/welcome.php');
	}
}
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">

		<title>Login</title>
	</head>
	<body>
	<!-- Основен Контейнер -->
		<div id="main-cover">

			<!-- Заглавна част на страницата-->
			<div class="inner">
				<h1><span style="color:red">C</span>alendar</h1>
			</div>
			<!-- Край на заглаваната част-->

			<!-- Основно тяло на страницата -->
			<div class="main-body">
				<!-- Съдаване на Базата данни -->
				<?php
					//Проверяваме дали базата данни съществува. Ако не създава нова.
					$dbhost	= 'localhost';
					$dbuser = 'root';
					$dbpass = '';

					$conn = mysql_connect($dbhost, $dbuser, $dbpass);
					if (!$conn) {
						die ('Could not connect: '.mysql_error());
					}
					mysql_select_db('CalendarDB');

					if (!mysql_select_db('CalendarDB'))
					{
			
					require_once("php/createDB.php");
					require_once("php/createDBTable.php");
					}
				?>
				
				<!-- Входна форма-->
				<form class="log-forma" method="POST" action="php/Login.php">
					<div>
						<br>
						<p>Username</p> <input type="text" name="IDLogin"  >
						<br>
						<p>Password</p> <input type="password" name="pass"  >
						<input type="submit" name="logs" value="LogIn" class="buttonStyle" id="buttons" >
					</div>
						
					<div>
						<br>
						<hr>
						<a href="php/forgetpass.php" class="buttonStyle">Forget Password</a>
						<a href="php/createNewUser.php" class="buttonStyle">Create Account</a>
					</div>
					
				</form>

				<!-- Часовник -->
				<div class="dateAndtime" ><?php include 'php/clock.php'; ?></div>
					<script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
					<script type="text/javascript">
						var auto_refresh = setInterval (
							function (){
								$('.dateAndtime').load('php/clock.php').fadeIn('slow');
							}, 1000 );
					</script>
			</div>

			<!-- Край на страницата - дъно -->
			<div class="footer">
				
			</div>
		</div>
	</body>
</html>

