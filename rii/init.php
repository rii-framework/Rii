<?php
session_start();

spl_autoload_register(function($class) {

    $className = '../' .$class  . '.php';
    $className = str_replace('\\', '/', $className);

    echo '<b>autoload: ' . $class . '</b> file: ' . $className . '<br>';

    if (file_exists($className)) require $className;
});

//$test = new Rii\Core\test();
// фнкция получает имя класса типа Rii\Core\
// т.к. по условию задачи все namespace должны начинаться Rii\Дириктория\
// в переменную className формируем путь к файлу относить файла init.php
// путь начинается с '../' нужно выйти из текущей дириктории, а потом заходим по основному
// пути который передался в $class + расширение .php
// после заменем обратный слэш
// проверем если такой файл, если есть подключаем