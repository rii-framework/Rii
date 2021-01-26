<?php

namespace Rii\Components\Rii;

use Rii\Core\Component\Base;

class Mailer extends Base
{
    private function hashCheck()
    {

    }

    public function executeComponent()
    {
        $this->hashCheck();
        $this->template->render();
    }
}