<?

// проверка работоспособности


require "rii/core/application.php";
use Rii\Core\Application;

$s1 = Application::getInstance();

// тут погут происходить изменения с переменной

$s2 = Application::getInstance();

function test($s1, $s2)
{
    if ($s1 === $s2) {
        echo "Singleton works!";
    } else {
        echo "Singleton failed!";
    }
}

test($s1, $s2);