
# Telegram 通知程式設定

此文件為使用最原生 PHP 寫法來建立和設定 Telegram Bot 通知功能的完整指南。

## 步驟 0: 安裝 Telegram App

1. 在手機上下載並安裝 [Telegram](https://telegram.org/)。

## 步驟 1: 建立 Telegram Bot

1. 打開 Telegram，搜尋並新增聯絡人 **[BotFather](https://t.me/botfather)**。
2. 在對話中輸入 `/newbot` 開始建立 Bot。
3. 輸入你想要的 **Bot 名稱**（這是外部用戶看到的名稱）。
4. 接著輸入 **Bot 使用者名稱**（必須以 `bot` 作為結尾，例如 `xxxx_bot`）。
5. 成功建立後，BotFather 會提供一組 **Bot Token**（格式類似於 `123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11`），這是後續整合所需的重要憑證。

## 步驟 2: 儲存 Bot 資訊

將 Bot 的名稱和 Token 儲存在 PHP 設定變數中，方便後續使用。

```php
// Bot 設定
$telegramnotify_api['bot_name'] = 'xxxx_bot'; // YOUR_BOT_NAME，不需要 '@'
$telegramnotify_api['bot_token'] = '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11'; // YOUR_BOT_TOKEN
```

## 步驟 3: 設定 Webhook

Telegram Bot 必須綁定 Webhook，才能接收用戶的訊息。Webhook 的設定步驟如下：

1. 使用以下格式的網址來設定 Webhook：
   ```
   https://api.telegram.org/bot<YOUR_BOT_TOKEN>/setWebhook?url=<YOUR_WEBHOOK_URL>
   ```
   - `<YOUR_BOT_TOKEN>` 替換為你的 Bot Token。
   - `<YOUR_WEBHOOK_URL>` 替換為你的伺服器回拋網址。

2. 範例：
   ```
   https://api.telegram.org/bot123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11/setWebhook?url=https://yourdomain.com/telegram-webhook
   ```

## 步驟 4: 設定通知綁定按鈕

在系統中新增綁定通知的按鈕，讓用戶點擊後能立即綁定到你的 Telegram Bot。

```php
// 將使用者的主鍵或 Code 綁定到 Telegram Bot
<a href="https://t.me/<?php echo $telegramnotify_api['bot_name'] ?>/?start=<?php echo $admin_info['code']; ?>" target="_blank" class="btn btn-success btn-xs">
    Telegram Notify 通知綁定
</a>
```

- 其中 `<?php echo $admin_info['code']; ?>` 是用來綁定用戶唯一識別碼（如主鍵或唯一碼），這樣可以在用戶點擊後立即回拋回到伺服器。

## 注意事項

1. **Webhook URL**：必須是可以從外部網路訪問的 HTTPS 網址。
2. **Bot Token**：請妥善保管，勿公開，以免被他人濫用。
