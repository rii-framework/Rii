<?php

namespace Rii\Core\component;

abstract class Base
{

    public $result = []; // результат работы компонента
    public $id = 'element.list'; // имя компонента
    public $params = []; // параметры для инициализации компонента
    public $template = 'default'; // экземпляр компонента
    public $_path; // путь к компоненту

    public function __construct($id, $template = null, $params = [])
    {
        if ($template != null)
        {
            $this->id = $id;
            $this->params = $params;
            $this->template = $template;
            $this->_path = $_SERVER['DOCUMENT_ROOT'] . '/rii/core/component' . $id;// Rii/rii/core/component/component_id
        }
    }

    abstract public function executeComponent(); // метод обязателен для переопределения


}