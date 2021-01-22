<?php
include 'rii/init.php';

use Rii\Core\Application;
use Rii\Core\Page;

$app = Application::getInstance();
$path = $app::getInstance()->getTemplatePath();
$app->header();
Page::getInstance()->setProperty('Title', "История изменений");
?>

<section class="s-section section-white" data-section="services-section">
    <div class="container">
        <h2>Основные услуги</h2>
        <div class="servicesList">
            <?php $app->includeComponent("rii:element.list", "services", ['sort' => ['date' => 'desc'], 'limit' => 5, 'data_type' => 'json', 'path_temp' => $path, 'data_file' => '/rii/db/services.json']); ?>
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
            <?php $app->includeComponent("rii:element.list", "advantages", ['sort' => ['date' => 'desc'], 'limit' => 5, 'data_type' => 'json', 'path_temp' => $path, 'data_file' => '/rii/db/advantages.json']); ?>
        </div>
    </div>
</section>

<section class="s-section section-white" data-section="price-section">
    <div class="container">
        <h2>СТОИМОСТЬ УСЛУГ</h2>
        <div class="price--wrapp js-price-block">
            <?php $app->includeComponent("rii:element.list", "service_cost", ['sort' => ['date' => 'desc'], 'limit' => 5, 'data_type' => 'json', 'path_temp' => $path, 'data_file' => '/rii/db/service_cost.json']); ?>
        </div>
        <a href="#" class="button-standart volume js-click-more button-more">посмотреть еще</a>
        <a href="#" class="button-standart volume js-click-popup button-hidden" data-click="call-back">Заказать звонок</a>
    </div>
</section>

<? Application::getInstance()->footer(); ?>