<?

use Rii\Core\Application;

Application::getInstance()->includeComponent($params['formName'], $params['formTemplate'], $params['params']);