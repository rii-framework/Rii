<?php
include 'rii/init.php';

use Rii\Core\Application;
use Rii\Core\Page;

$app = Application::getInstance();
Application::header();
Page::getInstance()->setProperty('Title', "ELCAR24"); ?>
    <section class="s-section section-white" data-section="services-section">
        <div class="container">
            <h2>Основные услуги</h2>
            <div class="servicesList">
                <?php $app->includeComponent("rii:element.list", "services", ['sort' => ['date' => 'desc'], 'limit' => 5, 'data_type' => 'json', 'data_file' => '/rii/db/services.json']); ?>
            </div>
            <a href="#" class="button-standart volume js-click-popup" data-click="call-back">посмотреть все услуги</a>
        </div>
    </section>

    <section class="s-section section-black" data-section="advantages-section">
        <div class="container">
            <h2>Преимущества</h2>
        </div>
        <div class="slider--wrapp">
            <div class="js-slider slider--block">
                <?php $app->includeComponent("rii:element.list", "advantages", ['sort' => ['date' => 'desc'], 'limit' => 5, 'data_type' => 'json', 'data_file' => '/rii/db/advantages.json']); ?>
            </div>
        </div>
    </section>

    <section class="s-section section-gradient">
        <div class="container">
            <div class="block--form block-mini">
                <h2>получить бесплатную консультацию</h2>
                <? $app->includeComponent("rii:interfaceform", "default", [
                    'additional_class' => 'form--wrapp', //классы на контейнер формы
                    'attr' => [  //доп атрибуты
                        'id' => 'bottom-form',
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
                                'id' => 'customerNumber',
                            ],
                            'default' => 'Ваш номер',
                        ], [
                            'type' => 'submit',
                            'attr' => [
                                'id' => 'submit'
                            ],
                            'value' => 'Заказать звонок'
                        ], [
                            'type' => '',
                        ]
                    ]
                ]); ?>
                <div class="description">*Нажимая на кнопку «Отправить заявку», я даю согласие на обработку персональных
                    данных
                </div>
            </div>
        </div>
    </section>

    <section class="s-section section-white" data-section="price-section">
        <div class="container">
            <h2>СТОИМОСТЬ УСЛУГ</h2>
            <div class="price--wrapp js-price-block">
                <?php $app->includeComponent("rii:element.list", "service_cost", ['sort' => ['date' => 'desc'], 'limit' => 5, 'data_type' => 'json', 'data_file' => '/rii/db/service_cost.json']); ?>
            </div>
            <a href="#" class="button-standart volume js-click-more button-more">посмотреть еще</a>
            <a href="#" class="button-standart volume js-click-popup button-hidden" data-click="call-back">Заказать
                звонок</a>
        </div>
    </section>

    <section class="s-section section-black">
        <div class="container">
            <h2>Что необходимо знать</h2>
            <div class="need--list">
                <div class="need--item">
                    <div class="number">01</div>
                    <div class="content">По прибытию на место автоэлектрик проведет полноценную диагностику вашего
                        автомобиля, с целью выявления причины неисправности.
                    </div>
                </div>
                <div class="need--item">
                    <div class="number">02</div>
                    <div class="content">Использование современного оборудования, позволит минимизировать время
                        проведения полноценного исследования работы всех электрических компонентов авто.
                    </div>
                </div>
                <div class="need--item">
                    <div class="number">03</div>
                    <div class="content">Будет проведена проверка исправности работы генератора, основных агрегатов,
                        аккумулятора, кондиционера, целостность электрических цепей и датчиков.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="s-section section-white section-reviews" data-section="reviews-section">
        <div class="container">
            <h2>Отзывы</h2>
            <div class="reviews--wrapp">
                <div class="js-slider-reviews reviews--slider">
                    <?php $app->includeComponent("rii:element.list", "reviews", ['sort' => ['date' => 'desc'], 'limit' => 5, 'data_type' => 'json', 'data_file' => '/rii/db/reviews.json']); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="s-section section-grey section--auto" data-section="auto-section">
        <div class="container">
            <h2>автомобили</h2>
            <div class="auto--description">Наши мастера – автотехники, оборудованы нужным инструментом и дилерским
                оборудованием для всех марок автомобилей
            </div>
            <div class="auto--wrap">
                <div class="js-slider-auto auto--slider">
                    <?php $app->includeComponent("rii:element.list", "brands", ['sort' => ['date' => 'desc'], 'limit' => 5, 'data_type' => 'json', 'data_file' => '/rii/db/brands.json']); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="s-section section-orange">
        <div class="container">
            <div class="block--form">
                <h2>остались вопросы?</h2>
                <? $app->includeComponent("rii:interfaceform", "default", [
                    'additional_class' => 'form--wrapp', //классы на контейнер формы
                    'attr' => [  //доп атрибуты
                        'id' => 'bottom-form',
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
                                'id' => 'customerNumber',
                            ],
                            'default' => 'Ваш номер',
                        ], [
                            'type' => 'submit',
                            'attr' => [
                                'id' => 'submit'
                            ],
                            'value' => 'Заказать звонок'
                        ], [
                            'type' => '',
                        ]
                    ]
                ]); ?>
                <div class="description">*Нажимая на кнопку «Отправить заявку», я даю согласие на обработку персональных
                    данных
                </div>
            </div>
        </div>
    </section>
    <div class="pop-up--list">
        <div class="modal"></div>
        <div class="pop-up--item" data-block="call-back">
            <button class="pop-up--close js-popup-close"></button>
            <div class="content">
                <h2>ЗАКАЗАТЬ ЗВОНОК</h2>
                <form action="">
                    <div class="block--input">
                        <label for="name">Ваше имя</label>
                        <input type="text" id="name">
                    </div>
                    <div class="block--input">
                        <label for="phone">Ваш номер телефона</label>
                        <input type="text" id="phone" class="js-phone-mask">
                    </div>
                    <input type="submit" class="pop-up--button" value="посмотреть вСЕ УСлуги">
                </form>
            </div>
        </div>
        <div class="pop-up--item pop-up--accepted" data-block="accepted">
            <button class="pop-up--close js-popup-close"></button>
            <div class="content">
                <h2>ЗАЯВКА ПРИНЯТА</h2>
                <div class="text--message">В ближайшее время наш менеджер перезвонит вам и ответит на все ваши вопросы
                </div>
                <button class="pop-up--button js-popup-close">понятно</button>
            </div>
        </div>
    </div>

<? Application::footer(); ?>