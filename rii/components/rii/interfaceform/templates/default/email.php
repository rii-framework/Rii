<?php

$customerName = $_POST['customerName'];
$customerNumber = $_POST['customerNumber'];

if (isset($customerName, $customerNumber)) {
    $message = array();

    if (empty($customerNumber)) {
        $message['numberError'] = 'Вы не ввели номер!';
    } else {
        if (!preg_match('/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){9,12}(\s*)?$/', $customerNumber)) {
            $message['numberError'] = "Неправильно введен номер! ";
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
    $to = 'elcar24@gmail.com';
    $subject = 'Заявка на консультацию по телефону';
    $text = 'Нам поступила заявка на консультацию по телефону от пользователя с именем ' . $customerName . '!<br>Его номер телефона: ' . $customerNumber;
    $headers = 'Content-type: text/html; charset=utf-8\r\n';
    mail($to, $subject, $text, $headers);
    $message['mailSend'] = $customerName . ", cпасибо за обращение! Ожидайте нашего ответа!";
    echo json_encode($message);
} else echo json_encode($message);
