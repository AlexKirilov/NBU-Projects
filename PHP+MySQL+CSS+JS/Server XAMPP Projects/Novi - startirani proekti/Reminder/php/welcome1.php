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
		<script type='text/javascript' > 
  var myFunctionTag = "asdsd"; 
</script>
	<link rel="stylesheet" href="../css/userAcc.css">
	<script type="text/javascript" src="../Bib/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../js/init.js"></script>

	<title>Welcome </title>
	
</head>
<body>
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
				<p><?php 	echo "Welcome  " . $_SESSION['Name'];	?></p>
				<a href="../php/logout.php">LogOut</a>
			</div>
		</div>
		<!--/DIV inner-user -->

		<!-- Основно Тяло - Body-->		
		<div class="user-body">

			<!-- DIV с меню изброяващо месеците в една година + функционалност -->
			<div class="navi">
				<p><?php echo $year;  ?></a><br>
				<a  id="time" href="#">Clock</a>					
				<a  class="month" id="01" href="#">January </a>
				<a  class="month" id="02" href="#">February</a>
				<a  class="month" id="03" href="#">March</a>
				<a  class="month" id="04" href="#">April</a>
				<a  class="month" id="05" href="#">May</a>
				<a  class="month" id="06" href="#">June</a>
				<a  class="month" id="07" href="#">July</a>
				<a  class="month" id="08" href="#">August</a>
				<a  class="month" id="09" href="#">September</a>
				<a  class="month" id="10" href="#">October</a>
				<a  class="month" id="11" href="#">November</a>
				<a  class="month" id="12" href="#">December</a>

				<!-- Скрипт за извеждане на информацията на екрана - пренасочване от страница на страница -->
				<script type="text/javascript" src="../js/init.js"></script>
			</div>  
			<!-- /DIV navi-->
			<!-- ******************************************************* -->

			<!-- DIV-ове за извеждане на информацията от базата данни в табличен вид -->
			<div class="calendar">
					<script type="text/javascript">
						$('.month').on('click', function () {
							<?php $buu = ?>.attr('id');
						});
					</script>
					<?php
										 	
						echo $buu;
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
					 	$day   = date ('d' , $buu);
					 	$month = date('m' , $buu);
					 	$year  = date('Y', $date);
					 	$months = $fname; //date('F' , $date);
					 	

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
					 			 	
						echo "<table border=3 width=680>";
						echo "<tr><th colspan=50>$months $year</th>";
						echo "<tr><td width=50>Mon</td><td width=50>Tue</td><td width=50>Wed</td><td width=50>Thu</td><td width=50>Fri</td><td width=50>Sat</td><td width=50>Sun</td>";
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
						$coordinates = 1;
						while ($day_number <= $day_in_month) {
							echo "<td  ><a href=# id=" . $coordinates . " class=boss> $day_number </a></td>";
							$coordinates++;
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

						
					?>
					<script type="text/javascript" src="../js/init.js"></script>

				
			</div>
			<div class="calendar">
				<!--<iframe src="#" id="frame2"></iframe>-->
				<?php require_once "global.php"; ?>
			</div>

			<!-- ******************************************************* -->
	
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