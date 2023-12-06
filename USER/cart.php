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
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
</head>
<body>
    <div class="Header">
        <a style="left: 0;top: 0;position: absolute;" onclick="history.back()"><i class="fas fa-angle-left fa-2x"></i></a>
        SWEETSTOWN
    </div>
    <div style="margin-top:60px;">
    <h1>カート</h1>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        if(isset($_POST['add_to_cart'])) {
            $productId = $_POST['product_id'];
            $sil=$pdo->prepare('update cart set su = su + 1 where member_id = ? and product_id = ?');
            $sil->execute([$_SESSION['member']['member_id'],$productId]);
        }
        if(isset($_POST['remove_from_cart'])) {
            $productId = $_POST['product_id'];
            $sil=$pdo->prepare('update cart set su = su - 1 where member_id = ? and product_id = ?');
            $sil->execute([$_SESSION['member']['member_id'],$productId]);
        }
        if(isset($_POST['delete'])) {
            $productId = $_POST['product_id'];
            $sil=$pdo->prepare('delete from cart where member_id = ? and product_id = ?');
            $sil->execute([$_SESSION['member']['member_id'],$productId]);
        }
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
                echo '<div class="su">';
                echo '<br>';
                // echo '<form method="post">';
                // echo '<input type="hidden" name="product_id" value="',$row['product_id'],'">';
                // echo '<button type="submit" name="add_to_cart">+1</button>';
                // echo '</form>',$row['su'];
                // echo '<form method="post">';
                // echo '<input type="hidden" name="product_id" value="',$row['product_id'],'">';
                // echo '<button type="submit" name="remove_from_cart">-1</button>';
                // echo '</form>';

                echo '<form method="post">';
                echo '　';
                echo '<input type="hidden" name="product_id" value="',$row['product_id'],'">';
                echo '<button class="button3" type="submit" name="add_to_cart">+</button>';
                echo '<div class="maru size_normal black1">';
                echo '<div class="letter3">',$row['su'],'</div>';
                echo '</div>';
                echo '<button class="button3" type="submit" name="remove_from_cart">-</button>';
                echo '</form>';


                echo '<form method="post">';
                echo '<input type="hidden" name="product_id" value="',$row['product_id'],'">';
                echo '　　','<button class="btndelete" type="submit" name="delete">削除する</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<br>';
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