<?

use Rii\Core\Application;

Application::getInstance()->includeComponent($params['formName'], $params['formTemplate'], $params['params']);

if (isset($result['message'])) {
    $message = '';
    foreach ($result['message'] as $value) {
        $message .= $value . '<br>';
    }
    var_dump($message);
}