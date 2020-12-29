<?php

namespace Rii\Core\Config;

class Application
{
    //Скрытие конструктора
    private function __construct()
    {
    }

    //Поле для хранения экземпляра класса
    private static $instance = null;

    //Создание объекта указанного класса
    public static function getInstance(): Application
    {
        if (null === self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    //Скрытие клонирования
    private function __clone()
    {
    }

    //Скрытие востановления
    protected function __wakeup()
    {
    }

    //Запуск буффера
    public function startBuffer()
    {
        ob_start();
    }

    //Завершение работы буффера
    public function endBuffer()
    {
        ob_end_flush();
    }

    //Подключение хэдэра шаблона сайта и запуск буффера
    public function header()
    {
        self::startBuffer();
        include $_SERVER['DOCUMENT_ROOT'] . "/rii/templates/default/header.php";  // добавить DOCUMENT_ROOT
    }

    //Завершение работы буффера, замена макросов подмены, вывод содержимого буффера
    public function footer()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/rii/templates/default/footer.php";  // добавить DOCUMENT_ROOT
        $content = ob_get_contents();
        self::endBuffer();
        echo $content;
    }

    //Сброс контента буффера и продолжение его работы
    public function restartBuffer()
    {
        ob_clean();
    }

    //Массив компонентов
    private static $__components = [];

    private $pager = null;



    private $template = null;
}