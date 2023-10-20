<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$name = htmlspecialchars($_POST["contact-name"] . " " . $_POST["contact-surname"]);
	$email = htmlspecialchars($_POST["contact-email"]);
	$phone = htmlspecialchars($_POST["contact-phone"]);
	$service = htmlspecialchars($_POST["contact-service"]);
	$message = htmlspecialchars($_POST["contact-message"]);
	// htmlspecialchars - pokud se uživatel pokusí zadat "zakázané" znaky

	// my mail
	$to = "mytaskdev@gmail.com";
	$subject = "form request";

	// massage
	$messageBody = "Имя: $name\n";
	$messageBody .= "Email: $email\n";
	$messageBody .= "Телефон: $phone\n";
	$messageBody .= "Услуга: $service\n";
	$messageBody .= "Сообщение:\n$message";

	// headers for mail
	$headers = "From: $email" . "\r\n" .
		"Reply-To: $email" . "\r\n" .
		"X-Mailer: PHP/" . phpversion();

	// sending mail
	if (mail($to, $subject, $messageBody, $headers)) {
		echo "vsechno dobre";
	} else {
		echo "neco jslo ne tak";
	}
}

// mail() - toto je vestavěná funkce v PHP. pokud máte na svém serveru nakonfigurovaný smtp, bude vše fungovat bez problémů