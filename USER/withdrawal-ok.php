<?php

if (isset($_SESSION['member'])) {
    unset($_SESSION['member']);
}
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/withdrawal-ok.css">
    <title>退会完了画面</title>
</head>
<body>
    <div class="Header">
        SWEETSTOWN
    </div>
    
    <?php unset($_SESSION['member']);?>
    <div class="withdrawal-ok">
        <p>退会手続きが完了しました。</p>
        <a href= "login.php" >ログイン画面へ</a>
    </div>
</body>
</html>