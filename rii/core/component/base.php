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
        if ($template != null)
        {
            $this->template = $template;
        } elseif ($template = '')
        {
            $this->template = new Template;
        }
        $this->id = $id;
        $this->params = $params;
        $this->__path = $_SERVER['DOCUMENT_ROOT'] . "/rii/components/" . $id . "/"; // Rii/rii/components/rii/component_id
        $this->__path = str_replace(':', '/', $this->__path);
    }

    abstract public function executeComponent(); // метод обязателен для переопределения
}