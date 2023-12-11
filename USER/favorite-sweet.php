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
    <link rel="stylesheet" href="CSS/favorite-sweet.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <title>お気に入り画面(スイーツ)</title>
</head>

<body>
    <div class="Header">
        SWEETSTOWN
    </div>
<br><br>
    <div class="favorite">
        <h1>お気に入り</h1>
        <hr width="90%" noshade><br>
        <div class="content">
        <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare(
            'select * from favorite,product,shop
            where favorite.member_id=?
            and favorite.product_id=product.product_id 
            and product.shop_code=shop.shop_code
            and shop.shop_code=?');
        //var_dump($_SESSION);

        // $member_id = $_SESSION['member']['id'];
        // $shop_code = $_SESSION['shop']['code'];
        $member_id = 1;
        $shop_code = 10;

        $sql->execute([$member_id,$shop_code]);
            foreach ($sql as $row) {
                echo '<div class="item">';
                echo '<img src="img/', $row['gazou'],'" alt="商品画像" width="200" height="130" class="sweet_img">';
                echo '<div class="item_detail">';
                    echo '<p class="item_name">', $row['product_mei'],'</p>';
                    echo '<p class="shop_name">',$row['shop_mei'],'</p>';
                    echo '<p class="price">','￥',$row['tanka'],'</p>';
                echo '</div>';
            }
            echo '</div>';
        ?> 
        </div>
        </div>
        <hr> 
    <footer><?php require 'menu.php';?></footer>
</body>
</html>