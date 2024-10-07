<?php
include 'config.php';
/**
 * Telegram 資料回拋
 */

$update = file_get_contents("php://input");
$updateArray = json_decode($update, TRUE);

//------------------------------------------------------------ 資料抓取綁定

if (isset($updateArray['message']['text'])) :

    $telegram_token = $updateArray['message']['chat']['id']; // chatId
    $messageText    = $updateArray['message']['text'];

    $params = explode(" ", $messageText);
    $code = $params[1]; //等於 $admin_info['code'] 可以更新至那位使用者

    if (!empty($telegram_token)):

        if (strpos($messageText, '/start') === 0):

            // $telegram_token 存入資料庫 更新 $admin_info['code'] 這個使用者

            // !這裡發通知，裡面我會夾帶 後台網址連結，將回到原本的後台頁面。
            telegram_notify_send($telegram_token, "系統回覆：Telegram 綁定成功。");

        endif;

    else:

        // !這裡發通知，裡面我會夾帶 後台網址連結，將回到原本的後台頁面。
        telegram_notify_send($telegram_token, "系統回覆：錯誤，請與相關人員聯絡。");

    endif;

endif;
