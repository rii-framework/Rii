<?php

namespace Rii\Core\component;

abstract class Base
{

    public $result;
    public $id;
    public $params;
    public $template;
    public $_path;

    public function __construct($result, $id, $params, $template, $_path)
    {
        $this->result = $result;
        $this->id = $id;
        $this->params = $params;
        $this->template = $template;
        $this->_path = $_path;
    }

    abstract public function executeComponent(); // метод обязателен для переопределения


}