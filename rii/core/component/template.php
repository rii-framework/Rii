<?php

namespace Rii\Core\Сomponent;

use Rii\Core\Page;

class Template
{
    public $__path; //Путь к шаблону компонента tepmlates
    public $__relativePath; //URL к папке с шаблоном
    public $id; //Имя шаблона
    public $component; //Компонент
    private $page = null;

    public function __construct($id, $component)
    {
        if (!file_exists($component->__path . "tepmlates/" . $id)) {
            throw new Exception("Папка с шаблоном не найдена!");
        }

        $this->id = $id;
        $this->component = $component;

        $this->__relativePath = pathinfo($_SERVER["REQUEST_URI"])["dirname"] . "/tepmlates/" . $this->id . "/";
        $this->__path =  $this->component->__path . "tepmlates/" . $this->id . "/";

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

        if (file_exists($this->__path . "/" . $page . ".php")) {
            include ($this->__path . "/" . $page . ".php");
        }

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