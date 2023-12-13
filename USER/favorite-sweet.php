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
    
        <h1>お気に入り</h1>
        <hr width="90%" noshade>
        <br><br>
        
        <table>
        <?php
            $pdo=new PDO($connect,USER,PASS);
            $sql=$pdo->prepare(
                'select * from favorite,product,shop
                where favorite.member_id=?
                and favorite.product_id=product.product_id 
                and product.shop_code=shop.shop_code');
            $member_id = $_SESSION['member']['member_id'];
            $sql->execute([$member_id]);
            foreach ($sql as $row) {
                echo '<tr>';
                echo '<td class="td1">';
                echo '<a href="detail.php?product_id=',$row['product_id'],'">';
                echo '<img class="img" src="img/', $row['gazou'],'" alt="商品画像""></a>';
                echo '</td>';
                echo '<td class="td2>';
                echo '<a href="detail.php" class="information">', $row['product_mei'],'</a><br>';
                echo '<a href="datail.php" class="information">',$row['shop_mei'],'</a><br>';
                echo '<p href="datail.php" class="information"><font color="red">','￥',$row['tanka'],'</font></a>';
                echo '</td></tr>';
            }
        ?>
        </table>
    
        <br><br><br><br><bt>
        
    <footer><?php require 'menu.php';?></footer>
</body>
</html>