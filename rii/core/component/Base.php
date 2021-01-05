<?php

namespace Rii\Core\component;

abstract class Base
{

    public $result; // результат работы компонента
    public $id; // имя компонента
    public $params; // параметры для инициализации компонента
    public $template; // экземпляр компонента
    public $_path; // путь к компоненту

    public function __construct($id, $params, $template, $_path)
    {
        $this->id = $id;
        $this->params = $params;
        $this->template = $template;
        $this->_path = $_path;
    }

    abstract public function executeComponent(); // метод обязателен для переопределения


}