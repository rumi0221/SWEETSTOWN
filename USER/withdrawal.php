<?php
session_start();
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/withdrawal.css">
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
    <style>
       
       .withbutton {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
    <title>退会画面</title>
</head>
<body>
    <div class="Header">
    <a style="left: 0;top: 0;position: absolute;" onclick="history.back()"><i class="fas fa-angle-left fa-2x"></i></a>
        SWEETSTOWN
    </div>
    <br>
    <br>
    <div class="withdrawal">
        <h2>●退会手続き</h2>
        <p class="withp">「退会する」ボタンを押すと<br>
            退会が完了いたします。<br>
            本当に退会してもよろしいですか？</p>
        
        
            <div class="withbutton">
                <form action="others.php" method="post">
                <input type="submit" name="cancel" value="キャンセル" style="width:80px;height:40px">
                </form>
                <form action="withdrawal-ok.php" method="post">
                <input type="submit" name="withdraw" value="退会する" style="width:80px;height:40px" class="with">
                </form>
            </div>
    </div>
</body>
</html>
