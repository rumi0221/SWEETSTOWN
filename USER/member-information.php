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
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/member.css">
</head>
<body>
    <div class="Header">
        SWEETSTOWN
    </div>

    <br><br>

    <h1>会員情報</h1>
    <hr width="90%" noshade><br>

    <?php
    
    if (isset($_SESSION['member'])) {
        $member = $_SESSION['member'];
    ?>
        <div style="padding: 10px; margin-bottom: 10px; border: 1px; border-radius: 5px; background-color: #e7e7d6;">
            <br>
            名前: <?php echo $member['member_mei']; ?><br><br>
            <hr width="90%" noshade><br>
            名前(フリガナ): <?php echo $member['kana_mei']; ?><br><br>
            <hr width="90%" noshade><br>
            メールアドレス: <?php echo $member['mail']; ?><br><br>
            <hr width="90%" noshade><br>
            パスワード: <?php echo $member['pass']; ?> 
            <hr width="90%" noshade><br>
    
        </div><br><br>
    
        <button class="button" onclick="location.href='member-change.html'">会員情報を変更する</button>
        <?php
    } else {
        
        echo "ログインしていません。";
    }
    ?>
    
    

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
