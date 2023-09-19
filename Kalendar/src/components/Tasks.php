<?php

$tasks = $db_link->query($query);
?>

<div class="task_container">
	<ul class="task_list">
		<?php

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

	<form class="task_form" method="post" action="src/components/engine.php">
		<?php
		$month = date("m", mktime(0, 0, 0, $new_month, 1));
		$day = date("d", mktime(0, 0, 0, $month, $select_day));
		?>

		<input class="form_item" type="text" name="ukol" placeholder="zadat úkol" required>
		<input class="form_item" type="date" name="date" value="<?php echo date("$new_year-$month-$day") ?>" required>
		<button class="form_item btn_sub" type="submit">zadat úkol</button>
	</form>
</div>