<!DOCTYPE html>
<html lang="cs">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>3IT PHP-Test - MIU</title>
	<link rel="shortcut icon" href="src/img/x192-150x150.png" type="image/png">
	<link rel="stylesheet" href="src/autor-resourse/my-normaliz-style-min.css">
	<link rel="stylesheet" href="src/css/style.css">
	<link rel="stylesheet" href="src/autor-resourse/autor-footer-style.css">
</head>

<body>
	<div class="main__adm_koutek">
		<h2>administrátorský koutek</h2>
		<ul class="adm__koutek_links">
			<li><a href="">vytvořit DB</a></li>
			<li><a href="#" onclick="showForm(event)">nahrát soubor seznamu</a></li>
		</ul>
		<form class="adm__koutek_form hide" id="fileForm" enctype="multipart/form-data" method="post" action="engine/addfile.php">
			<input type="file" name="seznam" required>
			<button type="submit">nahrát soubor</button>
		</form>
		<div class="adm__koutek_msg">
			<?php
			if (isset($_GET['msg'])) {
				echo $_GET['msg'];
			}
			?>
		</div>
	</div>


	<script src="js/mainscript.js"></script>
</body>

</html>