<?php

namespace Rii\Core\Сomponent;

class Template
{
    private static $__path; //путь к шаблону на сервере
    private static $__relativePath; //url к папке с шаблоном
    private static $namespace = "rii"; // пространство имён, rii если внутренний компонент
    private static $id = "ElementList"; // имя компонент
    private static $def = "default"; // название папки с шаблоном по умолчанию

    public function __construct($component)
    {
        self::$namespace = $component::$namespace;
        self::$id = $component::$id;

        if ($component::$def !== "") {
            self::$def = $component::$def;
        }            
    }

    //Подключение файла шаблона | $page - страница подключения в шаблоне. По дефолту template.php 
    public static function render($page = "template"): void
    {
        self::$__path = "/components/" . self::$namespace . "/" . self::$id . "/templates/" . self::$def; // /components/rii/ElementList/templates/default

        self::$__relativePath = $_SERVER['DOCUMENT_ROOT'] . "/rii" . self::$__path; // /Rii/rii/components/rii/ElementList/templates/default

        if (file_exists(self::$__relativePath . "/result_modifier.php")) {
            require_once (self::$__relativePath . "/result_modifier.php");
        }

        if (file_exists(self::$__relativePath . "/" . $page . ".php")) {
            require_once (self::$__relativePath . "/" . $page . ".php");
        }

        if (file_exists(self::$__relativePath . "/component_epilog.php")) {
            require_once (self::$__relativePath . "/component_epilog.php");
        }

        if (file_exists(self::$__relativePath . "/style.css")) {
            //Page::addCss(self::$__relativePath . "/style.css");
        }

        if (file_exists(self::$__relativePath . "/script.js")) {
            //Page::addJs(self::$__relativePath . "/script.js");
        }
    }    
}