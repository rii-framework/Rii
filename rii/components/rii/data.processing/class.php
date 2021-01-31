<?php

namespace Rii\Components\Rii;

use Rii\Core\Application;
use Rii\Core\Component\Base;
use Rii\Core\Mail\Mail;
use Rii\Core\Validator\Validator;

class DataProcessing extends Base
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
        $params['template'] = $this->params['formTemplate'];
        $params['fields'] = $_POST;
        $mail = new Mail($params);
        $mail->send();
        $message = $_POST['name'] . ", cпасибо за обращение! Ожидайте нашего ответа!";
        return $message;
    }

    private function validate()
    {
        $validationRules = [
            'name' => new Validator('required', true, [new Validator('minLength', 2), new Validator('maxLength', 20), new Validator('regexp', '/^[a-zA-Z\p{Cyrillic}\d\s\-]+$/u')]),
            'phone' => new Validator('required', true, [new Validator('phone')]),
            'password' => new Validator('required', true, [new Validator('minLength', 6), new Validator('regexp', "/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/")]),
            'login' => new Validator('required', true, [new Validator('minLength', 4), new Validator('maxLength', 20), new Validator('regexp', '/^[A-Za-z0-9]{0,}$/')]),
            'lastName' => new Validator('required', true, [new Validator('minLength', 2), new Validator('maxLength', 30), new Validator('regexp', '/^[a-zA-Z\p{Cyrillic}\d\s\-]+$/u')]),
            'email' => new Validator('required', true, [new Validator('email')]),
        ];

        foreach ($validationRules as $key => $rule) {
            if (!array_key_exists($key, $_POST)) {
                continue;
            }
            $results[$key] = $rule->exec($_POST[$key]);
        }

        return $results;
    }

    private function errors($array)
    {
        $replacements = ['name' => 'Имя введено некоректно!', 'phone' => 'Телефон введен некоректно!', 'lastName' => 'Фамилия введена некоректно', 'login' => 'Логин введен некоректно', 'email' => 'Почта введена некоректно', 'password' => 'Пароль введен некоректно'];

        foreach ($array as $key => $value) {
            if ($value == false) {
                $errors[$key] = $replacements[$key];
            }
        }
        return $errors;
    }

    public function executeComponent()
    {
        $this->setHashValue($this->params);
        if ($this->hashCheck() == true) {
            if ($_POST['ajax'] != 'yes') die();
            $errors = $this->errors($this->validate());
            $this->ourMail();
            if ($errors != null) {
                $this->result['message'] = $errors;
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