<!-- Проверка за съществуваща сесия -->
<?php
	session_start();

	if ($_SESSION['is_logged']==false) {
		header('location: ../index.php');
	}
?>

<!DOCTYPE html>
<html>
<header> 
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/userAcc.css">
	<script type="text/javascript"src="../Bib/jquery-2.1.1.min.js"></script>
	
	<title>Welcome </title>
	
</header>
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
				<p><?php echo $year ?></a><br>
				<a  id="nav1" href="#">Clock</a>					
				<a  id="nav2" href="#">January</a>
				<a  id="nav2" href="#">February</a>
				<a  id="nav2" href="#">March</a>
				<a  id="nav2" href="#">April</a>
				<a  id="nav2" href="#">May</a>
				<a  id="nav2" href="#">June</a>
				<a  id="nav2" href="#">July</a>
				<a  id="nav2" href="#">August</a>
				<a  id="nav2" href="#">September</a>
				<a  id="nav2" href="#">October</a>
				<a  id="nav2" href="#">November</a>
				<a  id="nav2" href="#">December</a>

				<!-- Скрипт за извеждане на информацията на екрана - пренасочване от страница на страница -->
				<script type="text/javascript">
			
					//$('#years').on('click', function (){
					//	$('#frame').attr('src', '../php/years.php');
					//});
				
					//$('#frame').hide();
					$('#nav1').on('click', function () {
					    $('#frame').attr('src', '../php/clock.php');
					});

					$('#nav2').on('click', function () {
					    $('#frame').attr('src', '../php/years.php');
					});

				</script>
			</div>  
			<!-- /DIV navi-->
			<!-- ******************************************************* -->
			
			<!-- DIV-ове за извеждане на информацията от базата данни в табличен вид -->
			<div class="calendar">
				<iframe src="#" id="frame"></iframe>
			</div>
			<div class="calendar">
				<iframe src="#" id="frame2"></iframe>
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