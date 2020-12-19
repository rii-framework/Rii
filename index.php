<?php
include 'rii/init.php';
include 'rii/core/application.php';

use Rii\Core\Config\Application;

Application::startBuffer();
Application::getInstance()->header();
?>
    <pre>
    19.12.20 12:40 Начинанаем делать внешнюю оболочку
        19.12.20 14:40 Работаю над буфером
</pre>
<?
Application::getInstance()->footer();
Application::endBuffer();
?>