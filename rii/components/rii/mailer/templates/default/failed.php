<?php

$message['failed'] = '';
foreach ($result['message'] as $value) {
    $message['failed'] .= $value . ' ';
}
echo json_encode($message);
die();