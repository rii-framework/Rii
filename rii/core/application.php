<?php

namespace Rii\Core\Config;

class Application
{
    private function __construct()
    {
    } // невозможность создания объекта класса на прямую

    private static $instance = null;   // хранение единственного экземпляра данного класса

    public static function getInstance(): Application   // создание объекта указанного класса
    {
        if (null === self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    private function __clone()
    {
    }

    protected function __wakeup()
    {
    }

    public static function startBuffer()
    {
        ob_start();
    }

    public static function endBuffer()
    {
        ob_end_flush();
    }

    public static function header()
    {
        self::startBuffer();
        include "templates/default/header.php";
    } // подключение хэдэра шаблона сайта и старт буффера

    public static function footer()
    {
        include "templates/default/footer.php";
        $result = ob_get_contents();
        self::endBuffer();
        return $result;
    }// конец буферизации, замена макросов подмены, вывод буффера

    public static function restartBuffer()
    {
        ob_clean();
    }// сброс буффера

    private static $__components = [];

    private $pager = null;         // будет объект класса

    private $template = null;      //будет объект класса
}