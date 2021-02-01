<?php

$replacements = ['name' => 'Имя введено некоректно!', 'phone' => 'Телефон введен некоректно!', 'lastName' => 'Фамилия введена некоректно', 'login' => 'Логин введен некоректно', 'email' => 'Почта введена некоректно', 'password' => 'Пароль введен некоректно'];

$message['failed'] = '<div>';
foreach ($result['message'] as $value) {
    $message['failed'] .= str_replace($value, $replacements[$value], $value) . "<br>";
}
$message['failed'] .= '</div>';
echo json_encode($message, JSON_UNESCAPED_UNICODE);
die();