<?php
include 'rii/init.php';

use Rii\Core\Page;

$path = self::getInstance()->getTemplatePath();

Page::getInstance()->addJs($path . '/libs/jquery-3.3.1.min.js');
Page::getInstance()->addJs($path . '/libs/slick/slick.min.js');
Page::getInstance()->addJs($path . '/libs/jquery.maskedinput.js');
Page::getInstance()->addJs($path . '/js/main.js');
?>

<? Page::getInstance()->showJs(); ?>
</body>
 </html>