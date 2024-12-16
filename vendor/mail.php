<?php

session_start();


try {

	// Подключение библиотеки
	require '../phpmailer/PHPMailer.php';
	require '../phpmailer/SMTP.php';
	require '../phpmailer/Exception.php';

	// Вывод сообщения на клиент
	function showError($message) {
		$_SESSION['error'] = $message;
        header('Location: ../');
	}

	function showMessage($message) {
		$_SESSION['message'] = $message;
        header('Location: ../');
	}

	// Получение данных
	$name = trim($_POST["name"]);
	$tel = trim($_POST["tel"]);
	$guests = trim($_POST["guests"]);


	// Валидация полученных данных
	if (strlen($name) > 50 || empty($name)) {
		showError('Не корректно ввели ФИО. Пример: Иванов Павел Петрович.');
	}

	if (strlen($tel) > 50 || empty($tel)) {
		showError('Не корректно ввели номер телефона. Пример: +375256587822.');
	}

	if (strlen($guests) > 5 || empty($guests)) {
		showError('Не корректно ввели кол-во гостей.');
	}


	// Контент письма
	$title = 'Подтверждение приглашения!';
	$body = '<p>Имя: '.$name.'</p>'.
			'<p>Телефон: '.$tel.'</p>'.
			'<p>Со мной будет: '.$guests.' человека.</p>';


	// Настройки PHPMailer
	$mail = new PHPMailer\PHPMailer\PHPMailer();

	$mail->isSMTP();
	$mail->CharSet = 'UTF-8';
	$mail->SMTPAuth   = true;

	// Настройки почты отправителя
	$mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
	$mail->Username   = 'kuzmichevaangelin@yandex.ru'; // Логин на почте
	$mail->Password   = 'abdubffpvahgumqo'; // Пароль на почте
	$mail->SMTPSecure = 'ssl';
	$mail->Port       = 465;

	$mail->setFrom('kuzmichevaangelin@yandex.ru', $name); // Адрес самой почты и имя отправителя

	// Получатель письма
	$mail->addAddress('kuzmichevaangelin@yandex.ru');

	// Отправка сообщения
	$mail->isHTML(true);
	$mail->Subject = $title;
	$mail->Body = $body;

	if ($mail->send()) {
		showMessage('Сообщение успешно отправлено!');
	} else {
		showError('Ошибка при отправке сообщения. Попробуйте позже.');
	}


} catch (Exception $e) {
	showError('Ошибка сервера. Попробуйте позже.');
}