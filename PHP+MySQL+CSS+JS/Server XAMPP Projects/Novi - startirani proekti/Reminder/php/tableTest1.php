<?php
 	$date  = time();
 	$day   = date ('d' , $date);
 	$month = date('m' , $date);
 	$year  = date('Y', $date);

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

	echo "<table border=3 width=700>";
	echo "<tr><th colspan=60></th>";
	echo "<tr><td width=62>Mon</td><td width=62>Tue</td><td width=62>Wed</td><td width=62>Thu</td><td width=62>Fri</td><td width=62>Sat</td><td width=62>Sun</td>";
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

	while ($day_number <= $day_in_month) {
		echo "<td> $day_number </td>";
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