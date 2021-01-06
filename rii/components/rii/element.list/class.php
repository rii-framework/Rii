<?php

namespace Rii\Core\Component;

class ElementList extends Base
{
    public function __construct($componentName, $componentTemplate, $arParams)
    {
        parent::__construct($componentName, $componentTemplate, $arParams);
    }

    public function executeComponent()
    {
        echo 'Компонент работает!';
    }
}