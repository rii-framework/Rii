<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <? \Rii\Core\Page::getInstance()->addCss(self::getInstance()->getTemplatePath() . '/style/bootstrap.css'); ?>
    <? \Rii\Core\Page::getInstance()->addCss(self::getInstance()->getTemplatePath() . '/style/main.css'); ?>
    <? \Rii\Core\Page::getInstance()->addCss(self::getInstance()->getTemplatePath() . '/style/fonts.css'); ?>
    <title><? \Rii\Core\Page::getInstance()->showProperty('Title'); ?></title>
    <? \Rii\Core\Page::getInstance()->showHead(); ?>
</head>
<body>
<? self::getInstance()->includeComponent("rii:element.list", "header", ['data_type' => 'json', 'data_file' => '/rii/db/menu.json']); ?>










