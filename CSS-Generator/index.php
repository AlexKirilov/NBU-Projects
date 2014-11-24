<?php
session_start ();

// Checks if the database exists and if the db is not found - tries to create it.
require_once ("php/DBConnection.php"); // MySQL Connection';
                                       // Cheking for existing DB & Tables
if (!$db->selectDB($DATABASE )) {
	require_once ("php/createDB.php"); // Creating DB
	require_once ("php/createDBTable.php"); // Table fo Guest IDName and date on reg
	require_once ("php/createDBData.php"); // Table for Code
}
// Includes the user class and creates instance of it.
require_once ("php/classUser.php");
$user = new User ($db);
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="common.css">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ajaxJS.js"></script>
<script type="text/javascript"	src="js/jquery.validate.min.js"></script>
</head>
<body>
	<div id="main-container">

		<div class="header">
			<p class="golden-border">CSS3</p>
			<h1 class="site-name" style="display: none">CSS3 code generator</h1>

		</div>

		<div class="main-body" id="mainbody">
        <?php
			if (! $user->is_loged) {
			?>
            <?php include("components/loginform.php");?>
             <?php include("components/registerform.php");?>
        <?php } else {?>
             <?php include ("components/main.php");?>
        <?php } ?>
    </div>
		<!-- END Main Body -->

		<div class="footer">
			<hr>
			<div class="sesDel">
				<a href="php/DestroySes.php" id="logout"<?php if (!$user->is_loged) echo "style=\"display: none;\"";?>">Log
					Out</a>
				<p>Copy rights NBU Students</p>
				<!-- onclick js messege-box students name -->
			</div>
		</div>

	</div>
</body>
</html>
