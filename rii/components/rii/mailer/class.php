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
                (new Validator('required', true))->exec($_POST['name']),
                (new Validator('minLength', 2))->exec($_POST['name']),
                (new Validator('maxLength', 20))->exec($_POST['name']),
            ],
            'phone' => [
                (new Validator('required', true))->exec($_POST['phone']),
                (new Validator('regexp', '/\+?([0-9]{1,3})-?([0-9]{2})-?([0-9]{7})/'))->exec($_POST['phone']),
            ],
//            'password' => [
//                (new Validator('required', true))->exec($_POST['password']),
//                (new Validator('minLength', 6))->exec($_POST['password']),
//                (new Validator('regexp', "/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/"))->exec($_POST['password']),
//            ],
//            'login' => [
//                (new Validator('required', true))->exec($_POST['login']),
//                (new Validator('minLength', 4))->exec($_POST['login']),
//                (new Validator('maxLength', 20))->exec($_POST['login']),
//                (new Validator('regexp', '/^[A-Za-z0-9]{0,}$/'))->exec($_POST['login']),
//            ],
//            'lastName' => [
//                (new Validator('required', true))->exec($_POST['lastName'])->exec($_POST['name']),
//                (new Validator('minLength', 2))->exec($_POST['lastName'])->exec($_POST['name']),
//                (new Validator('maxLength', 30))->exec($_POST['lastName'])->exec($_POST['name']),
//                (new Validator('regexp', '/^[A-Za-zА-Яа-яЁё]{0,}$/'))->exec($_POST['lastName'])->exec($_POST['name']),
//            ],
//            'email' => [
//                (new Validator('required', true))->exec($_POST['email']),
//                (new Validator('email', true))->exec($_POST['email']),
//            ]
        ];
        return $validationRules;
    }

    private function error($array)
    {
        // Вывод конкретных ошибок
        foreach ($array as $typeKey=>$item){
            foreach ($item as $value){
                var_dump($value);
                if ($value == false){
                    $error[] = 'Error';
                }
            }
        }
        return $error;
    }

    public function executeComponent()
    {
        $this->setHashValue($this->params);
        if ($this->hashCheck() == true) {
            $errors = $this->error($this->validate());
            if ($errors != null) {
                $error[] = 'Есть ошибки';
                $this->result['message'] = $error;
                Application::getInstance()->restartBuffer();
                $this->template->render('failed');
                Application::getInstance()->endBuffer();
            } else {
                Application::getInstance()->restartBuffer();
                $this->result['message'] = $this->ourMail();
                $this->template->render('succes');
                Application::getInstance()->endBuffer();
            }
        } else
            $this->template->render();
    }
}