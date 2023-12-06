<?php
session_start();
require 'db-connect.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員情報画面</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/member.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
</head>
<body>
    <div class="Header">
    <a style="left: 0;top: 0;position: absolute;" onclick="history.back()"><i class="fas fa-angle-left fa-2x"></i></a>
        SWEETSTOWN
    </div>

    <br><br>

    <h1>会員情報</h1>
    <hr noshade><br>

    <?php
    if (isset($_SESSION['member'])) {
        $member = $_SESSION['member'];
    ?>
        <div style="padding: 10px; margin-bottom: 10px; border: 1px; border-radius: 5px; background-color: #e7e7d6; margin:0 5%;">
            <br>
            名前<br> <?php echo $member['member_mei']; ?><br>
            <hr  noshade><br>
            名前(フリガナ)<br> <?php echo $member['kana_mei']; ?><br>
            <hr  noshade><br>
            メールアドレス<br> <?php echo $member['mail']; ?><br>
            <hr  noshade><br>
            パスワード<br> <?php echo '******'; ?> 
            <hr  noshade><br>
        </div><br><br>
    
        <button class="button" onclick="location.href='member-change.php'">会員情報を変更する</button>
    <?php
    } else {
        echo "ログインしていません。";
    }
    ?>
    
    <br><br><br><br><br>
    <hr>
    <footer><?php require 'menu.php';?></footer>
</body>
</html>

