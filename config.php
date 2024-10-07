<?php

/**
 * ---------------------- 基本設定
 */

//YOUR_BOT_NAME (@xxxx_bot) 輸入時不需要@
$telegramnotify_api['main1'] = 'xxxx_bot';

//YOUR_BOT_TOKEN
$telegramnotify_api['main2'] = '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11';

//使用者主鍵或Code
$admin_info['code'] = '123456';

/**
 * ---------------------- 要綁定的網址
 *
 * TODO: 將以下的網址貼到網址列，即可綁定。
 *
 *  * 以下是設定要綁定的網址
 *  ! https://api.telegram.org/bot<YOUR_BOT_TOKEN>/setWebhook?url=<要將資料回拋的網址>
 *
 *  * 以下是觀看有沒有綁定成功
 *  ! https://api.telegram.org/bot<YOUR_BOT_TOKEN>/getWebhookInfo
 *
 *  ? 注意<要將資料回拋的網址>不要設到轉址或者導向（rwrite）。
 */


/**
 * ---------------------- 寄出 telegram Notify funtion
 */
function telegram_notify_send($telegram_token, $telegram_message){

    global $telegramnotify_api;

    $url = 'https://api.telegram.org/bot'.$telegramnotify_api['main2'].'/sendMessage';

    $postFields = array(
        'chat_id' => $telegram_token,
        'text'    => $telegram_message
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

}

?>
