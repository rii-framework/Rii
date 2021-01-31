<?php

$message['failed'] = '';
foreach ($result['message'] as $value) {
    $message['failed'] .= $value . ' ';
}
echo json_encode($message, JSON_HEX_QUOT | JSON_HEX_TAG);
die();