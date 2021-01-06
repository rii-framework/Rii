<?php

namespace Rii\Components;

class ElementList extends Base
{
    public function __construct()
    {
        parent::__construct('ElementList');
    }

    public function executeComponent()
    {
        echo '+++';
    }
}