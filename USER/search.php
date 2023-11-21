<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['kakaku'])) {
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
        <title>検索画面</title>
    </head>
    <body>
        <div class="Header">SWEETSTOWN</div>
        <div class="search">
            <form action="searchlist.php" method="post">
                <input type="text" name="keyword" placeholder="キーワード検索"><br>
                <input type="submit" name="search" value="検索"><br>
            </form>
            <form method="post">
                <button class="searchbutton" type="submit" name="kakaku" value="価格検索">価格検索</button>
                <button class="searchbutton" type="submit" name="kategori" value="カテゴリ検索">カテゴリ検索</button>
                <button class="searchbutton" type="submit" name="shop" value="ショップ検索">ショップ検索</button>
            </form>
        </div>
        <img src="img/search-keyword.png"><br>
        <footer><?php require 'menu.php';?></footer>
    </body>
</html>