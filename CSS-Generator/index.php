<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="common.css">
	<!--<script type="text/javascript" src="js/init.js"></script>-->
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
			*/
				
				echo "<table>";
				echo "<tr> <th>Num</th> <th>Name</th> <th>Code</th> <th>Visualisation</th> <th>Delete</th> </tr>";
				

			?>
			<div>
				<P>sdvsfsfsfbsfbs</P><br>
				<P>sdvsfsfsfbsfbs</P><br>
				<P>sdvsfsfsfbsfbs</P><br>
				<P>sdvsfsfsfbsfbs</P><br>

			</div>
                    <div id="input_text">sdvsfsfsfbsfbs</div>
                        <div id="the_example" style="width:140px;height:140px;background-color:red;">
                            
                            
                        </div>
		</div>

		
	</div>
	<div class="footer">
		
	</div>

</div>
</body>
</html>
