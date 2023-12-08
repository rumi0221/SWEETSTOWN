<?php session_start();?>
<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文情報確定画面</title>
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
</head>
<body>
    <div class="Header">
        <link rel="stylesheet" href="CSS/header.css">
        <a style="left: 0;top: 0;position: absolute;" onclick="history.back()"><i class="fas fa-angle-left fa-2x"></i></a>
        SWEETSTOWN
    </div>
        <link rel="stylesheet" href="CSS/cart.css">
        <br><br><br><br>
        <?php
            echo '<br>';
            $pdo=new PDO($connect,USER,PASS);
            $sql=$pdo->prepare('select * from cart where datetime = "0000-00-00 00:00:00" and member_id = ?');
            $sql->execute([$_SESSION['member']['member_id']]);
            $count = $sql -> rowCount();
            $total = 0;
            $kakaku = 0;
            $currentDateTime = date('Y-m-d H:i:s');
            $pur=$pdo->prepare('insert into purchase values(null,?,?,?,?,?)');
            $pur->execute([$currentDateTime,$_SESSION['member']['member_id'],$_POST['payment'],$_POST['place'],$_POST['live']]);

            foreach ($sql as $row) {
                $bow=$pdo->prepare('update product set total_su = total_su + ? where product_id = ?');
                $bow->execute([$row['su'],$row['product_id']]);
                $out=$pdo->prepare('select * from purchase where datetime = ? and member_id = ?');
                $out->execute([$currentDateTime,$_SESSION['member']['member_id']]);
                foreach($out as $ywy){
                    $tui=$pdo->prepare('insert into purchase_history values(?,?,?,default)');
                    $tui->execute([$ywy['kou_id'],$row['product_id'],$row['su']]);
                }
                $sss=$pdo->prepare('select * from product where product_id = ?');
                $sss->execute([$row['product_id']]);
                foreach($sss as $pow){
                    $ppa=$pdo->prepare('select * from shop where shop_code = ?');
                    $ppa->execute([$pow['shop_code']]);
                    echo '<div class="product">';
                    echo '<div class="item">';
                    echo '<a href="detail.php?product_id=',$row['product_id'],'"><img src="img/',$pow['gazou'],'"></a>';
                    echo '<section>';
                    echo '<p class="description"></p>';
                    echo '　',$pow['product_mei'],'<br>';
                    foreach($ppa as $sas){
                        echo '　',$sas['shop_mei'],'<br>';
                    }
                    echo '<font color="red">','　￥',$pow['tanka'],'</font>';
                    echo '</section>';
                    echo '<div class="pieces">';
                    echo '<h4>', '×', $row['su'], '　　', '</h4>';
                    echo '</div></div>';
                    echo '</div>';
                    echo '<br>';

                    $kakaku = $pow['tanka'] * $row['su'];
                    $total = $total + $kakaku;
                }
            }
            $qaz=$pdo->prepare('update cart set datetime = ? where datetime = "0000-00-00 00:00:00" and member_id = ?');
            $qaz->execute([$currentDateTime,$_SESSION['member']['member_id']]);

            echo '<div style="padding: 10px; margin-bottom: 10px; width: 60%; background-color: #e7e7d6; margin: 0 0 0 auto;">';
            echo '<div style="font-size: 20px;">', '　商品合計　￥ ', $total, '</div>';
            echo '</div>';
        ?>
        
        </div><br><br>

        <p>注文が確定されました</p><br>

        <p><a href="home.php">ホームへ戻る</a></p>

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