<?php
include 'config.php';
/**
 * Telegram 資料回拋
 */

$update = file_get_contents("php://input");
$updateArray = json_decode($update, TRUE);

//------------------------------------------------------------ 資料抓取綁定

if (isset($updateArray['message']['text'])) :

    $telegram_token = $updateArray['message']['chat']['id'];
    $messageText    = $updateArray['message']['text'];

    $params = explode(" ", $messageText);
    $telegram_token = $params[1]; // chatId

    if (!empty($telegram_token)):

        if (strpos($messageText, '/start') === 0):

            // $telegram_token 存入資料庫

            // !這裡發通知，裡面我會夾帶 後台網址連結，將回到原本的後台頁面。
            telegram_notify_send($telegram_token, "系統回覆：Telegram 綁定成功。");

        endif;

    else:

        // !這裡發通知，裡面我會夾帶 後台網址連結，將回到原本的後台頁面。
        telegram_notify_send($telegram_token, "系統回覆：錯誤，請與相關人員聯絡。");

    endif;

endif;
