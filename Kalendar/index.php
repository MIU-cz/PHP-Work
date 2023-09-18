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
</head>

<body>
	<main class="container" id="mainContainer">
		<div class="kal_content">
			<?php
			include('src/components/Kalendar.php');
			?>
		</div>
	</main>


	<footer>

	</footer>
</body>

</html>