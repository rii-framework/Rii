<?php

namespace Rii\Core;

class Application
{
    private $page = null;

    private $template = null;

    //Поле для хранения экземпляра класса
    private static $instance = null;

    //Массив компонентов
    private static $__components = [];  // массив объектов класса

    //Скрытие конструктора
    private function __construct()
    {
        $this->page = Page::getInstance();
    }

    //Создание объекта указанного класса
    public static function getInstance(): Application
    {
        if (null === self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    //Создание метода, который подключает и инициализирует компонент по указанным параметрам
    public static function includeComponent(string $componentName, string $componentTemplate, array $arParams)
    {
        $componentPath = $_SERVER['DOCUMENT_ROOT'] . '/rii/components/' . str_replace(':', '/', $componentName) . '/class.php';
        try {
            if (!file_exists($componentPath)) {
                throw new \Exception("Ошибка загрузки компонента!");
            } // проверка на существование
            else {
                $allClassesArray = get_declared_classes();
                include $componentPath;
                $newClassesArray = get_declared_classes();

                $classname = array_diff($newClassesArray, $allClassesArray);
                foreach ($classname as $item) {
                    if (get_parent_class($item) == "Rii\Components\Base") {
                        $componentClass = $item;
                    }
                }
                $component = new $componentClass($componentName, $componentTemplate, $arParams);
                $component->executeComponent();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
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
    private function startBuffer()
    {
        ob_start();
        $flag = new Application();
        $flag->isBufferStart = true;
    }

    //Завершение работы буффера
    private function endBuffer()
    {
        $content = ob_get_clean();
        $this->isBufferStart = false;
        $replacement = $this->page->getAllReplace();
        $content = str_replace(array_keys($replacement), $replacement, $content);
        return $content;
    }

    //Подключение хэдэра шаблона сайта и запуск буффера
    public static function header()
    {
        self::getInstance()->startBuffer();
        include $_SERVER['DOCUMENT_ROOT'] . "/rii/templates/" . Config::get("TEMPLATE/ID") . "/header.php";
    }

    //Завершение работы буффера, замена макросов подмены, вывод содержимого буффера
    public static function footer()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/rii/templates/" . Config::get("TEMPLATE/ID") . "/footer.php";
        $content = self::getInstance()->endBuffer();
        echo $content;
    }

    //Сброс контента буффера и продолжение его работы
    public function restartBuffer()
    {
        if ($this->isBufferStart == true) {
            ob_clean();
        } else {
            $this->startBuffer();
        }
    }

    //Проверка старта буффера
    private $isBufferStart = false;
}