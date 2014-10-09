<!-- Създаване на нов потребител -->
<?php 
	//if ($_GET['error']==1) echo "The password doesn`t match";
	//if ($_GET['error']==2) echo "The E-Mail doesn`t match";
	//if ($_GET['error']==3) echo "wrong input".'<br>';
	//if ($_GET['error']==4) echo "This username is already exist";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create User</title>
	<meta charset="utf-8">
		<link rel="stylesheet" href="../css/common.css">
		<script type="text/javascript" src="../js/validate.js"></script>
		<?php 
			if(isset($_GET['error']))
			 {
			 	$GLOBALS['error'] = $_GET['error'];
			 }
			 ?>
</head>
<body>
  <div id="main-cover">
	<div class="inner">
		<h1><span style="color:red">C</span>alendar</h1>
		<h3>Registration Field</h3>
		<a href="../index.php" class="nachalo">Начало</a>
	</div>
	<div class="main-body">
		<form class="loginform" method="post" action="../php/createUser.php" id="emailForm">
	
				<div class="idPass">
						Username:* <br>
						<input type="text" name="IDUserName" ><?php if(isset($_GET['error']))
															 {	if($_GET['error'] == 4) echo " The username already exist"; } ?>
						
						<br> Password:* <br>
						<input type="password" name="pass" ><?php if(isset($_GET['error']))
															 {	if($_GET['error'] == 1) echo " The password doesn`t match"; } ?>
						<br> re-Password:* <br>
						<input type="password" name="re-pass" >
						<br>
				</div>
				<div>
						<br> First name:* <br>
						<input type="text" name="first-name" > <?php if(isset($_GET['error']))
															 {	if($_GET['error'] == 6) echo " Please enter the name"; } ?>
						<br> Second name:* <br>
						<input type="text" name="second-name" >
						
				</div>
				<div>
						<br> E-mail:* <br>
						<input type="text" name="eMail" id="email" ><?php if(isset($_GET['error']))
															 {	if($_GET['error'] == 5) echo " The e-mail already exist"; } ?>
						<br> re-E-mail:* <br>
						<input type="text" name="re-eMail" ><?php if(isset($_GET['error']))
															 {	if($_GET['error'] == 2) echo " The e-mail doesn`t match"; } ?>
						<p id="msg"></p><?php if(isset($_GET['error']))
											{	if($_GET['error'] == 3) echo " Wrong inputs"; } ?>
				</div>
						<br>
						<input type="submit" name="create" value="Create"  class="buttonStyle" id="buttons" onClick="validate()">
		</form>
	  </div>
  </div>

</body>
</html>
