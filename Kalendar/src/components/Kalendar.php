<?php

$db_link = new mysqli($db['host'], $db['name'], $db['pass'], $db['base']);
$tasks = $db_link->query("SHOW TABLES LIKE 'tasks'");

if ($tasks->num_rows > 0) {
	if (isset($_GET['day'])) {
		$query = "SELECT * FROM `tasks` WHERE `datum`='$new_year.$new_month.$select_day'";
	} elseif (isset($_GET['month'])) {
		$query = "SELECT * FROM `tasks` WHERE MONTH(`datum`) = '$new_month' AND YEAR(`datum`) = '$new_year'";
	} else {
		$query = "SELECT * FROM `tasks` WHERE YEAR(`datum`) = '$new_year'";
	}

	$task_days = $db_link->query($query);
	$task_arr[] = '';
	while ($task_day = $task_days->fetch_assoc()) {
		$task_arr[] = $task_day['datum'];
	}
} else {
	$query = "CREATE TABLE `tasks` (
		id INT(10) NOT NULL AUTO_INCREMENT,		
		txt VARCHAR(64) NOT NULL,
		datum DATE,
		PRIMARY KEY (id)		
	 )";
}

?>

<div class="kal_container">
	<div class="kal_title">
		<?php
		echo '<div class="kal_navi">';
		echo '<a class="btn_cal" href="?month=' . $new_month - 1 . '&year=' . $new_year . '">' . $kal_btn['prev'] . '</a>';
		echo '<a class="btn_cal" href="?month=' . $cur_month . '">' . $kal_btn['cur_month'] . '</a>';
		echo '<a class="btn_cal" href="?month=' . $new_month + 1 . '&year=' . $new_year . '">' . $kal_btn['next'] . '</a>';
		echo '</div>';
		echo '<div class="kal_month">
			<a class="btn_cal" href="?month=' . $new_month . '&year=' . $new_year . '">' . $cur_month_str . '</a></div>';
		echo '<div class="kal_year">
			<a class="btn_cal" href="?year=' . $new_year . '">' . $new_year . '</a></div>';
		?>
	</div>

	<table id="kalendar" data-season="<?php echo $season ?>">

		<thead>
			<tr class="row_header">
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
				echo '<tr class="row_kal">';
				for ($w = 1; $w <= 7; $w++) {
					if ($d == 1 && $w < $cur_firstday_month || $d > $col_days) {
						echo '<td></td>';
					} else {
						$day = date("Y-m-d", mktime(0, 0, 0,  $new_month, $d, $new_year));

						if ($day == date('Y-m-d')) {
							echo '<td class="cur_day">';
						} elseif (in_array($day, $task_arr)) {
							echo '<td class="task_day">';
						} else {
							echo '<td class="no_task">';
						}
						echo '<a href="?year=' . $new_year . '&month=' . $new_month . '&day=' . $d . '">' . $d . '</a>
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