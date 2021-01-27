<?php

namespace Rii\Components\Rii;

use Rii\Core\Component\Base;

class Mailer extends Base
{
    private function hashCheck($requiredHash)
    {
        if ($this->hash == $requiredHash) {
            return true;
        } else return false;
    }

    private function validation()
    {
        // валидация
        // return html-содержание pop-up при наличие ошибок
    }

    private function ourMail()
    {
        // код отправки письма
        // return html-содержание pop-up об успехе
    }

    public function executeComponent()
    {
        $requiredHash = $_POST['hash'];
        if ($this->hashCheck($requiredHash) == true) {
            $this->validation(); // проверка на наличие ошибок
            $this->ourMail(); // отправка письма
        }
        $this->template->render();
    }
}