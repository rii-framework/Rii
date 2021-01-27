<?

use Rii\Core\Application;

Application::getInstance()->includeComponent($params['formName'], $params['formTemplate'], $params['params']);

if (isset($result['message'])) {
    $message = '';
    foreach ($result['message'] as $item) {
        echo $message .= $item . '<br>';
    }
    echo json_encode($message);
}