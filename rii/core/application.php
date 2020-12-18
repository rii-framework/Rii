<?php

// как я понимаю, должен быть обстрактным классом?

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

    private function __wakeup() {}

    private static $__components = [];

    private $pager = null;         // будет объект класса

    private $template = null;      //будет объект класса
}