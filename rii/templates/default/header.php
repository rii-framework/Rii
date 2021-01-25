<?php if (!defined('RII_CORE_INCLUDED')) die; 
use Rii\Core\Page;
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <? $path = self::getInstance()->getTemplatePath();
        Page::getInstance()->addCss($path . '/libs/normalize.css');
        Page::getInstance()->addCss($path . '/libs/slick/slick.css');
        Page::getInstance()->addCss($path . '/libs/slick/slick-theme.css');
        Page::getInstance()->addCss($path . '/css/fonts.css');
        Page::getInstance()->addCss($path . '/css/main.css'); ?>
    <title><? Page::getInstance()->showProperty('Title'); ?></title>
    <? Page::getInstance()->showCss(); ?>
</head>
<body>