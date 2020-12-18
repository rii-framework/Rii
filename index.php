<?
// проверка работоспособности
require "rii/core/application.php";
require "rii/core/router.php";

use Rii\Core\Application;
use Rii\Core\Router;

Application::isWork();
Router::execute($_SERVER['REQUEST_URI']);