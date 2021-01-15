<?php
include 'rii/init.php';
use Rii\Core\Application;
use Rii\Core\Page;

$app = Application::getInstance();
$app->header();
Page::getInstance()->setProperty('Title', "История изменений");

$app->includeComponent("rii:interfaceform", "default", 
[
    'additional_class' => 'form-auth', //классы на контейнер формы
    'attr' => [  //доп атрибуты
        'id' => 'form-auth',
    ],
    'method' => 'post',
    'action' => '',
    'elements' => [  //список элементов формы
        [
            'type' => 'text', //тип элемента
            'name' => 'login',
            'additional_class' => 'js-login', //классы на элемент формы
            'attr' => [ //доп атрибуты
                'data-id' => 'login',
            ],
            'title' => 'Логин', //label впереди элемента
            'default' => 'Введите логин', //placeholder
            'wrap' => [ //обёртка в div
                'additional_class' => 'form-group',
            ]
        ],
        [
            'type' => 'password',
            'name' => 'password',
            'additional_class' => ['js-pass2', 'js-pass'],
            'title' => 'Пароль',
            'default' => 'Введите пароль',
            'wrap' => [
                'additional_class' => 'form-group',
            ]
        ],
        [
            'type' => 'hidden',
            'name' => 'word',
            'value' => 'test',
        ],
        [
            'type' => 'select',
            'name' => 'serv',
            'additional_class' => 'js-serv',
            'attr' => [
                'data-id' => 'serv',
            ],
            'title' => 'Выберите сервер',
            'wrap' => [
                'additional_class' => 'form-group',
            ],            
            'list' => [
                [
                    'title' => 'Онлайнер',
                    'value' => 'onliner',
                    'additional_class' => 'mini--option',
                    'attr' => [
                        'data-id' => '188'
                    ],
                    'selected' => true
                ],
                [
                    'title' => 'Тутбай',
                    'value' => 'tut',
                ]
            ]
        ],
        [
            'type' => 'checkbox',
            'name' => 'remember',
            'additional_class' => 'js-remember',
            'attr' => [
                'data-id' => 'remember'
            ],
            'checked' => true,
            'title' => 'Запомнить',
            'wrap' => [
                'additional_class' => 'form-group'
            ]
        ],
        [
            'type' => 'submit',
            'additional_class' => 'js-btn',
            'attr' => [
                'id' => 'sub-btn'
            ],
            'value' => 'Войти'
        ],
        
    ]
]);
?>
<pre>

-------- 15.01.2021 - Ilya_V --------
    1. Добавление параметров method и action для хранения метода запроса и пути отправки данных формы
    2. Добавление метода getTagIHidden для формирования тега input типа hidden с атрибутами (name, value)

-------- 13.01.2021 - Ilya_V --------
    1. Доработка компонента InterfaceForm
    2. Добавление полей elements и attributes для хранения элементов и атрибутов формы
    3. Добавление htmlspecialchars для преобразования выводимого текста на страницу

-------- 11.01.2021 - Ilya_V --------
    1. Создание класса(компонента) InterfaceForm
    2. Создание метода renderForm для формирование формы
    3. Создание метода renderElements для формирование элементов
    4. Создание метода getAttr для формирования списка атрибутов или data- атрибутов
    5. Создание методов (getClass, getAttr, getMethod, getId, getFor, getAccesskey, getAction, getName, getPlaceholder, getValue, getDisabled, getSelected, getChecked) для формирования атрибутов (class, доп атрибутов, method, id, for, accesskey, action, name, placeholder, value, disabled, selected, checked)
    6. Создание методов (getTagLabel, getTagOption, getTagInput, getTagSelect, getTagTextarea) для формирования тегов (label, option, input, select, textarea)

-------- 06.01.2020 - Roma --------
    1. Доработана инициализация $template. Если $template пустая строка, то инициализируем дефолтный шаблон

-------- 06.01.2021 - Ilya_V --------
    1. Доработка класса Template

-------- 06.01.2021 - Ilya_Ch --------
    1. Создан метод Application::includeComponent
    2. Создан компонент rii/components/rii/element.list/class.php
    3. Создан rii/components/rii/element.list/templates/default/template.php


-------- 05.01.2020 - Roma --------
    1. Исправлена переменная __path (теперь символы заменяются только в $id)
    2. Исправлен конструктор. Передаётся одна обязательная $id и две дефолтные $template и $params.
    3. Добавлены типы полям класса
    4. Доработана инициализация $template (теперь если значение равно null шаблон не загружается)

-------- 04.01.2020 - Roma --------
    1. Создание базового класса для шаблонов
    
-------- 04.01.2021 - Ilya_V --------
    1. Создание класса Template
    2. Создание метода render для подключения файлов шаблона

-------- 30.12.2020 - Ilya_V --------
    1. Создание метода showHead для добавления макросов (css, string, js)

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

-------- 19.12.2020 - Roma --------
    1. Создан файл автозагрузки классов
    2. Добвалена константа проверки (RII_CORE_INCLUDED) для проверки подключения ядра
    3. Исправлена переменная формирования пути. (добавлена переменная $_SERVER['DOCUMENT_ROOT'])

</pre>
<?
Application::getInstance()->footer();
?>
