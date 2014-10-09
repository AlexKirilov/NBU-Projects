<!-- Проверка за съществуваща сесия -->
<?php
	session_start();

	if ($_SESSION['is_logged'] == false) {
		header('location: ../index.php');
	}

?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/userAcc.css">
	<link rel="stylesheet" href="../css/data-pages.css">
	<script type="text/javascript" src="../js/init.js"></script>
	<script type="text/javascript" src="../Bib/jquery-2.1.1.min.js"></script>

	<title>Welcome </title>
	
</head>
<body>
		<?php 
		//Svurzvane kum localniq server
				$dbhost	= 'localhost';
				$dbuser = 'root';
				$dbpass = '';

				$conn = mysql_connect($dbhost, $dbuser, $dbpass);
				if (!$conn) {
					die ('Could not connect: '.mysql_error());
				}
				mysql_select_db('CalendarDB');
			$selectData  = mysql_query("SELECT * FROM  dbUSER");/*$dbName*/
				if (!$selectData ) 
				{
					require_once("../php/CreateDBUserTable.php");
				}
		?>
	<!-- Основен DIV - Conteiner -->
	<div id="user-container">
		<?php
			
			$date  = time();
			$year  = date('Y', $date);

		?>

		<!-- Заглавана част на страницата -->
		<div class="inner-user">
			<h4><span id="title-color">C</span>alendar</h4>
			<div class="right-side">
				<p><span class="welcome">Welcome</span> <span class="welcomeName"><?php 	echo " ". $_SESSION['Name'];	?></span></p>
				<a href="../php/logout.php">LogOut</a>
			</div>
		</div>
		<!--/DIV inner-user -->
					<div class="dateAndtime" ><?php include '../php/clock.php'; ?></div>
					<script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
					<script type="text/javascript">
						var auto_refresh = setInterval (
							function (){
								$('.dateAndtime').load('../php/clock.php').fadeIn('slow');
							}, 1000 );
					</script>
		<!-- Основно Тяло - Body-->		
		<div class="user-body">

		<div>
			<!-- DIV с меню изброяващо месеците в една година + функционалност -->
			<div class="navi">
				<p><?php echo $year;  ?></a><br></p>				
				<a  class="month" id="01" href="welcome.php?mon=01&I=1 ">January </a>
				<a  class="month" id="02" href="welcome.php?mon=02&I=1 ">February</a>
				<a  class="month" id="03" href="welcome.php?mon=03&I=1 ">March</a>
				<a  class="month" id="04" href="welcome.php?mon=04&I=1 ">April</a>
				<a  class="month" id="05" href="welcome.php?mon=05&I=1 ">May</a>
				<a  class="month" id="06" href="welcome.php?mon=06&I=1 ">June</a>
				<a  class="month" id="07" href="welcome.php?mon=07&I=1 ">July</a>
				<a  class="month" id="08" href="welcome.php?mon=08&I=1 ">August</a>
				<a  class="month" id="09" href="welcome.php?mon=09&I=1 ">September</a>
				<a  class="month" id="10" href="welcome.php?mon=10&I=1 ">October</a>
				<a  class="month" id="11" href="welcome.php?mon=11&I=1 ">November</a>
				<a  class="month" id="12" href="welcome.php?mon=12&I=1 ">December</a>
		
			</div>  
			<!-- /DIV navi-->
			<!-- ******************************************************* -->

			<!-- DIV-ове за извеждане на информацията от базата данни в табличен вид -->
			<div class="calendar">

					<?php
						if (isset($_GET['mon'])) {		
							myFunction();
						}
						
						function myFunction () {

							$buu = $_GET['mon'];
																					
							switch ($buu) {
						 		case '01': $pname = 'Jan'; $fname = 'January';	break;
						 		case '02': $pname = 'Feb'; $fname = 'February';	break;
						 		case '03': $pname = 'Mar'; $fname = 'March';	break;
						 		case '04': $pname = 'Apr'; $fname = 'April';	break;
						 		case '05': $pname = 'May'; $fname = 'May';		break;
						 		case '06': $pname = 'Jun'; $fname = 'June';		break;
						 		case '07': $pname = 'Jul'; $fname = 'July';		break;
						 		case '08': $pname = 'Aug'; $fname = 'August';	break;
						 		case '09': $pname = 'Sep'; $fname = 'September';break;
						 		case '10': $pname = 'Oct'; $fname = 'October';	break;
						 		case '11': $pname = 'Nov'; $fname = 'November';	break;
						 		case '12': $pname = 'Dec'; $fname = 'December';	break;
						 	}

						 	$date  = time();
						 	$day   = date('d' , $buu);
						 	$month = date('m' , $buu);
						 	$year  = date('Y' , $date);
						 	$months = $fname; //date('F' , $date);
						 	$GLOBALS['fnameMonth'] = $fname;						 	

						 	$first_day = mktime(0, 0, 0, $buu, 1 , $year);
						 	$title = date('F', $first_day);
						 	$day_of_week = date ( 'D', $first_day);

						 	switch ($day_of_week) {
						 		case 'Mon':	$blank = 0;	break;
						 		case 'Tue':	$blank = 1;	break; 
						 		case 'Wed':	$blank = 2;	break;
						 		case 'Thu':	$blank = 3;	break;
						 		case 'Fri':	$blank = 4;	break;
						 		case 'Sat':	$blank = 5;	break;
						 		case 'Sun':	$blank = 6;	break;
						 	}
						 			 	
							echo "<table border=3 width=680 class=Itable >";
							echo "<tr><th colspan=50>$months $year</th>";
							echo "<tr class=frow><td width=50>Mon</td><td width=50>Tue</td><td width=50>Wed</td><td width=50>Thu</td><td width=50>Fri</td><td width=50><span id=frow>Sat</span></td><td width=50><span id=frow>Sun</span></td>";
							$day_in_month = cal_days_in_month(0, $buu, $year);
							$day_counter = 1;
							echo "<tr>";
							while ($blank > 0) {
								echo "<td></td>";
								$blank--;
								$day_counter++;
							}
							$day_number = 1;
							$day_of_week = date('D', $first_day);
							while ($day_number <= $day_in_month) {
								echo "<td  ><a  id=day href=../php/welcome.php?mon=".$buu."&day=".$day_number." class=showing ><span id=frow".$day_counter.">". $day_number ."</a></td>";
								$day_number++;
								$day_counter++;

								if ( $day_counter > 7 ){
									echo "</tr><tr>";
									$day_counter = 1;

								}
							}
							while ($day_counter > 1 && $day_counter <= 7 ) {
								echo "<td> </td>";
								$day_counter++;
							
							}
							echo "</tr></table>";	
						}
					?>						
			</div>
			<div class="calendar" id="frame2">
				<?php
					if(isset($_GET['day']))
					{
						$GLOBALS['day']   = $_GET['day'];
						$GLOBALS['month'] = $_GET['mon'];

						//Table
						echo "<form class=Itable method=POST action=../php/GetSetData.php?mon=".$month."&day=".$day.  ">";
						echo "<table border=3 >";
						echo "<tr><th width=150>". $day . " / ". $fnameMonth ." / ". $year ." </th>";
						echo "<td> <input type=text name=userInfo ></td></tr>";
						echo "</table>";
						echo "<input type=submit name=enterData value=Submit class=buttonStyle id=buttons>";
						echo "</form>";
					}
				?>
			</div>
			<div class="calendar" id="frame3">
				<?php
					if(isset($_GET['I']))
					{
						$GLOBALS['month'] = $_GET['mon'];
						//Svurzvane kum localniq server
						$dbhost	= 'localhost';
						$dbuser = 'root';
						$dbpass = '';

						$conn = mysql_connect($dbhost, $dbuser, $dbpass);
						if (!$conn) {
						 die ('Could not connect: '.mysql_error());
						}
						//echo 'Connect successfully<br />';
						mysql_select_db('CalendarDB');
						//$dbName = "DB_".$_SESSION['Name'];
						//$selectData  = mysql_query("SELECT * FROM dbUSER");/*.$dbName*/
						$selectData  = mysql_query("SELECT * FROM dbUSER");
						if (!$selectData ) 
						{
							die('Could not get data: ' . mysql_error());
						}
						else 
						{
							echo "<table border=3 width=680 class=Itable >";
							echo "<tr><th colspan=50>$month $year</th>";
							echo "<tr> <td> Day</td> <td> Information </td> </tr>";
							while ($row = mysql_fetch_array($selectData) )
							{
								echo "<tr>";
								if ($row[3] == $_SESSION['ID'])
								{
									if($row[1] == $_GET['mon'] ){
										$selectMon = $row[1];
										$selectDay = $row[2];
										$selectDat = $row[5];

										echo "<td>".$selectDay."</td>";
										echo "<td>".$selectDat."</td>";	
									}
								}
								echo "</tr>";
							}
							echo "</table>";
						}
					}
				?>
			</div>
			<!-- ******************************************************* -->
		</div>
		</div>
		<!-- /DIV user-body -->

		<!-- Дъното на страницата-->
		<div class="footer">
		<p>Copyrights @ Aleksandar Kirilov NBU student - 2014</p>
			
		</div>
		<!-- /DIV footer -->

	</div>
</body>
</html>