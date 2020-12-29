<?php
include 'rii/init.php';
include 'rii/core/application.php';

use Rii\Core\Application;

Application::getInstance()->header();
\Rii\Core\Page::getInstance()->setProperty('Title', "История изменений");
?>
<pre>
19.12.20
    Создаем макет внешней оболочки сайта
    Создаем буффер
</pre>
<pre>
29.12.20 9:00
    Вывожу footer через echo
    Прописываю в своем классе DOCUMENT_ROOT
    Делаю start / end / restart  (buffer) не статическими
    Добавил id для template
    endBuffer должен возвращать контент (предварительно заменив все свойства страницы. Это будет после того, как ты получишь себе класс Page)
    Исключить возможность повторного подключения хэдэра и футера. Т.е. в статических методах мы должны работать с нашим синглтоном и понимать чем живёт страница
</pre>
<?
Application::getInstance()->footer();
?>
