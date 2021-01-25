<?php

$customerName = $_POST['customerName'];
$customerEmail = $_POST['customerEmail'];
$customerNumber = $_POST['customerNumber'];

if (isset($customerName, $customerEmail, $customerNumber)) {
    $message = array();

    if (empty($customerNumber)) {
        $message['numberError'] = 'Вы не ввели номер!';
    } else {
        if (!preg_match('/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/', $customerNumber)) {
            $message['numberError'] = "Неправильно введен номер! ";
        }
    }

    if (empty($customerEmail)) {
        $message['emailError'] = 'Вы не ввели email!';
    } else {
        if (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
            $message['emailError'] = "Email введен некорректно!";
        }
    }

    if (empty($customerName)) {
        $message['nameError'] = 'Вы не ввели имя!';
    } else {
        if (!preg_match("/^[a-zA-Zа-яёА-ЯЁ\s\-]+$/u", $customerName)) {
            $message['nameError'] = "Допустимы только кириллица и латиница!";
        }
    }
}

if ($message == null) {
    $to = $customerEmail;
    $from = 'elcar24@gmail.com';
    $subject = 'ELCAR24.COM';
    $text = 'Здравствуйте, ' . $customerName . '!<br>Вы отправляли нам заявку на бесплатную консультацию. В ближайшее время наш оператор с вами свяжется. Ожидайте звонка!<br>';
    $headers = 'From: ' . $from . '\r\nReply-to: ' . $from . '\r\nContent-type: text/html; charset=utf-8\r\n';
    mail($to, $subject, $text, $headers);
    $message['mailSend'] = $customerName . ", cпасибо за обращение! Ожидайте нашего ответа!";
    echo json_encode($message);
} else echo json_encode($message);
