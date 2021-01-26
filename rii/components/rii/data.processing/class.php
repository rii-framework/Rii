<?php

namespace Rii\Components\Rii;

use Rii\Core\Component\Base;

class Mailer extends Base
{
    private function validation()
    {
        $customerName = $_POST['customerName'];
        $customerNumber = $_POST['customerNumber'];

        $data = ['customerName' => $customerName, 'customerNumber' => $customerNumber];

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
        return $result = ['message' => $message, 'data' => $data];
    }

    private function ourMail($result)
    {
        if ($result['message'] == null) {
            $to = 'elcar24@gmail.com';
            $subject = 'Заявка на консультацию по телефону';
            $text = 'Нам поступила заявка на консультацию по телефону от пользователя с именем ' . $result['data']['customerName'] . '!<br>Его номер телефона: ' . $result['data']['customerNumber'];
            $headers = 'Content-type: text/html; charset=utf-8\r\n';
            mail($to, $subject, $text, $headers);
            $result['message']['mailSend'] = $result['data']['customerName'] . ", спасибо за обращение! Ожидайте нашего ответа!";
            echo json_encode($result['message']);
        } else echo json_encode($result['message']);
        // Отправка письма на почту компании
    }

    private function customerMail($result)
    {
        if ($result['data']['customerName'] != null) {
            $to = $result['data']['customerName'];
            $from = 'elcar24@gmail.com';
            $subject = 'ELCAR24.BY';
            $text = 'Здравствуйте, ' . $result['data']['customerName'] . '! Нам поступила заявка на консультацию по телефону от Вас. В ближайшее время мы с Вами свяжемся!';
            $headers = 'From:' . $from . '\r\nReply-to:' . $from . '\r\nContent-type: text/html; charset=utf-8\r\n';
            mail($to, $subject, $text, $headers);
        }
        // Отправка письма на почту клиента
    }

    public function executeComponent()
    {
        $this->ourMail(self::validation());
        $this->customerMail(self::validation());
        $this->template->render();
    }
}