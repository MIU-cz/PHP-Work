<?php
require('const.php');
require('cal_var.php');

$db_link = new mysqli($db['host'], $db['name'], $db['pass'], $db['base']);

// add new task & redirect to current month
if (isset($_POST['ukol'])) {
	$ukol = mysqli_real_escape_string($db_link, $_POST['ukol']);
	$query_add_task = 'INSERT INTO tasks (txt, datum) VALUES ("' . $ukol . '", "' . $_POST['date'] . '")';
	$db_link->query($query_add_task);
	unset($_POST['ukol']);

	$month = date('n', strtotime($_POST['date']));
	$day = date('j', strtotime($_POST['date']));
	$year = date('Y', strtotime($_POST['date']));
	header('Location: /Kalendar?year=' . $year . '&month=' . $month . '&day=' . $day . '');
	exit;
}

// delete choosen task
if (isset($_GET['cur-task']) && $_GET['cur-task'] == 'del') {
	$query_del_task = 'DELETE FROM `tasks` WHERE `tasks`.`id` = ' . $_GET['task-id'] . '';
	$db_link->query($query_del_task);
	unset($_GET['cur-task']);

	header('Location: /Kalendar?' . $url);
	exit;
}

$db_link->close();
