<?php
if ( !defined('RII_CORE_INCLUDED') ) die;?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <? \Rii\Core\Page::getInstance()->addCss($app->getTemplatePath(true) . '/style/bootstrap.css'); ?>
    <title><? \Rii\Core\Page::getInstance()->showProperty('Title'); ?></title>
</head>
<body>
    <div class="bd-footer p-md-3 mt-5 bg-footer"> <h4>Фреймворк Rii</h4></div>
</body>