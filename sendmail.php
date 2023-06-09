<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    $mail->setLanguage('ru', 'phpmler/Language/');
    $mail->IsHTML(true);

    $mail->setFrom('sofyashamarina12@gmail.com', 'Сайт')
    $mail->addAddress('assistant@printtelecom.ru')
    $mail->Subject = 'PrintTelecom'

    $body = '<h1>Здравствуйте</h1>'

    if (trim(!empty($_POST['name']))) {
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].</p>;
    }
    if (trim(!empty($_POST['emil']))) {
        $body.='<p><strong>E-mil:</strong> '.$_POST['emil'].</p>;
    }
    if (trim(!empty($_POST['message']))) {
        $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].</p>;
    }
    $mail->Body = $body;

    if(!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>