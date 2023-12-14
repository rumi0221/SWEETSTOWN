<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['button1'])) {
        header('Location: purchase-history.php'); 
        exit();
    } elseif (isset($_POST['button2'])) {
        header('Location: member-information.php'); 
        exit();
    } elseif (isset($_POST['button3'])) {
        header('Location: withdrawal.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/others.css">
        <link rel="stylesheet" href="CSS/menu.css">
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>その他画面</title>
    </head>
    <body>
        <div class="Header">SWEETSTOWN</div>
        <br>
        <br>
        <div class="others">
            <form method="post">
                <button class="etc" type="submit" name="button1" value="購入履歴">購入履歴</button>
                <button class="etc" type="submit" name="button2" value="会員情報確認・変更">会員情報確認・変更</button>
                <button class="etc" type="submit" name="button3" value="退会">ログアウト</button>
            </form>
        </div>
        <footer><?php require 'menu.php';?></footer>
    </body>
</html>