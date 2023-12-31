<?php
require('src/components/const.php');
require('src/components/cal_var.php');

?>

<!DOCTYPE html>
<html lang="cs">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kalendar - <?php echo $cur_month_str; ?></title>
	<link rel="shortcut icon" href="src/img/ico/calendar-check.svg" type="image/x-icon">
	<link rel="stylesheet" href="src/css/style.css">
</head>

<body id="body">
	<main class="kal_wraper" id="mainContainer">
		<div class="kal_content">
			<?php
			include('src/components/Kalendar.php');
			include('src/components/Tasks.php');
			?>
		</div>
	</main>


	<footer class="footer_wraper">
		<div id="autor"></div>
	</footer>

	<script src="src/components/autor-resourse/autor-footer-script.js"></script>
	<script src="src/js/script.js"></script>
</body>

</html>