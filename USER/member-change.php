<?php
session_start();
require 'db-connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   

    
    $newName = $_POST['new_name'];
    $newKanaName = $_POST['new_kana_name'];
    $newEmail = $_POST['new_email'];
    $newPassword = $_POST['new_password'];


    // 更新
    $_SESSION['member']['member_mei'] = $newName;
    $_SESSION['member']['kana_mei'] = $newKanaName;
    $_SESSION['member']['mail'] = $newEmail;
    $_SESSION['member']['pass'] = $newPassword;

   
    header("Location: member-change-chack.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員情報変更画面</title>
</head>
<body>
    <div class="Header">
        <link rel="stylesheet" href="css/header.css">
        SWEETSTOWN
    </div>

    <link rel="stylesheet" href="css/member.css">
    <br><br>

    <h1>会員情報変更</h1>
    <hr width="90%" noshade><br>

    <form action="member-change.php" method="post">
       
        名前<span style="color:red;">　　※必須</span><br>
        <input type="text" name="new_name" size="30" required="required"><br>
        名前(フリガナ)<span style="color:red;">　　※必須</span><br>
        <input type="text" name="new_kana_name" size="30" required="required"><br>
        メールアドレス<span style="color:red;">　　※必須</span><br>
        <input type="text" name="new_email" size="30" required="required"><br>
        パスワード<span style="color:red;">　　※必須</span><br>
        <input type="text" name="new_password" size="30" required="required"><br>

        <button type="submit" class="button">確認画面へ</button>
    </form>

    <br><br><br><br><br>
    <div class="menu">
        <hr>
        <a href="home.php"><img src="img/home.png"></a>
        <a href="favorite-sweet.php"><img src="img/favorite.png"></a>
        <a href="search.php"><img src="img/search.png"></a>
        <a href="ranking.php"><img src="img/rank.png"></a>
        <a href="others.php"><img src="img/else.png"></a>
    </div>
</body>
</html>