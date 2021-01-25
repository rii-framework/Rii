<?php
include 'rii/init.php';

use Rii\Core\Application;
use Rii\Core\Page;

$app = Application::getInstance(); ?>

<? $app->header();
Page::getInstance()->setProperty('Title', "История изменений");?>


Контент

<? Application::getInstance()->footer(); ?>