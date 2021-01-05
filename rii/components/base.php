<?php

namespace Rii\Components;

abstract class Base
{
    public $id = ''; // имя компонента
    public $template = ''; // экземпляр компонента
    public $params = []; // параметры для инициализации компонента
    public $__path; // путь к компоненту

    public function __construct($id, $template = null, $params = [])
    {
        if ($template != null) {
            $this->template = $template;
        } elseif ($template = '') {
            $this->template = 'default';
        }
        $this->id = $id;
        $this->params = $params;
        $this->__path = $_SERVER['DOCUMENT_ROOT'] . '/rii/components/' . $id;// Rii/rii/components
    }

    abstract public function executeComponent(); // метод обязателен для переопределения
}