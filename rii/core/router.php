<?php

namespace Rii\Core;

class Router
{
    private static $routes = array();

    private function __construct(){}

    private function __clone(){}

    protected function __wakeup() {}

    // данный метод принимает шаблон url-адреса
    // как шаблон регулярного выражения и связывает его
    // с пользовательской функцией
    public static function route($pattern, $callback)
    {
        // функция str_replace здесь нужна, для экранирования всех прямых слешей
        // так как они используются в качестве маркеров регулярного выражения
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$pattern] = $callback;
    }

    // данный метод проверяет запрошенный $url(адрес) на
    // соответствие адресам, хранящимся в массиве $routes
    public static function execute($url)
    {
        foreach (self::$routes as $pattern => $callback) {
            if (preg_match($pattern, $url, $params)) // сравнение идет через регулярное выражение
            {
                // соответствие найдено, поэтому удаляем первый элемент из массива $params
                // который содержит всю найденную строку
                array_shift($params);
                return call_user_func_array($callback, array_values($params));
            }
        }
    }
}