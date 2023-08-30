<?php
include "linkdb.php";

$query = "CREATE DATABASE IF NOT EXISTS `$base`";
if ($db->query($query)) {
	$msg = '<p class="good">databáze úspěšně vytvořena!</p>';
} else {
	$msg = '<p class="err">Něco se pokazilo..</p>';
}

$db->select_db($base);
$table = $db->query("SHOW TABLES LIKE 'zaznamy'");
if ($table->num_rows > 0) {
	$msg .= '<p class="good">tabulka již existuje, pokračujte v práci..</p>';
} else {
	$query = "CREATE TABLE `zaznamy` (
		id INT(10) NOT NULL AUTO_INCREMENT,
		jmeno VARCHAR(64) NOT NULL,
		prijmeni VARCHAR(64) NOT NULL,
		datum DATE,
		PRIMARY KEY (id))
	 ";
	if ($db->query($query)) {
		$msg .= '<p class="good">tabulka byla úspěšně vytvořena</p>';
	} else {
		$msg = '<p class="err">Něco se pokazilo..</p>';
	}
}

$db->close();
header("Location: ../index.php?msg=$msg");
exit();
