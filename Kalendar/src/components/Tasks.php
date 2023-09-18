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

<div class="task_container">
	<ul class="task_list">
		<?php

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