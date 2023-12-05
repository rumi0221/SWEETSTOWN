<?php
session_start();
require 'db-connect.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <title>検索結果一覧画面</title>
</head>

<body>
    <div class="Header">
      SWEETSTOWN
    </div>
    <br>
    <br>
    <div class="search">
        <form action="searchlist.php" method="post">
            <input type="text" name="search" placeholder="🔍 キーワード検索" />
            <p><button type="submit">検索</button></p>
        </form>
    </div>

    <?php
        $pdo = new PDO($connect, USER, PASS);
        if (isset($_POST['price_range'])) {
            $min_price = 0;
            $max_price = 0;

            switch ($_POST['price_range']) {
                case '100-500':
                    $min_price = 100;
                    $max_price = 500;
                    break;
                case '500-1000':
                    $min_price = 501;
                    $max_price = 1000;
                    break;
                case '1000-1500':
                    $min_price = 1001;
                    $max_price = 1500;
                    break;
                case '1500-2000':
                    $min_price = 1501;
                    $max_price = 2000;
                    break;
                case '2000-2500':
                    $min_price = 2001;
                    $max_price = 2500;
                    break;
                case '2500-3000':
                    $min_price = 2501;
                    $max_price = 3000;
                    break;
                default:  
                    break;
            }
        
                try {
                    $sql = $pdo->prepare('select * from product where tanka BETWEEN ? and ?');
                    $sql->execute([$min_price,$max_price]);
                } catch (PDOException $e) {
                    echo "エラーが発生しました";
                }
            }?>
        <div class="Shohin">
           <?php
            foreach($sql as $row){
                echo '<a href="detail.php?product_id=',$row['product_id'],'">';
                echo '<img src="img/', $row['gazou'],'" alt="商品画像">';
                echo '</a>';
                echo '<div class="shohin-setumei">';
                echo '<p>',$row['product_mei'],'</p>';
                echo '<p>',$row['shop_code'],'</p>';
                echo '￥',$row['tanka'];
                echo '<br>';
                echo '</div>';
            }?>
        </div>
    <footer><?php require 'menu.php';?></footer>
</body>
</html>
