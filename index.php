<?php
include 'rii/init.php';

use Rii\Core\Application;
use Rii\Core\Page;
use Rii\Core\Validator;


Application::getInstance()->header();
Page::getInstance()->setProperty('Title', "ELCAR24"); ?>

<?php Application::getInstance()->includeComponent("rii:element.list", "services", ['data_file' => '/rii/db/services.json']); ?>

<?php Application::getInstance()->includeComponent("rii:element.list", "advantages", ['data_file' => '/rii/db/advantages.json']); ?>

    <section class="s-section section-gradient">
        <div class="container">
            <div class="block--form block-mini">
                <h2>Получить бесплатную консультацию</h2>

                <?php Application::getInstance()->includeComponent("rii:data.processing", "default", ['formName' => "rii:interfaceform", 'formTemplate' => "default", 'params' => [
                    'additional_class' => 'form--wrapp', //классы на контейнер формы
                    'attr' => [  //доп атрибуты
                        'id' => 'section-gradient-form',
                    ],
                    'elements' => [
                        [
                            'type' => 'text',
                            'name' => 'name',
                            'attr' => [ //доп атрибуты
                                'id' => 'customerName',
                            ],
                            'default' => 'Ваше имя',
                        ], [
                            'type' => 'text',
                            'name' => 'phone',
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
                            'value' => '',
                        ]
                    ]
                ], 'validationRules' => [
                    'name' => new Validator('chain', [
                        new Validator('minLength', 2),
                        new Validator('maxLength', 20),
                        new Validator('regexp', '/^[a-zA-Z\p{Cyrillic}\d\s\-]+$/u')
                    ]),
                    'phone' => new Validator('chain', [
                        new Validator('phone')
                    ]),
                    'password' => new Validator('chain', [
                        new Validator('minLength', 6),
                        new Validator('regexp', "/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/")
                    ]),
                    'login' => new Validator('chain', [
                        new Validator('minLength', 4),
                        new Validator('maxLength', 20),
                        new Validator('regexp', '/^[A-Za-z0-9]{0,}$/')
                    ]),
                    'lastName' => new Validator('chain', [
                        new Validator('minLength', 2),
                        new Validator('maxLength', 30),
                        new Validator('regexp', '/^[a-zA-Z\p{Cyrillic}\d\s\-]+$/u')
                    ]),
                    'email' => new Validator('chain', [
                        new Validator('email')
                    ]),
                ], 'sendFields' => ['name', 'phone']]); ?>

                <div class="description">*Нажимая на кнопку «Заказать звонок», я даю согласие на обработку персональных
                    данных
                </div>
            </div>
        </div>
    </section>

<?php Application::getInstance()->includeComponent("rii:element.list", "service_cost", ['data_file' => '/rii/db/service_cost.json']); ?>

<?php Application::getInstance()->includeComponent("rii:element.list", "know", ['data_file' => '/rii/db/know.json']); ?>

<?php Application::getInstance()->includeComponent("rii:element.list", "reviews", ['data_file' => '/rii/db/reviews.json']); ?>

<?php Application::getInstance()->includeComponent("rii:element.list", "brands", ['data_file' => '/rii/db/brands.json']); ?>

    <section class="s-section section-orange">
        <div class="container">
            <div class="block--form">
                <h2>Остались вопросы?</h2>

                <?php Application::getInstance()->includeComponent("rii:data.processing", "default", ['formName' => "rii:interfaceform", 'formTemplate' => "default", 'params' => [
                    'additional_class' => 'form--wrapp',
                    'attr' => [
                        'id' => 'section-orange-form',
                    ],
                    'elements' => [
                        [
                            'type' => 'text',
                            'name' => 'name',
                            'attr' => [
                                'id' => 'customerName',
                            ],
                            'default' => 'Ваше имя',
                        ], [
                            'type' => 'text',
                            'name' => 'phone',
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
                ], 'validationRules' => [
                    'name' => new Validator('chain', [
                        new Validator('minLength', 2),
                        new Validator('maxLength', 20),
                        new Validator('regexp', '/^[a-zA-Z\p{Cyrillic}\d\s\-]+$/u')
                    ]),
                    'phone' => new Validator('chain', [
                        new Validator('phone')
                    ]),
                    'password' => new Validator('chain', [
                        new Validator('minLength', 6),
                        new Validator('regexp', "/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/")
                    ]),
                    'login' => new Validator('chain', [
                        new Validator('minLength', 4),
                        new Validator('maxLength', 20),
                        new Validator('regexp', '/^[A-Za-z0-9]{0,}$/')
                    ]),
                    'lastName' => new Validator('chain', [
                        new Validator('minLength', 2),
                        new Validator('maxLength', 30),
                        new Validator('regexp', '/^[a-zA-Z\p{Cyrillic}\d\s\-]+$/u')
                    ]),
                    'email' => new Validator('chain', [
                        new Validator('email')
                    ]),
                ], 'sendFields' => ['name', 'phone']]); ?>

                <div class="description">*Нажимая на кнопку «Заказать звонок», я даю согласие на обработку персональных
                    данных
                </div>
            </div>
        </div>
    </section>

<? Application::getInstance()->footer(); ?>