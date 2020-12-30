<?php
include 'rii/init.php';
use Rii\Core\Application;
use Rii\Core\Page;

Application::getInstance()->header();
Page::getInstance()->setProperty('Title', "История изменений");
?>
<pre>
29.12.20 9:00
    1. Вывожу footer через echo
    2. Прописываю в своем классе DOCUMENT_ROOT
    3. Делаю start / end / restart  (buffer) не статическими
    4. Добавил id для template
    5. endBuffer должен возвращать контент (предварительно заменив все свойства страницы. Это будет после того, как ты получишь себе класс Page)
    6. Исключить возможность повторного подключения хэдэра и футера. Т.е. в статических методах мы должны работать с нашим синглтоном и понимать чем живёт страница

19.12.20
    1. Создаем макет внешней оболочки сайта
    2. Создаем буффер
</pre>

<?
Application::getInstance()->footer();
?>
