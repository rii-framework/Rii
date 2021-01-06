<?php

namespace Rii\Component\Rii;
use Rii\Core\Component\Base;

class ElementList extends Base
{
    public function executeComponent()
    {
        $this->template->render();
    }
}