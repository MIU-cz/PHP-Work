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

$cur_month_str = $months[$new_month - 1];
$col_days = cal_days_in_month(CAL_GREGORIAN, $new_month, $cur_year);
$cur_fday_month = date('w', mktime(0, 0, 0, $new_month, 1, $cur_year));

if ($cur_fday_month == 0) {
	$cur_fday_month = 7;
}

?>

<!DOCTYPE html>
<html lang="cs">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kalendar - <?php echo $cur_month_str; ?></title>
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
							} elseif ($d == $cur_day) {
								echo '
							<td class="cur_day">' . $d . '</td>
							';
								$d++;
							} else {
								echo '
							<td>' . $d . '</td>
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

		</div>
	</main>


	<footer>

	</footer>
</body>

</html>