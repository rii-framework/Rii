<?php

namespace Rii\Core\Component;

use Rii\Core\Page;

class Template
{
    public $__path; //Путь к шаблону компонента templates
    public $__relativePath; //URL к папке с шаблоном
    public $id; //Имя шаблона
    public $component; //Компонент
    private $page = null;

    public function __construct($id, $component)
    {
        if (!file_exists($component->__path . "templates/" . $id)) {
            throw new \Exception("Папка с шаблоном не найдена!");
        }

        $this->id = $id;
        $this->component = $component;

        $this->__relativePath = substr($this->component->__path, strlen($_SERVER['DOCUMENT_ROOT']), -1) . "/templates/" . $this->id . "/";

        $this->__path =  $this->component->__path . "templates/" . $this->id . "/";

        $this->page = Page::getInstance();
    }

    //Подключение файла шаблона | $page - страница подключения в шаблоне. По дефолту template.php
    public function render($page = "template"): void
    {
        $result = $this->component->result;
        $params = $this->component->params;

        if (file_exists($this->__path . "/result_modifier.php")) {
            include $this->__path . "/result_modifier.php";
        }

        if (!file_exists($this->__path . "/" . $page . ".php")) {
            throw new \Exception("Папка с шаблоном не найдена!");
        }

        include ($this->__path . "/" . $page . ".php");

        if (file_exists($this->__path . "/component_epilog.php")) {
            include ($this->__path . "/component_epilog.php");
        }

        if (file_exists($this->__path . "/style.css")) {
            $this->page->addCss($this->__relativePath . "/style.css");
        }

        if (file_exists($this->__path . "/script.js")) {
            $this->page->addJs($this->__relativePath . "/script.js");
        }
    }
}