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

    public static function getBuffer()
    {
        return $output = ob_get_contents();
    }

    public static function header()
    {
        include "templates/default/header.php";
    } // подключение хэдэра шаблона сайта и старт буффера

    public static function footer()
    {
        include "templates/default/footer.php";
    }// конец буферизации, замена макросов подмены, вывод буффера

    public static function restartBuffer()
    {
    }// сброс буффера

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