<?php
include 'rii/init.php';

use Rii\Core\Application;
use Rii\Core\Page;

$app = Application::getInstance();
Application::header();
Page::getInstance()->setProperty('Title', "ELCAR24");?>

<?php $app->includeComponent("rii:element.list", "services", ['data_file' => '/rii/db/services.json']); ?>

<?php $app->includeComponent("rii:element.list", "advantages", ['data_file' => '/rii/db/advantages.json']); ?>

<section class="s-section section-gradient">
    <div class="container">
        <div class="block--form block-mini">
            <h2>получить бесплатную консультацию</h2>
            
            <div class="description">*Нажимая на кнопку «Отправить заявку», я даю согласие на обработку персональных данных</div>
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
            <h2>остались вопросы?</h2>
            
            <div class="description">*Нажимая на кнопку «Отправить заявку», я даю согласие на обработку персональных данных</div>
        </div>
    </div>
</section>

<? Application::footer(); ?>