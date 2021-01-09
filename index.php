<?php
include 'rii/init.php';

use Rii\Core\Application;
use Rii\Core\Page;

$app = Application::getInstance();
$app->header();
Page::getInstance()->setProperty('Title', "История изменений");
?>

<h3>История изменений проекта:</h3>
<?php
$app->includeComponent("rii:element.list", "default", ['sort' => ['date' => 'desc'], 'limit' => 10, 'data_type' => 'json', 'data_file' => '/upload/history.json', 'time' => date('d.m.Y H:i:s')]);
?>

<?
Application::getInstance()->footer();
?>
