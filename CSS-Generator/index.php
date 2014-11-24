<?php
session_start ();

// Checks if the database exists and if the db is not found - tries to create it.
require_once ("php/DBConnection.php"); // MySQL Connection';
                                       // Cheking for existing DB & Tables
if (!$db->selectDB($DATABASE)) {
	require_once ("php/createDB.php"); // Creating DB
	require_once ("php/createDBTable.php"); // Table fo Guest IDName and date on reg
	require_once ("php/createDBData.php"); // Table for Code
}
// Includes the user class and creates instance of it. Constructor is responsible to initialize if customer is logged or not.
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

		<div class="header" id="header">
			<h1>CSS3 Generator</h1>
		</div>

		<div class="main-body" id="mainbody">
		<?php include ("components/main.php");?>
        <?php
			if (! $user->is_loged) {
			?>
            <?php include("components/loginform.php");?>
             <?php include("components/registerform.php");?>
        <?php } ?>
    </div>
		<!-- END Main Body -->

	<div class="footer" id="footer">
		<hr />
			<p>Copy rights NBU Students</p>
			<!-- onclick js messege-box students name -->
	</div>
</body>
</html>
