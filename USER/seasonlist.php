<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>季節のスイーツ一覧画面</title>
</head>
<body>
    <div class="Header">
        <link rel="stylesheet" href="header.css">
        SWEETSTOWN
    </div>

    <link rel="stylesheet" href="seasonlist.css">
    <br><br>
    <h1>季節のスイーツ</h1>
    <hr width="90%" noshade><br>

    <?php
        '<div class="seasonlist">'
        <a class="image"><a href="detail.php" class="information"><image src="img/sweet.png"></href></a></a>
        <section>
            <a href="detail.php" class="information">　商品名</a><br>
            <a href="detail.php" class="information">　ショップ名</a><br>
            <a href="detail.php" class="information">　￥</a>
            <br><br>
        </section></div>

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