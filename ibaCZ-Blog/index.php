<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>IBACZ - MIU - cube practical demo</title>
	<link rel="shortcut icon" href="./src/img/apple-touch-icon-152x152.png" type="image/png">
	<link rel="stylesheet" href="./src/css/style.css">
</head>

<body>
	<header class="wraper">
		<?php include "./components/_Header.php"; ?>
	</header>

	<slider class="wraper_fluid">
		<?php include "./components/_Post-slider.php"; ?>
	</slider>

	<main class="wraper">
		<?php include "./components/_Main.php"; ?>
	</main>

	<footer class="wraper">
		<?php include "./components/_Footer.php"; ?>
		<div id="autor"></div>
	</footer>

	<script src="./components/autor-resourse/autor-footer-script.js"></script>
</body>

</html>