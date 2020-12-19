<?php
session_start();

spl_autoload_register(function($class) {

    $className = mb_strtolower($class);
    $className = '../' .$className  . '.php';
    $className = str_replace('\\', '/', $className);

    if (file_exists($className)) require $className;
});