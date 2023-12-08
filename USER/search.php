<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['price_range'])) {
        header('Location: search-price.php'); 
        exit();
    } elseif (isset($_POST['kategori'])) {
        header('Location: search-category.php'); 
        exit();
    } elseif (isset($_POST['shop'])) {
        header('Location: search-shop.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/search.css">
        <link rel="stylesheet" href="CSS/menu.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>検索画面</title>
    </head>
    <body>
        <div class="Header">SWEETSTOWN</div>
        <div class="search">
            <form action="searchlist.php" method="post" style="margin-top:80px;">
            <div class="keyword">
                <input type="text" name="keyword" placeholder="  🔍       キーワード検索"><br>
            </div>
                <input type="submit" name="search" value="検索"><br>
            </form>
            <form method="post">
                <button class="searchbutton" type="submit" name="price_range" value="価格検索">価格検索</button>
                <button class="searchbutton" type="submit" name="kategori" value="カテゴリ検索">カテゴリ検索</button>
                <button class="searchbutton" type="submit" name="shop" value="ショップ検索">ショップ検索</button>
            </form>
        </div>
        <div class="center">
            <img src="img/search-keyword.png"><br>
        </div>
        <footer><?php require 'menu.php';?></footer>
    </body>
</html>