<?php

namespace Rii\Components\Rii;

use Rii\Core\Application;
use Rii\Core\Component\Base;

class Mailer extends Base
{
    private function hashCheck()
    {
        $requiredHash = $_POST['hash'];
        if ($this->hash == $requiredHash) {
            return true;
        } else return false;
    }

    private function validation()
    {
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
        return $message;
    }

    function setHashValue(&$array)
    {
        foreach ($array as $key => &$value) {
            if (is_array($value)) {
                self::setHashValue($value);
            } else {
                if ($key == 'value' && $value == 'component_hash') {
                    $array['value'] = $this->hash;
                    break;
                }
            }
        }
    }

    private function ourMail()
    {
        $to = 'elcar24@gmail.com';
        $subject = 'Заявка на консультацию по телефону';
        $text = 'Нам поступила заявка на консультацию по телефону от пользователя с именем ' . $_POST['customerName'] . '!<br>Его номер телефона: ' . $_POST['customerNumber'];
        $headers = 'Content-type: text/html; charset=utf-8\r\n';
        mail($to, $subject, $text, $headers);
        $message = $_POST['customerName'] . ", cпасибо за обращение! Ожидайте нашего ответа!";
        return $message;
    }

    public function executeComponent()
    {
        $this->setHashValue($this->params);
        if ($this->hashCheck() == true) {
            if ($this->validation() == null) { // проверка на наличие ошибок
                $this->result['message'] = $this->ourMail();
                Application::getInstance()->restartBuffer();
                $this->template->render('succes');
                Application::getInstance()->endBuffer();
            } else {
                $this->result['message'] = $this->validation();
                Application::getInstance()->restartBuffer();
                $this->template->render('failed');
                Application::getInstance()->endBuffer();
            }
        } else $this->template->render();
    }
}