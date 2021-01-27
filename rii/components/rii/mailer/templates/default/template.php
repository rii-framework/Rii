<?

use Rii\Core\Application;

Application::getInstance()->includeComponent($params['formName'], $params['formTemplate'], $params['params']);

if (isset($result['message'])) {

    Application::getInstance()->restartBuffer();

    $message = '';
    if (isset($result['message']['mailSend'])) {
        $message .= '<div class="pop-up--item pop-up--accepted active" data-block="accepted"><button class="pop-up--close js-popup-close"></button><div class="content"><h2>Заявка принята</h2><div>';
        $message .= $result['message']['mailSend'];
        $message .= '</div><button class="pop-up--button js-popup-close">Понятно</button></div></div>';
    } else {
        foreach ($result['message'] as $value) {
            $message .= '<div class="pop-up--item pop-up--error active" data-block="error"><button class="pop-up--close js-popup-close"></button><div class="content"><h2>Ошибка</h2>';
            $message .= $value . '<br>';
            $message .= '<button class="pop-up--button js-popup-close">Закрыть</button></div></div>';
        }
    }
    echo json_encode($message);
}