<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <? $path = self::getInstance()->getTemplatePath();
        \Rii\Core\Page::getInstance()->addCss($path . '/libs/normalize.css');
        \Rii\Core\Page::getInstance()->addCss($path . '/libs/slick/slick.css');
        \Rii\Core\Page::getInstance()->addCss($path . '/libs/slick/slick-theme.css');
        \Rii\Core\Page::getInstance()->addCss($path . '/css/fonts.css');
        \Rii\Core\Page::getInstance()->addCss($path . '/css/main.css');
        /*\Rii\Core\Page::getInstance()->addJs($path . '/libs/jquery-3.3.1.min.js');
        \Rii\Core\Page::getInstance()->addJs($path . '/libs/slick/slick.min.js');
        \Rii\Core\Page::getInstance()->addJs($path . '/libs/jquery.maskedinput.js');
        \Rii\Core\Page::getInstance()->addJs($path . '/js/main.js');*/ ?>
    <title><? \Rii\Core\Page::getInstance()->showProperty('Title'); ?></title>
    <? \Rii\Core\Page::getInstance()->showHead(); ?>
</head>
<body>