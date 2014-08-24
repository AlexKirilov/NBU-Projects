<!DOCTYPE html>
<html>
<header>
	<link rel="stylesheet" href="../css/data-pages.css">
</header>
<body>
	<div id="container-page1">
		<?php
 	$date  = time();
 	$day   = date ('d' , $date);
 	$month = date('m' , $date);
 	$year  = date('Y', $date);
 	$months = date('F' , $date);

 	$first_day = mktime(0, 0, 0, $month, 1 , $year);
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
	$day_in_month = cal_days_in_month(0, $month, $year);
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
		echo "<td id=$coordinates> $day_number </td>";
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
	</div>
</body>

</html>