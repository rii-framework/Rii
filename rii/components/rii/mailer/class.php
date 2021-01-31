<?php

namespace Rii\Components\Rii;

use Rii\Core\Application;
use Rii\Core\Component\Base;
use Rii\Core\Mail\Mail;
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
            'name' => [
                (new Validator('required', true, [
                    (new Validator('minLength', 2))->exec($_POST['name']),
                    (new Validator('maxLength', 20))->exec($_POST['name']),
                    (new Validator('regexp', 'C'))->exec($_POST['name']),
                ]))->exec($_POST['name'],
                )
            ],
            'phone' => [
                (new Validator('required', true, [
                    (new Validator('phone'))->exec($_POST['phone']),
                ]))->exec($_POST['phone']),
            ],
//            'password' => [
//                new Validator('required', true),
//                new Validator('minLength', 6),
//                new Validator('regexp', "/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/"),
//            ],
//            'login' => [
//                new Validator('required', true),
//                new Validator('minLength', 4),
//                new Validator('maxLength', 20),
//                new Validator('regexp', '/^[A-Za-z0-9]{0,}$/'),
//            ],
//            'lastName' => [
//                new Validator('required', true),
//                new Validator('minLength', 2),
//                new Validator('maxLength', 30),
//                new Validator('regexp', '/^[a-zA-Z\p{Cyrillic}\d\s\-]+$/u'),
//            ],
//            'email' => [
//                new Validator('required', true),
//                new Validator('email'),
//            ],
        ];

//        foreach ($validationRules as $key1 => $rule) {
//            foreach ($rule as $key2 => $item) {
//                if (!array_key_exists($key1, $_POST)) {
//                    unset($validationRules[$key1]);
//                    continue;
//                }
//                $validationRules[$key1][$key2] = $item->exec($_POST[$key1]);
//            }
//        }

//        var_dump($validationRules);

        return $validationRules;
    }

    private function errors($array)
    {
        $replacements = ['name' => 'Имя введено некоректно!', 'phone' => 'Телефон введен некоректно!', 'lastName' => 'Фамилия введена некоректно', 'login' => 'Логин введен некоректно', 'email' => 'Почта введена некоректно', 'password' => 'Пароль введен некоректно'];

        foreach ($array as $typeKey => $item) {
            foreach ($item as $value) {
                if ($value == false) {
                    $errors[$typeKey] = $typeKey;
                    $errors[$typeKey] = str_replace($typeKey, $replacements[$typeKey], $errors[$typeKey]);
                }
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
//            die();
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