<?php
require('src/components/const.php');

$cur_day = date('j');
$cur_month = date('n');
$cur_year = date('Y');
// $cur_day_week = date('w');
// $cur_month_str = date('F');

if (isset($_GET['month'])) {
	$new_month = $_GET['month'];
	if ($new_month > 12) {
		$new_month = 1;
	} elseif ($new_month <= 0) {
		$new_month = 12;
	}
} else {
	$new_month = $cur_month;
}

if (isset($_GET['day'])) {
	$select_day = $_GET['day'];
} else {
	$select_day = $cur_day;
}

$cur_month_str = $months[$new_month - 1];
$col_days = cal_days_in_month(CAL_GREGORIAN, $new_month, $cur_year);
$cur_fday_month = date('w', mktime(0, 0, 0, $new_month, 1, $cur_year));

if ($cur_fday_month == 0) {
	$cur_fday_month = 7;
}

// $select_date = date('d.m.Y', mktime(0, 0, 0, $select_day, $new_month, $cur_year));
// echo $select_date . '<br>';
// echo $select_day;
// echo $new_month;

$db_link = new mysqli($db['host'], $db['name'], $db['pass'], $db['base']);
$tasks = $db_link->query("SHOW TABLES LIKE 'tasks'");
if ($tasks->num_rows > 0) {
	$query = "SELECT * FROM `tasks` WHERE `date`='$select_day.$new_month.$cur_year'";
} else {
	$query = "CREATE TABLE `tasks` (
		id INT(10) NOT NULL AUTO_INCREMENT,		
		txt VARCHAR(64) NOT NULL,
		datum DATE,
		PRIMARY KEY (id)		
	 )";
}

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
	<main class="container">
		<div class="kal_container">
			<table>
				<caption>
					<?php
					echo '<a href="?month=' . -1 +  $new_month . '">' . $kal_btn['prev'] . '</a>';
					echo '<a href="?month=' . $cur_month . '">' . $kal_btn['cur_month'] . '</a>';
					echo '<a href="?month=' . 1 +  $new_month . '">' . $kal_btn['next'] . '</a>';
					echo $cur_month_str;
					?>
				</caption>
				<thead>
					<tr>
						<?php
						foreach ($weekday as $day) {
							echo '
						<th>' . $day . '</th>
						';
						}
						?>
					</tr>
				</thead>

				<tbody>
					<?php
					$d = 1;
					while ($d <= $col_days) {
						echo '<tr>';
						for ($w = 1; $w <= 7; $w++) {
							if ($d == 1 && $w < $cur_fday_month || $d > $col_days) {
								echo '<td></td>';
							} else {
								if ($d == $cur_day && $new_month == $cur_month) {
									echo '<td class="cur_day">';
								} else {
									echo '<td>';
								}
								echo '<a href="?month=' . $new_month . '&day=' . $d . '">' . $d . '</a>
									</td>
									';
								$d++;
							}
						}
						echo '</tr>';
					}
					?>
				</tbody>
			</table>
		</div>

		<div class="task_container">
			<?php
			$tasks = $db_link->query($query);
			?>
		</div>
	</main>


	<footer>

	</footer>
</body>

</html>