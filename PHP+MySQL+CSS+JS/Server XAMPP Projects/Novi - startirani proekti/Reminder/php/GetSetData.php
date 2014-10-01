<DOCTYPE html>
<html>
<header>
	<title></title>
	<link rel="stylesheet" href="../css/data-pages.css">
	<script type="text/javascript" src="../js/init.js"></script>

</header>
<body>
	<div id="container-page1">
		<?php

			//$bau = $_GET['mon'];
			$GLOBALS['day']   = $_GET['idD'];

			/*switch ($month) {
				case '01':		$Cor = 'January';	break;
				case '02':		$Cor = 'February';	break;
				case '03':		$Cor = 'March';		break;
				case '04':		$Cor = 'April';		break;
				case '05':		$Cor = 'May';		break;
				case '06':		$Cor = 'June';		break;
				case '07':		$Cor = 'July';		break;
				case '08':		$Cor = 'August';	break;
				case '09':		$Cor = 'September';	break;
				case '10':		$Cor = 'Octber';	break;
				case '11':		$Cor = 'November';	break;
				case '12':		$Cor = 'December';	break;
			}
			*/
			echo $money;
			//Table
			echo "<form method=POST>";
			echo "<table border=3 width=680>";
			echo "<tr><th colspan=50>Day - ". $day . " /  </th>";
			echo "<tr><td width=40>Time</td><td>am</td><td>pm</td>";
			$hour_counter = 1; //-  12;
			$i = 1;
			while ( $hour_counter <= 12 ) {
				echo "<tr>";
				echo "<td> $hour_counter </td>";
				echo "<td> <input type=text name=$i id=am ></td>";
				echo "<td> <input type=text name=$i id=pm ></td>";
				echo "</tr>";
				$i++;
				$hour_counter++;
			}
			echo "</table>";
			echo "<input type=submit name=enterData value=Submit class=buttonStyle id=buttons>";
			echo "</form>";


		?>
	</div>
</body>
</html>