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


// функция получает имя класса типа Rii\Core\
// переводим имя класса в нижний регистр
// т.к. по условию задачи все namespace должны начинаться Rii\Директория\
// в переменную className формируем путь к файлу относить файла init.php
// путь начинается с '../' нужно выйти из текущей директории, а потом заходим по основному
// пути который передался в $class + расширение .php
// после заменим обратный слеш
// проверяем если такой файл, если есть подключаем
//константа RII_CORE_INCLUDED предназначена для проверки подключено ли ядро