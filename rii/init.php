<?php
session_start();

define('RII_CORE_INCLUDED', true);

spl_autoload_register(function($class) {

    $className = mb_strtolower($class);
    $className = $_SERVER['DOCUMENT_ROOT']."/".$className  . '.php';
    $className = str_replace('\\', '/', $className);

    if (file_exists($className))
    {
        require $className;
    }
});

// Стартуем сессию
// Объявляем константу RII_CORE_INCLUDED, предназначеную для проверки подключения ядра
// Функция получает имя класса типа Rii\Core\...
// Переводим имя класса в нижний регистр
// Т.к. по условию задачи все namespace должны начинаться Rii\Директория\... в переменную className формируем путь к файлу относить файла init.php
// Путь начинаем с DOCUMENT_ROOT, потом заходим по основному пути который передался в $class + расширение .php
// После заменим обратный слеш
// Проверяем если такой файл, если есть подключаем
