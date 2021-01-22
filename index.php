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
            'wrap' => [
                'additional_class' => 'spanss',
                'attr' => [
                    'id' => 'loginn',
                ],
            ],            
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

<h2>История изменений проекта:</h2>
<?php
$app->includeComponent("rii:element.list", "default", ['sort' => ['date' => 'desc'], 'limit' => 5, 'data_type' => 'json', 'data_file' => '/upload/history.json']);
?>

<? Application::getInstance()->footer(); ?>