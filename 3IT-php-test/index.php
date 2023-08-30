<!DOCTYPE html>
<html lang="cs">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>3IT PHP-Test - MIU</title>
	<link rel="shortcut icon" href="./src/img/x192-150x150.png" type="image/png">
	<link rel="stylesheet" href="./src/autor-resourse/my-normaliz-style-min.css">
	<link rel="stylesheet" href="./src/css/style.css">
	<link rel="stylesheet" href="./src/autor-resourse/autor-footer-style.css">
</head>

<body>
	<div class="main__adm_koutek">
		<div class="brand">
			<a href="https://www.3it.cz/" target="_blank">
				<img src="./src/img/3it_small.png" alt="brand-logo">
			</a>
		</div>
		<h2>administrátorský koutek</h2>
		<ul class="adm__koutek_links">
			<li><a href="./engine/generatedb.php">vytvořit DB</a></li>
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

	<main class="container">
		<div class="content">
			<table>
				<tr class="table_row">
					<th><a href="?sort=id">id</a></th>
					<th><a href="?sort=jmeno">Jmeno</a></th>
					<th><a href="?sort=prijmeni">Prijmeni</a></th>
					<th><a href="?sort=datum">Datum</a></th>
				</tr>

				<?php
				include "./engine/linkdb.php";
				$db->select_db($base);

				if (!isset($_GET['sort'])) {
					$query = "SELECT * FROM `zaznamy` ORDER BY `id` ASC";
				} else {
					$sort = $_GET['sort'];
					$query = "SELECT * FROM `zaznamy` ORDER BY `$sort` ASC";
				}

				$table = $db->query($query);

				if ($table->num_rows > 0) {
					while ($row = $table->fetch_assoc()) {
						echo '
						<tr class="table_row" onclick="trSelect(event)">
						<td>' . $row['id'] . '</td>
						<td>' . $row['jmeno'] . '</td>
						<td>' . $row['prijmeni'] . '</td>
						<td>' . $row['datum'] . '</td>
						</tr>
						';
					}
				} else {
					echo '<tr><td colspan = 4>
					<p class="err">nic tu není.. <br>stáhněte si seznam ke zpracování..</p>
					</td></tr>';
				}
				?>

			</table>
		</div>
	</main>

	<footer>
		<div class="autor" id="autor"></div>
	</footer>

	<script src="./js/mainscript.js"></script>
	<script src="./src/autor-resourse/autor-footer-script.js"></script>

</body>

</html>