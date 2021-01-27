<?php
include 'rii/init.php';

use Rii\Core\Application;
use Rii\Core\Page;

$app = Application::getInstance();
Application::header();
Page::getInstance()->setProperty('Title', "ELCAR24"); ?>

<?php $app->includeComponent("rii:element.list", "services", ['data_file' => '/rii/db/services.json']); ?>

<?php $app->includeComponent("rii:element.list", "advantages", ['data_file' => '/rii/db/advantages.json']); ?>

    <section class="s-section section-gradient">
        <div class="container">
            <div class="block--form block-mini">
                <h2>Получить бесплатную консультацию</h2>

                <?php $app->includeComponent("rii:mailer", "default", ['formName' => "rii:interfaceform", 'formTemplate' => "default", 'params' => [
                    'additional_class' => 'form--wrapp', //классы на контейнер формы
                    'attr' => [  //доп атрибуты
                        'id' => 'section-gradient-form',
                    ],
                    'elements' => [
                        [
                            'type' => 'text',
                            'name' => 'customerName',
                            'attr' => [ //доп атрибуты
                                'id' => 'customerName',
                            ],
                            'default' => 'Ваше имя',
                        ], [
                            'type' => 'text',
                            'name' => 'customerNumber',
                            'attr' => [
                                'id' => 'customerNumber'
                            ],
                            'default' => 'Ваш номер',
                        ], [
                            'type' => 'submit',
                            'attr' => [
                                'class' => 'submit'
                            ],
                            'value' => 'Заказать звонок'
                        ],
                        [
                            'type' => 'hidden',
                            'name' => 'hash',
                            'value' => 0,
                        ]
                    ]
                ]]); ?>

                <div class="description">*Нажимая на кнопку «Заказать звонок», я даю согласие на обработку персональных
                    данных
                </div>
            </div>
        </div>
    </section>

<?php $app->includeComponent("rii:element.list", "service_cost", ['data_file' => '/rii/db/service_cost.json']); ?>

<?php $app->includeComponent("rii:element.list", "know", ['data_file' => '/rii/db/know.json']); ?>

<?php $app->includeComponent("rii:element.list", "reviews", ['data_file' => '/rii/db/reviews.json']); ?>

<?php $app->includeComponent("rii:element.list", "brands", ['data_file' => '/rii/db/brands.json']); ?>

    <section class="s-section section-orange">
        <div class="container">
            <div class="block--form">
                <h2>Остались вопросы?</h2>

                <?php $app->includeComponent("rii:mailer", "default", ['formName' => "rii:interfaceform", 'formTemplate' => "default", 'params' => [
                    'additional_class' => 'form--wrapp', //классы на контейнер формы
                    'attr' => [  //доп атрибуты
                        'id' => 'section-orange-form',
                    ],
                    'elements' => [
                        [
                            'type' => 'text',
                            'name' => 'customerName',
                            'attr' => [ //доп атрибуты
                                'id' => 'customerName',
                            ],
                            'default' => 'Ваше имя',
                        ], [
                            'type' => 'text',
                            'name' => 'customerNumber',
                            'attr' => [
                                'id' => 'customerNumber'
                            ],
                            'default' => 'Ваш номер',
                        ], [
                            'type' => 'submit',
                            'attr' => [
                                'class' => 'submit'
                            ],
                            'value' => 'Заказать звонок'
                        ], [
                            'type' => 'hidden',
                            'name' => 'hash',
                            'value' => '',
                        ]
                    ]
                ]]); ?>

                <div class="description">*Нажимая на кнопку «Заказать звонок», я даю согласие на обработку персональных
                    данных
                </div>
            </div>
        </div>
    </section>

<? Application::footer(); ?>