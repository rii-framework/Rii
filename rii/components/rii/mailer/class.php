<?php

namespace Rii\Components\Rii;

use Rii\Core\Application;
use Rii\Core\Component\Base;
use Rii\Core\Validator\Validator;

class Mailer extends Base
{
    private function hashCheck()
    {
        $requiredHash = $_POST['hash'];
        if ($this->hash == $requiredHash) {
            return true;
        } else return false;
    }

    function setHashValue(&$array)
    {
        foreach ($array as $key => &$value) {
            if (is_array($value)) {
                self::setHashValue($value);
            } else {
                if ($key == 'value' && $value == '') {
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
        $text = 'Нам поступила заявка на консультацию по телефону от пользователя с именем ' . $_POST['name'] . '!<br>Его номер телефона: ' . $_POST['phone'];
        $headers = 'Content-type: text/html; charset=utf-8\r\n';
        mail($to, $subject, $text, $headers);
        $message = $_POST['name'] . ", cпасибо за обращение! Ожидайте нашего ответа!";
        return $message;
    }

    private function validate()
    {
        $validationRules = [
            'name' => [
                'required' => true,
                'min' => 2,
                'max' => 30,
            ],
            'lastName' => [
                'required' => true,
                'min' => 2,
                'max' => 50,
            ], 'email' => [
                'required' => true,
            ], 'phone' => [
                'required' => true,
                'min' => 9,
                'max' => 12
            ], 'password' => [
                'required' => true,
                'min' => 6,
            ], 'login' => [
                'required' => true,
                'min' => 4,
                'max' => 30,
            ], 'ajax' => [
                'required' => true,
            ]
        ];
        $validation = new Validator();
        foreach ($_POST as $item) {
            $validation->validate($item, $validationRules);
        }

    }

    public function executeComponent()
    {
        $this->setHashValue($this->params);
        if ($this->hashCheck() == true) {
            $errors = $this->validate();
            if ($errors == null) {
                $this->result['message'] = $this->ourMail();
                Application::getInstance()->restartBuffer();
                $this->template->render('succes');
                Application::getInstance()->endBuffer();
            } else {
                $this->result['message'] = $errors;
                Application::getInstance()->restartBuffer();
                $this->template->render('failed');
                Application::getInstance()->endBuffer();
            }
        } else $this->template->render();
    }
}