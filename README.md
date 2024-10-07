## Telegram 通知程式設定
0. 寫的是最原生php的寫法。
1. 先安裝 Telegram（手機）
2. 新增聯絡人 BotFather，
 - https://t.me/botfather

3. 輸入/newbot
4. 輸入 Bot 名稱 (給外部看的)
5. 輸入 Bot 使用者名稱 (給搜尋用的)，必須為 bot 結尾 （如 xxxx_bot）
6. 成功建立後取得 < YOUR_BOT_TOKEN >

```
//YOUR_BOT_NAME (@xxxx_bot) 輸入時不需要@
$telegramnotify_api['main1'] = 'xxxx_bot';

//YOUR_BOT_TOKEN
$telegramnotify_api['main2'] = '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11';
```


7. 綁定回拋網址
- 也就是輸入時要回拋回來的頁面
```
https://api.telegram.org/bot< YOUR_BOT_TOKEN >/setWebhook?url=<要將資料回拋的網址>
```

8. config.php 注意相關資訊。
