<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<header>
	<link rel="stylesheet" href="../css/data-pages.css">
	<script type="text/javascript" src="../js/init.js"></script>
	<script type="text/javascript" src="../Bib/jquery-2.1.1.min.js"></script>
</header>
<body>
	<div id="container-page1">
		<?php
		require_once "global.php";
		global $banani;
		 	//$_SESSION["varname"] = $_POST["varname"];
			//$monthsRec = $_SESSION["varname"];
			//$monthsRec = $foo; - globalna ot welcome.php
			$GLOBALS['buu'] = $_GET['id'];
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

			$banani = ;
				echo $banani;
		?>
		<script type="text/javascript" src="../js/init.js"></script>
		<script type="text/javascript">
		$.ajax({
   type: "POST",
   url: "BACKEND.php",
   timeout: 8000,
   data: "var1=" + myVar,
   dataType: "json",
   error: function(){
     $("#DIVID").html("<div class='error'>Error!</div>");
   },  
   success: function(jsonObj){
     $("#DIVID").html(jsonObj.mydata);
   }
 });
</script>
	</div>
</body>

</html>