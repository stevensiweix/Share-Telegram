<?php
include 'config.php';

$telegram_token = $admin_info['code'];

$telegram_message = " 通知測試 ".PHP_EOL;
$telegram_message.= " Hello Telegram ";

telegram_notify_send($telegram_token, $telegram_message);
?>
