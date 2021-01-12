<?php
if ( !defined('RII_CORE_INCLUDED') ) die;?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <? \Rii\Core\Page::getInstance()->addCss('../../core/css/bootstrap-5.0.0-beta1-dist/css/bootstrap.css'); ?>
    <link href="../../core/bootstrap/css/bootstrap.css" rel="stylesheet">
    <title><? \Rii\Core\Page::getInstance()->showProperty('Title'); ?></title>
</head>
<body>
    <div class="p-2 mb-2 bg-header text-center text-white"> <h2>Дневник проекта</h2> </div>
</body>
<hr>