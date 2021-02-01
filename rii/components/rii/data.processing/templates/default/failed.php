<?php

$message['failed'] = '<div>';
foreach ($result['message'] as $value) {
    $message['failed'] .= $value . "<br>";
}
$message['failed'] .= '</div>';
echo json_encode($message, JSON_UNESCAPED_UNICODE);
die();