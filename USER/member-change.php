<?php
session_start();
require 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['new_name'];
    $newKanaName = $_POST['new_kana_name'];
    $newEmail = $_POST['new_email'];
    $newPassword = $_POST['new_password'];

    $_SESSION['member']['member_mei'] = $newName;
    $_SESSION['member']['kana_mei'] = $newKanaName;
    $_SESSION['member']['mail'] = $newEmail;
    $_SESSION['member']['pass'] = $newPassword;

    header("Location: member-change-check.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, margin:0 5%">
    <title>会員情報変更画面</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/member.css">
</head>
<body>
    <div class="Header">
        SWEETSTOWN
    </div>

    <br><br>

    <h1>会員情報変更</h1>
    <hr  noshade><br>
    <form action="member-change.php" method="post">
    <div style="margin:0 30%;">
        <abbr>名前<span style="color:red;">　　※必須</span><br>
        <div class="div2"><input type="text" name="new_name" size="30" style="width: 350px; height: 28px;" required="required"></div></abbr><br>
        <abbr>名前(フリガナ)<span style="color:red;">　　※必須</span><br>
        <div class="div2"><input type="text" name="new_kana_name" size="30" style="width: 350px; height: 28px;" required="required"></div></abbr><br>
        <abbr>メールアドレス<span style="color:red;">　　※必須</span><br>
        <div class="div2"><input type="text" name="new_email" size="30" style="width: 350px; height: 28px;" required="required"></div></abbr><br>
        <abbr>パスワード<span style="color:red;">　　※必須</span><br>
        <div class="div2"><input type="text" name="new_password" size="30" style="width: 350px; height: 28px;" required="required"></div></abbr><br>

        <br><br>
        <button type="submit" class="button">確認画面へ</button>
    </form>

    <br><br><br><br><br>
    <hr>
    <center><footer><?php require 'menu.php';?></footer></center>
</body>
</html>
