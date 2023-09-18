<?php

if (isset($_GET['year'])) {
	$new_year = $_GET['year'];
} else {
	$new_year = $cur_year;
}

if (isset($_GET['month'])) {
	$new_month = $_GET['month'];

	if ($new_month > 12) {
		$new_month = 1;
		$new_year += 1;
	} elseif ($new_month <= 0) {
		$new_month = 12;
		$new_year -= 1;
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
$col_days = cal_days_in_month(CAL_GREGORIAN, $new_month, $new_year);
$cur_firstday_month = date('w', mktime(0, 0, 0, $new_month, 1, $new_year));

if ($cur_firstday_month == 0) {
	$cur_firstday_month = 7;
}

$season_index = (($new_month == 12) ? 3 : ($new_month <= 2)) ? 3 : floor(($new_month - 2) / 3);
$season = $seasons[$season_index];

if (isset($_GET['day'])) {
	$url = '&year=' . $new_year . '&month=' . $new_month . '&day=' . $select_day;
} elseif (isset($_GET['month'])) {
	$url = '&year=' . $new_year . '&month=' . $new_month;
} else {
	$url = '&year=' . $new_year;
}
