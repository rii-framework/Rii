<?php
if ( !defined('RII_CORE_INCLUDED') ) die;?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?$app = \Rii\Core\Application::getInstance();?>
    <? \Rii\Core\Page::getInstance()->addCss($app->getTemplatePath()  . '/style/bootstrap.css'); ?>
    <title><? \Rii\Core\Page::getInstance()->showProperty('Title'); ?></title>
</head>
<body>

<hr>