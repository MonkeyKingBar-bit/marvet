<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	/*
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'user@example.com';                     //SMTP username
	$mail->Password   = 'secret';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	*/

	//Від кого лист
	$mail->setFrom('marvet@gmail.com', 'Professional cattery Marvet'); // Вказати потрібний E-mail
	//Кому відправити
	$mail->addAddress('kateiiverem@gmail.com'); // Вказати потрібний E-mail
	//Тема листа
	$mail->Subject = 'Hi! It is a professional cattery Marvet.';

	//Тіло листа
	$body = '<h1>Thanks for attention!</h1>';

	if(trim(!empty($_POST['email']))){
		$body.=$_POST['form[email]'];
	}
    if(trim(!empty($_POST['form[name]']))){
        $body.=$_POST['form[name]'];
	}
    if(trim(!empty($_POST['form[tel]']))){
        $body.=$_POST['form[tel]'];
	}
    if(trim(!empty($_POST['form[question]']))){
        $body.=$_POST['form[question]'];
	}

	/*
	//Прикріпити файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//шлях завантаження файлу
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузимо файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото у додатку</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	$mail->Body = $body;

	//Відправляємо
	if (!$mail->send()) {
		$message = 'Error: ' . $mail->ErrorInfo;
	} else {
		$message = 'Data send successfully!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>