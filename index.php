<!--Дневник проекта-->
<?php
require_once "rii/core/page.php";

use Rii\Core\Page\Page as Page;

Page::getInstance()->setProperty("title", "Прикол");

echo Page::getInstance()->getProperty("title");

<pre>
    19.12.20
    - Исправил класс Config
    - Создал класс Page
        - Создание полей
        - Создание метовод
            - setPropery
            - getPropery
            - showPropery
</pre>

?>