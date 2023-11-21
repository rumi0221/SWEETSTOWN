<?php session_start();?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文情報確認画面</title>
</head>
<body>
    <div class="Header">
        <link rel="stylesheet" href="css/header.css">
        SWEETSTOWN
    </div>
        <link rel="stylesheet" href="css/cart.css">
        <br><br>
    <h1>注文確認</h1>
    <hr width="90%" noshade><br>
    <a class="image"><href src="#">商品画像</href></a>

        <section>
            <p class="description"></p>
                商品名<br>
                ショップ名<br>
                ￥
            <br><br>
        </section>

        <div>
            <br>
            <h4>×1　　</h4>
        </div>

        <div style="padding: 10px; margin-bottom: 10px; width: 60%; background-color: #e7e7d6; margin: 0 0 0 auto;">
            <span>商品合計　￥</span>
        </div>
        <br>
        <button class="button2" onclick="location.href='order-ok.html'">購入する</button>
        <br>
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