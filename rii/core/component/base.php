<?php

namespace Rii\Core\Component;

abstract class Base
{
    public $result = []; // результат работы компонента
    public $id = ''; // имя компонента
    public $params = []; // параметры для инициализации компонента
    public $template = null; // экземпляр компонента
    public $__path; // путь к компоненту

    public function __construct($id, $template = null, $params = [])
    {
        $this->id = $id;
        $this->params = $params;
        $this->__path = $_SERVER['DOCUMENT_ROOT'] . "/rii/components/" . str_replace(':', '/', $id) . "/";
        if ($template != null)
        {
            if ($template == '')
            {
                $this->template = 'default';
            }
            $this->template = new Template($template, $this);
        }
    }

    abstract public function executeComponent(); // метод обязателен для переопределения
}