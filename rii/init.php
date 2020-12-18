<?php
session_start();

function autoload ($className)
{
    $class = explode('\\', $className);
    switch ($class[0])
    {
        case 'core':
            require __DIR__ . '/core/' . implode(DIRECTORY_SEPARATOR, $class) . '.php';
            break;
        case 'db':
            require __DIR__ . '/db/' . implode(DIRECTORY_SEPARATOR, $class) . '.php';
            break;
    }
}

spl_autoload_register('autoload', true, true);