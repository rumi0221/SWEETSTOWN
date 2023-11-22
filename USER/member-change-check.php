<?php
session_start();
require 'db-connect.php';

$newName = isset($_SESSION['member']['member_mei']) ? $_SESSION['member']['member_mei'] : '';
$newKanaName = isset($_SESSION['member']['kana_mei']) ? $_SESSION['member']['kana_mei'] : '';
$newEmail = isset($_SESSION['member']['mail']) ? $_SESSION['member']['mail'] : '';
$newPassword = isset($_SESSION['member']['pass']) ? $_SESSION['member']['pass'] : '';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員情報変更確認画面</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/member.css">
</head>
<body>
    <div class="Header">
        SWEETSTOWN
    </div>

    <br><br>

    <h1>会員情報変更確認</h1>
    <hr noshade><br>

    <div  style="padding: 10px; margin-bottom: 10px; border: 1px; border-radius: 15px; background-color: #e7e7d6; margin:0 5%">
    <br>
        名前<br>
        <span><?php echo htmlspecialchars($newName); ?></span><br>
        <hr  noshade><br>

        名前(フリガナ)<br>
        <span><?php echo htmlspecialchars($newKanaName); ?></span><br>
        <hr  noshade><br>

        メールアドレス<br>
        <span><?php echo htmlspecialchars($newEmail); ?></span><br>
        <hr  noshade><br>

        パスワード<br>
        <span><?php echo htmlspecialchars($newPassword); ?></span><br>
        <hr  noshade><br>
    </div><br>

    <div class="moji">
     記入情報にお間違いないですか？<br>
     よろしければ、変更ボタンを<br>
     押下してください。<br>
    </div><br>

    <button class="button" onclick="location.href='member-change-ok.php'">変更</button>

    <br><br><br><br><br>
    <hr>
    <center><footer><?php require 'menu.php';?></footer></center>
</body>
</html>
