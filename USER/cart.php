<?php session_start();?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カート画面</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/cart.css">
    <link rel="stylesheet" href="CSS/menu.css">
</head>
<body>
    <div class="Header">
        SWEETSTOWN
    </div>
    <div style="margin-top:60px;">
    <h1>カート</h1>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from cart where datetime = "0000-00-00 00:00:00" and member_id = ?');
        $sql->execute([$_SESSION['member']['member_id']]);
        $count = $sql -> rowCount();
        $total = 0;
        $kakaku = 0;
        echo'<p>カートに入っている商品：',$count,'点</p><br>';
        foreach($sql as $row){
            $sss=$pdo->prepare('select * from product where product_id = ?');
            $sss->execute([$row['product_id']]);
            foreach($sss as $pow){
                $ppa=$pdo->prepare('select * from shop where shop_code = ?');
                $ppa->execute([$pow['shop_code']]);
                echo '<div class="image"><a href="detail.php?product_id=',$row['product_id'],'"><img src="img/',$pow['gazou'],'"></a></div>';
                echo '<section>';
                echo '<p class="description"></p>';
                echo '商品名:',$pow['product_mei'],'<br>';
                foreach($ppa as $sas){
                    echo 'ショップ名:',$sas['shop_mei'],'<br>';
                }
                echo '￥',$pow['tanka'];
                echo '<br><br>';
                echo '</section>';
                echo '<div>';
                echo '<br>';
                echo $row['su'],'<br>';
                echo '<a href="#">削除する</a><br>';
                $kakaku = $pow['tanka'] * $row['su'];
                $total = $total + $kakaku;
            }
        }
        echo '<p>商品合計　￥',$total,'</p>';
    ?>
    <form action="order-infomation.php" method="post">
        <button class="button2" >レジへ進む</button>
    </form>
    </div>
    <center><footer><?php require 'menu.php';?></footer></center>
</body>
</html>