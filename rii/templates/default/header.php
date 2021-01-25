<?php if (!defined('RII_CORE_INCLUDED')) die;

use Rii\Core\Page; ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <? \Rii\Core\Page::getInstance()->addCss(self::getInstance()->getTemplatePath() . '/libs/normalize.css'); ?>
    <? \Rii\Core\Page::getInstance()->addCss(self::getInstance()->getTemplatePath() . '/libs/slick/slick.css'); ?>
    <? \Rii\Core\Page::getInstance()->addCss(self::getInstance()->getTemplatePath() . '/libs/slick/slick-theme.css'); ?>
    <? \Rii\Core\Page::getInstance()->addCss(self::getInstance()->getTemplatePath() . '/style/main.css'); ?>
    <? \Rii\Core\Page::getInstance()->addCss(self::getInstance()->getTemplatePath() . '/style/fonts.css'); ?>
    <? Rii\Core\Page::getInstance()->addJs(self::getInstance()->getTemplatePath() . '/libs/jquery-3.3.1.min.js'); ?>

    <title><? \Rii\Core\Page::getInstance()->showProperty('Title'); ?></title>
    <? \Rii\Core\Page::getInstance()->showCss(); ?>
</head>
<body>
<div class="main-page-wrapper">
    <?php self::getInstance()->includeComponent("rii:element.list", "menu-right", ['data_type' => 'json', 'data_file' => '/rii/db/menu-right.json']); ?>
    <section class="s-section section-black section--index" data-section="index-section">
        <header class="header">
            <div class="container">
                <div class="header--wrap">
                    <a href="#" class="logo--link"><img src="<?= '/img/ELCAR24.png' ?>" alt="" class="logo"></a>
                    <div class="header--wrap-info js-mobile-block">
                        <button class="close js-close-menu"></button>
                        <?php self::getInstance()->includeComponent("rii:element.list", "menu-top", ['data_type' => 'json', 'data_file' => '/rii/db/menu-top.json']); ?>
                        <div class="header--infoWrap">
                            <div class="phone--info">
                                <a href="tel:+<?= \Rii\Core\Config::get("PHONE/NUMBER"); ?>"
                                   class="phone"><?= vsprintf("+%s%s%s (%s%s) <span>%s%s%s %s%s %s%s</span>", str_split(\Rii\Core\Config::get("PHONE/NUMBER"))); ?></a>
                                <div class="time">Ежедневно, с 8.00 до 21.00</div>
                            </div>
                            <button class="button-standart js-click-popup" data-click="call-back">Заказать звонок
                            </button>
                        </div>
                    </div>
                    <button class="header--mobileButton js-click-mobile">
                        <span class="line"></span>
                    </button>
                </div>
            </div>
        </header>
        <div class="section--indexContent">
            <div class="container">
                <h1>Автоэлектрик с выездом к клиенту</h1>
                <span class="region">по Минску и Минской области</span>
                <a href="#" class="button-standart volume js-click-section" data-click="price-section">УЗНАТЬ Цены НА
                    УСЛУГИ</a>
            </div>
        </div>
        <div class="section--indexFooter">
            <div class="container">
                <div class="advantages">
                    <div class="advantages--item">
                        <div class="advantages--icon icon-price"></div>
                        <div class="advantages--text">Доступная цена на любую услугу</div>
                    </div>
                    <div class="advantages--item">
                        <div class="advantages--icon icon-help"></div>
                        <div class="advantages--text">Помощь в максимально короткие сроки</div>
                    </div>
                    <div class="advantages--item">
                        <div class="advantages--icon icon-quality"></div>
                        <div class="advantages--text">Высокое качество предоставления услуг</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>