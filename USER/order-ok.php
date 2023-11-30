<?php session_start();?>
<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文情報確定画面</title>
</head>
<body>
    <div class="Header">
        <link rel="stylesheet" href="CSS/header.css">
        SWEETSTOWN
    </div>
        <link rel="stylesheet" href="CSS/cart.css">
        <br><br><br><br>
        <?php
            echo '<br>';
            $pdo=new PDO($connect,USER,PASS);
            $sql=$pdo->query('select * from product');
            echo '<form action="customer-infomation.php" method="POST">';
            foreach ($sql as $row) {
                echo '<div class="item">';
                echo '<a href="detail.php">', $row['gazou'], '</a>', '<br>';
                echo '<section>';
                echo '<p class="description"></p>';
                echo '　', $row['product_mei'], '<br>';
                $sql2= $pdo->query('select * from shop where shop_code = '. $row['shop_code']);
                $row2 = $sql2-> fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                echo '　', $row2['shop_mei'], '<br>';
                echo '<font color="red">', '　', '￥', $row['tanka'], '</font>','<br>';
                echo '</section></div></div>';
                echo '<br><br>';
            }
            $count = $sql -> rowCount();
            $count = 0;
            $kakaku = 0;
        
            echo '<div class="pieces">';
            echo '<br>';
            echo '<h4>', '✕', $row['su'], '　　', '</h4>';
            echo '</div>';

        // echo '<div style="padding: 10px; margin-bottom: 10px; width: 60%; background-color: #e7e7d6; margin: 0 0 0 auto;">';
        // echo '<span>商品合計　￥</span>';
        //     // $kakaku = $row['tanka'] * $row['su'];
        //     // $total = $total + $kakaku;
        // echo '</div>';

        ?>

        <div style="padding: 10px; margin-bottom: 10px; width: 60%; background-color: #e7e7d6; margin: 0 0 0 auto;">
            <span>商品合計　￥</span>
        </div><br><br>

        <p>注文が確定されました</p><br>

        <p><a href="home.php">ホームへ戻る</a></p>

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