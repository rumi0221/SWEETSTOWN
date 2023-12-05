<?php
session_start();
require 'db-connect.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <title>検索画面</title>
</head>
<body>
    <div class="Header">
        SWEETSTOWN
    </div>
    <br>
    <br>
    <div class="search">
        <form action="searchlist.php" method="post">
            <button class="searchbutton" name="price_range" value="100-500">￥100 ～ 500</button>
            <button class="searchbutton" name="price_range" value="500-1000">￥500 ～ 1000</button>
            <button class="searchbutton" name="price_range" value="1000-1500">￥1000 ～ 1500</button>
            <button class="searchbutton" name="price_range" value="1500-2000">￥1500 ～ 2000</button>
            <button class="searchbutton" name="price_range" value="2000-2500">￥2000 ～ 2500</button>
            <button class="searchbutton" name="price_range" value="2500-3000">￥2500 ～ 3000</button>
        </form>
    </div>
    <footer><?php require 'menu.php';?></footer>
</body>
</html>
