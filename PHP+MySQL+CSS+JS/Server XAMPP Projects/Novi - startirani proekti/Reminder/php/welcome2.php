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
				<a  class="month" id="Jan" href="#">January </a>
				<a  class="month" id="Feb" href="#">February</a>
				<a  class="month" id="Mar" href="#">March</a>
				<a  class="month" id="Apr" href="#">April</a>
				<a  class="month" id="May" href="#">May</a>
				<a  class="month" id="Jun" href="#">June</a>
				<a  class="month" id="Jul" href="#">July</a>
				<a  class="month" id="Aug" href="#">August</a>
				<a  class="month" id="Sep" href="#">September</a>
				<a  class="month" id="Oct" href="#">October</a>
				<a  class="month" id="Nov" href="#">November</a>
				<a  class="month" id="Dec" href="#">December</a>

				<!-- Скрипт за извеждане на информацията на екрана - пренасочване от страница на страница -->
				<script type="text/javascript" src="../js/init.js"></script>
			</div>  
			<!-- /DIV navi-->
			<!-- ******************************************************* -->
				
			<script type="text/javascript">
				for (var i = 0; i < Things.length; i++) {
					Things[i]
					document.getElementById('')
				};
			</script>
			<script type="text/javascript">

			</script>
			<!-- DIV-ове за извеждане на информацията от базата данни в табличен вид -->
			<div class="calendar">
				<iframe src="#" id="frame"></iframe>
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