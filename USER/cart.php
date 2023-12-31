<?php session_start();?>
<?php require 'db-connect.php'; ?>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['n'])) {
            if($_POST['n'] != 0){
                header('Location: order-infomation.php'); 
                exit();
            }else{
                echo 'データが１件も入っていません';
            }
        } 
    }
?>
<!DOCTYPE html>
<html lang="ja">
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
    <div style="margin-top:70px;">
    <h1>カート</h1>
    <hr width="90%" noshade><br>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        if(isset($_POST['add_to_cart'])) {
            $productId = $_POST['product_id'];
            $zai=$pdo->prepare('select * from product where product_id = ?');
            $zai->execute([$productId]);
            $zako=$pdo->prepare('select * from cart where datetime = "0000-00-00 00:00:00" and member_id = ? and product_id = ?');
            $zako->execute([$_SESSION['member']['member_id'],$productId]);
            foreach($zai as $yuk){
                foreach($zako as $ymk){
                    if($ymk['su'] < $yuk['zaiko']){
                        $sil=$pdo->prepare('update cart set su = su + 1 where datetime = "0000-00-00 00:00:00" and member_id = ? and product_id = ?');
                        $sil->execute([$_SESSION['member']['member_id'],$productId]);
                    }
                }
            }
        }
        if(isset($_POST['remove_from_cart'])) {
            $productId = $_POST['product_id'];
            $nba=$pdo->prepare('select * from cart where datetime = "0000-00-00 00:00:00" and member_id = ? and product_id = ?');
            $nba->execute([$_SESSION['member']['member_id'],$productId]);
            foreach($nba as $gun){
                if($gun['su'] > 1){
                    $productId = $_POST['product_id'];
                    $sil=$pdo->prepare('update cart set su = su - 1 where datetime = "0000-00-00 00:00:00" and member_id = ? and product_id = ?');
                    $sil->execute([$_SESSION['member']['member_id'],$productId]);
                }
            }
        }
        if(isset($_POST['delete'])) {
            $productId = $_POST['product_id'];
            $sil=$pdo->prepare('delete from cart where datetime = "0000-00-00 00:00:00" and member_id = ? and product_id = ?');
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
                echo '<div class="item">';
                echo '<a href="detail.php?product_id=',$row['product_id'],'"><img src="img/',$pow['gazou'],'" style="width:100px;"></a>';
                echo '<section>';
                echo '<p class="description"></p>';
                echo '<div class="product">';
                echo $pow['product_mei'],'<br>';
                echo '</div>';
                foreach($ppa as $sas){
                echo '<div class="shop">';
                    echo $sas['shop_mei'],'<br>';
                echo '</div>';
                }
                echo '<font color="red">','￥',$pow['tanka'],'</font>';
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
                echo '<button class="button3" type="submit" name="remove_from_cart">-</button>';
                echo '<div class="maru size_normal black1">';
                echo '<div class="letter3">',$row['su'],'</div>';
                echo '</div>';
                echo '<button class="button3" type="submit" name="add_to_cart">+</button>';
                echo '</form>';


                echo '<form method="post">';
                echo '<input type="hidden" name="product_id" value="',$row['product_id'],'">';
                echo '　　','<button class="btndelete" type="submit" name="delete">削除する</button>';
                //echo '　　　','<a href="detail.php" class="information">削除する</a>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '<br>';
                $kakaku = $pow['tanka'] * $row['su'];
                $total = $total + $kakaku;
            }
        }
        echo '<p>商品合計　￥',$total,'</p>';
    ?>
    <form method="post">
        <input type="hidden" name="n" value="<?= $count ?>">
        <button class="button2" >レジへ進む</button>
    </form>
    </div>
    <footer><?php require 'menu.php';?></footer>
</body>
</html>