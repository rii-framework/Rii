<?php

namespace Rii\Core;

class Application
{
    private function __construct() {} // невозможность создания объекта класса на прямую

    private static $instance = null;   // хранение единственного экземпляра данного класса

    public static function getInstance(): Application   // создание объекта указанного класса
    {
        if (null === self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    private function __clone() {}

    protected function __wakeup() {}

    private static $__components = [];

    private $pager = null;         // будет объект класса

    private $template = null;      //будет объект класса

    public static function isWork()
    {
        $s1 = Application::getInstance();
        $s2 = Application::getInstance();
        if ($s1 === $s2) {
            echo "Singleton works!";
        } else {
            echo "Singleton failed!";
        }
    }
}