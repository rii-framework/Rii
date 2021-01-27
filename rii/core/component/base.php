<?php

namespace Rii\Core\Component;

abstract class Base
{
    public $result = []; // результат работы компонента
    public $id = ''; // имя компонента
    public $params = []; // параметры для инициализации компонента
    public $template = null; // экземпляр компонента
    public $__path; // путь к компоненту
    public $hash; // хэш компонента

    public function __construct($id, $template = null, $params = [])
    {
        $this->id = $id;
        $this->params = $params;
        $id = str_replace(':', '/', $id);
        $this->__path = $_SERVER['DOCUMENT_ROOT'] . "/rii/components/" . $id . "/"; // Rii/rii/components/rii/component_id

        if ($template != null) {
            if ($template == '') {
                $this->template = 'default';
            }
            $this->template = new Template($template, $this);
        }
        $this->hash = md5(serialize([debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT | DEBUG_BACKTRACE_IGNORE_ARGS), $this->id, $this->params, $this->template]));
    }

    abstract public function executeComponent(); // метод обязателен для переопределения
}