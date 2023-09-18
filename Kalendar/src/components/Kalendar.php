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
	<table id="kalendar" data="<?php echo $season ?>">
		<caption class="kal_title">
			<?php
			echo '<div class="kal_navi">';
			echo '<a class="btn_cal" href="?month=' . $new_month - 1 . '&year=' . $new_year . '">' . $kal_btn['prev'] . '</a>';
			echo '<a class="btn_cal" href="?month=' . $cur_month . '">' . $kal_btn['cur_month'] . '</a>';
			echo '<a class="btn_cal" href="?month=' . $new_month + 1 . '&year=' . $new_year . '">' . $kal_btn['next'] . '</a>';
			echo '</div>';
			echo '<span>' . $cur_month_str . '</span><span>' . $new_year . '</span>';
			?>
		</caption>
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
						if ($d == $cur_day && $new_month == $cur_month) {
							echo '<td class="cur_day">';
						} else {
							echo '<td>';
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

<div class="task_container">
	<ul class="task_list">
		<?php
		if (isset($_GET['day'])) {
			$url = '
			&year=' . $new_year . '
			&month=' . $new_month . '
			&day=' . $select_day;
		} else {
			$url = '
			&year=' . $new_year . '
			&month=' . $new_month;
		}

		print_r($_GET);

		$tasks = $db_link->query($query);
		if ($tasks->num_rows > 0) {
			while ($task = $tasks->fetch_assoc()) {
				echo '<li class="task_item">
						<div class="item_container">
							<p>' . $task['txt'] . '</p>
							<span>' . $task['datum'] . '</span>
						</div>
						<a class="btn_del" href="src/components/engine.php?cur-task=del&task-id=' . $task['id'] . $url . '">'
					. $kal_btn['del'] . '</a>
					</li>';
			}
		} else {
			echo '<p>Pro vybraný termín nejsou žádné úkoly, můžete jít na čaj 🍵</p>';
		}
		$db_link->close();

		?>
	</ul>

	<form method="post" action="src/components/engine.php">
		<?php
		$month = date("m", mktime(0, 0, 0, $new_month, 1));
		$day = date("d", mktime(0, 0, 0, $month, $select_day));
		?>

		<input type="text" name="ukol" placeholder="zadat úkol" required>
		<input type="date" name="date" value="<?php echo date("$new_year-$month-$day") ?>" required>
		<button type="submit">zadat úkol</button>
	</form>
</div>