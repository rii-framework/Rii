<?php
include 'rii/init.php';
use Rii\Core\Application;
use Rii\Core\Page;

Application::getInstance()->header();
Page::getInstance()->setProperty('Title', "История изменений");
Application::includeComponent("rii:element.list", "default", ['sort' => 'date', 'limit' => 10 ]);
?>
<pre>
-------- 06.01.2021 - Ilya_Ch --------
    1. Создан метод Application::includeComponent
    1. Создан компонент rii/components/rii/element.list/class.php

-------- 05.01.2021 - Ilya_Ch --------
    1. Неудачная попытка создания метода Application::includeComponent
    1. Неудачная попытка создания компонента rii/components/rii/element.list/class.php

-------- 29.12.2020 - Ilya_Ch --------
    1. Вывожу footer через echo
    2. Прописываю в своем классе DOCUMENT_ROOT
    3. Делаю start / end / restart  (buffer) не статическими
    4. Добавил id для template
    5. endBuffer должен возвращать контент (предварительно заменив все свойства страницы. Это будет после того, как ты получишь себе класс Page)
    6. Исключить возможность повторного подключения хэдэра и футера. Т.е. в статических методах мы должны работать с нашим синглтоном и понимать чем живёт страница

-------- 28.12.2020 - Ilya_V --------
    1. Подправил наследование класса Page, и доступность полей и методов
    2. Переделал пользовательский конструктор
    3. Создал функцию getMacro для формирования макроса
    4. Реализовал get, set, show для property (получение, установка, вывод макроса)
    5. Реализовал add, show для js (получение, установка, вывод макроса)
    6. Реализовал add, show для css (получение, установка, вывод макроса)
    7. Реализовал add, show для string (получение, установка, вывод макроса)
    8. Создал функцию getAllReplace для формирования массива для замены (макрос => значение) 
    9. Создал функцию getStr для преобразования готового массива в строку
    10. Создал функцию getGroupingProperty для формирования массива property (макрос => значение) 

-------- 19.12.2020 - Ilya_Ch --------
    1. Создаем макет внешней оболочки сайта
    2. Создаем буффер

-------- 19.12.2020 - Ilya_V --------
    1. Переписал функцию get класс Config
    2. Создал класс Page (Singleton)
    3. Содал макет под методы getProperty, setProperty, showProperty, addJs, addCss, addString
</pre>
<?
Application::getInstance()->footer();
?>
