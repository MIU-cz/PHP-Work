<?php
if (isset($_FILES['seznam'])) {
	if (is_uploaded_file($_FILES['seznam']['tmp_name'])) {
		$fileName = $_FILES['seznam']['name'];
		$dir = '../src/db/';
		$file = $dir . $fileName;

		if (move_uploaded_file($_FILES['seznam']['tmp_name'], $file)) {
			$msg = '<p class="good">Soubor byl úspěšně nahrán</p>';
		} else {
			$msg = '<p class="err">Něco se pokazilo..</p>';
		}
	} else {
		$msg = '<p class="err">soubor nebyl přidán, zkuste to znovu !!</p>';
	}
}

// add data to DB
// ==============

include "linkdb.php";
$db->select_db($base);
$list = fopen($file, 'r');

while ($listRow = fgets($list)) {
	$item = explode(",", $listRow);
	$query = "INSERT INTO zaznamy (jmeno, prijmeni, datum) 
	VALUES ('$item[1]', '$item[2]', '$item[3]')";

	if ($db->query($query)) {
		$err = false;
	} else {
		$err = true;
	}
}

if ($err) {
	$msg .= '<p class="err">Data přidána s chybami</p>';
} else {
	$msg .= '<p class="good">Data přidána bez chyby</p>';
}

fclose($list);
$db->close();
header("Location: ../index.php?msg=$msg");
exit();
