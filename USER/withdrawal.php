<?php
session_start();

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
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/withdrawal.css">
    <title>退会画面</title>
</head>
<body>
    <div class="Header">
        SWEETSTOWN
    </div>
    <div class="withdrawal">
        <h2>●退会手続き</h2>
        <p class="withp">「退会する」ボタンを押すと<br>
            退会が完了いたします。<br>
            本当に退会してもよろしいですか？</p>
        
        <form action="withdrawal-ok.php" method="post">
            <div class="withbutton">
                <input type="submit" name="cancel" value="キャンセル" style="width:80px;height:40px">
                <input type="submit" name="withdraw" value="退会する" style="width:80px;height:40px" class="with">
            </div>
        </form>
    </div>
</body>
</html>
