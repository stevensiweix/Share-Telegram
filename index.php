<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram</title>
</head>
<body>
    <p class="form-control-static">
        <a href="https://t.me/<?php echo $telegramnotify_api['main1'] ?>/?start=<?php echo $admin_info['code'];?>" target="_blank" class="btn btn-success btn-xs">Telegram Notify 通知綁定</a>
    </p>
</body>
</html>
