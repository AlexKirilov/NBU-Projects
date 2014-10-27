<?php
session_start();

    //Проверяваме дали базата данни съществува. Ако не - се създава такава.
    $dbhost	= 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if (!$conn) {
            die ('Could not connect: '.mysql_error());
	}
	mysql_select_db('CSSGenDB');
        //Cheking for existing DB & Tables
	//if (!mysql_select_db('CSSGenDB'))
	//{
            require_once("php/createDB.php");        //Creating DB
            require_once("php/createDBTable.php");  //Table fo Guest IDName and date on reg
            require_once("php/createDBData.php");  //Table for Code
        //}
    //Проверка дали потребителя има съществуваща предишна сесия, ако няма я създава
    //if (!isset($_SESSION['is_logged']) )
    //{
       // if ($_SESSION['is_logged'] != TRUE) {
            require_once ("php/CreateDBUser.php");     
      //  }
    //}
    echo $_SESSION['Name'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="common.css">
	<!--<script type="text/javascript" src="js/init.js"></script>-->
        <script type="text/javascript" src="../Bib/jquery-2.1.1.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/ajaxJS.js"></script>
</head>
<body>
<div id="main-container">
	<div class="header">
		<p class="golden-border"></p>
		<h1 class="site-name">CSS3 code generator</h1>
		
	</div>
	<div class="main-body">
		<!-- Left Panel menu + panel Save -->
		<div class="inner-left">
			<div class="menu-bar">
				<p class="golden-border">Menu Bar</p>
				<ul id="ul_for_li">
					<li><p id="MulCol"   onclick="HideNshow()"> Multiple Columns</p></li>
					<li><p id="BorRad"   onclick="HideNshow()"> Border radius</p></li>				
					<li><p id="TexSha"   onclick="HideNshow()"> Text shadow</p></li>
					<li><p id="BoxSha"   onclick="HideNshow()"> Box Shadow</p></li>
					<li><p id="BoxRes"   onclick="HideNshow()"> Box resize</p></li>
					<li><p id="BoxSiz"   onclick="HideNshow()"> Box sizing</p></li>
					<li><p id="Transit"  onclick="HideNshow()"> Transition</p></li>
					<li><p id="Transfo"  onclick="HideNshow()"> Transform</p></li>
					<li><p id="FontFace" onclick="HideNshow()"> Font face</p></li>
					<li><p id="Outline"  onclick="HideNshow()"> Outline</p></li>
					<li><p id="RGBA"     onclick="HideNshow()"> RGBA</p></li>
				</ul>
				<p class="golden-border"></p>
			</div>

			<div class="save-bar">
				<p class="golden-border">Save Bar</p>
                                <input type="button" name="BANANI" id="css_button_ajax_call" value="PUPESH"/>
				<?php 
					echo "<ol>";
					//here we set the SAVED CSS DATA
					//while ( <= ) {
						echo "<li>vdfd  </li>";
					//}
					
					echo "</ol>";
				?>
				<p class="golden-border" id="load">Load</p>
			</div>
		</div><!-- END Left Panel menu + panel Save -->


		<!-- Osnovno componenti -->
		<div class="inner-right" id="opp">
			<div id="enterData">

				
			</div>
			
		</div>

		<!-- Osnovno menu -->
		<div class="inner-right" id="save">


			<?php 
			/*	//Svurzvane kum localniq server
				$dbhost	= 'localhost';
				$dbuser = 'root';
				$dbpass = '';

				$conn = mysql_connect($dbhost, $dbuser, $dbpass);
				if (!$conn) {
					die ('Could not connect: '.mysql_error());
				}
				mysql_select_db('CSSGenDB');
			    $selectData  = mysql_query("SELECT * FROM  dbUSER");/*$dbName
				if (!$selectData ) 
				{
					require_once("../php/CreateDBUserTable.php");
				}
			
				
				echo "<table>";
				echo "<tr> <th>Num</th> <th>Name</th> <th>Code</th> <th>Visualisation</th> <th>Delete</th> </tr>";
			*/	

			?>

                    <div id="input_text"></div>
                        <div id="the_example" style="width:140px;height:140px;background-color:red;">
                            
                            
                        </div>
		</div>

		
	</div>
	<div class="footer">
		
	</div>

</div>
</body>
</html>
