<?php
if (isset($_FILES['seznam'])) {
	if (is_uploaded_file($_FILES['seznam']['tmp_name'])) {
		$fileName = $_FILES['seznam']['name'];
		$dir = '3IT-php-test/src/db/';
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

header("Location: ../index.php?msg=$msg");
exit();
