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
    <title>会員情報変更完了</title>
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
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('update member set member_mei = ?,kana_mei = ?,mail = ?,pass = ? where member_id = ?');
        $sql->execute([$newName,$newKanaName,$newEmail,$newPassword,$_SESSION['member']['member_id']]);
    ?>
    <br><br><br><br><br>

    <p>会員情報が変更されました</p><br><br><br>

    <div class="home">
        <a href="home.php">ホームへ戻る</a>
    </div>
    <br><br><br><br><br><br>
    <hr> 
    <footer><?php require 'menu.php';?></footer>
</body>
</html>
