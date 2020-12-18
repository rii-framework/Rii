<?
require "templates/header.php";

require "rii/core/application.php";
require "rii/core/router.php";
use Rii\Core\Application;
use Rii\Core\Router;

Application::isWork();

$test = new Router;
$test->run();

require "templates/footer.php";