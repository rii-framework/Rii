<?php

namespace Rii\Components\Rii;

use Rii\Core\Application;
use Rii\Core\Component\Base;
use Rii\Core\Mail\Mail;
use Rii\Core\Validator;

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
        $emailFields['template'] = $this->params['formTemplate'];
        foreach ($this->params['sendFields'] as $key) {
            $emailFields['fields'][$key] = $_POST[$key];
        }
        $mail = new Mail($emailFields);
        $mail->send();
        $message = $_POST['name'] . ", cпасибо за обращение! Ожидайте нашего ответа!";
        return $message;
    }

    private function validate()
    {
        $validationRules = $this->params['validationRules'];

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
        foreach ($array as $key => $value) {
            if ($value == false) {
                $errors[$key] = $key;
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