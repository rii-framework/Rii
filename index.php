<?php
include 'rii/init.php';
use Rii\Core\Application;

Application::getInstance()->header();
\Rii\Core\Page::getInstance()->setProperty('Title', "История изменений");
?>
<pre>
29.12.20 9:00
    1. Footer выводится через echo
    2. Template подключается через DOCUMENT_ROOT с использованием id шаблона
    3. start / end / restart  -buffer не статическими
    4. endBuffer предварительно заменяет все свойства страницы, а потом возвращает контент
    5. Повторное подключение буффера теперь невозможно

19.12.20
    1. Создан макет внешней оболочки сайта
    2. Создан буффер
</pre>
<?
Application::getInstance()->footer();
?>
