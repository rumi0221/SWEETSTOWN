<?php session_start();?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細画面</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/detail.css">
    <link rel="stylesheet" href="CSS/menu.css">
</head>
<body>
    <div class="Header">
        SWEETSTOWN
      </div>
      <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from product where product_id=?');
        $set=$_GET['product_id'];
        $sql->execute([$set]);
        $ppp=$pdo->prepare('select * from favorite where member_id=? and product_id=?');
        $ppp->execute([$_SESSION['member']['member_id'],$set]);
        $count = $ppp -> rowCount();
        if($count == 0){
          $i = '♥';
        }else{
          $i = '♡';
        }
        foreach($sql as $row){
          $fav=$pdo->prepare('select * from favorite where member_id = ? and product_id = ?');
          $fav->execute([$_SESSION['member']['member_id'],$row['product_id']]);
          echo '<div class="gazou">';
          echo '<img src="img/',$row['gazou'],'" alt="商品画像">';
          echo '</div>';
          echo '<div class="shohin1">';
          echo '<h3>',$row['product_mei'],'</h3>';
          echo '<p>',$row['tanka'],'</p>';
          $ssl=$pdo->prepare('select * from shop where shop_code=?');
          $ssl->execute([$row['shop_code']]);
          foreach($ssl as $eow){
              echo '<p>',$eow['shop_mei'],'</p>';
          }
          echo '</div>';
          echo '<form method="post">';
          echo '<button type="submit" name="favorite">',$i,'</button>';
          echo '</form>';
          if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['favorite'])) {
            if($i == '♥'){
              $fav=$pdo->prepare('insert into favorite values(?,?)');
              $fav->execute([$_SESSION['member']['member_id'],$set]);
              $i = '♡';
            }else{
              echo "<hr>";
              echo "削除します";
              echo "<hr>";
              $favd=$pdo->prepare('delete from favorite where member_id=? and product_id=?');
              $favd->execute([$_SESSION['member']['member_id'],$set]);
              $i = '♥';
            }
          }
          echo '<div class="shohin2">';
          echo '<form action="cart.php" method="post">';
          echo '<input type="hidden" name="pid"  value="',$set,'">';
          echo '<button type="submit" name="car">🛒 カートに入れる</button>';
          echo '</form>';
          echo '<p>',$row['setumei'],'</p>';
          echo '<button type="review"onclick="location.href="review.php"">レビュー</button>';
          $spl=$pdo->prepare('select * from product where product_id <> ? and product_type = ?');
          $spl->execute([$row['product_id'],$row['product_type']]);
          foreach($spl as $mow){
            echo '<a href="detail.php?product_id=',$mow['product_id'],'><img src="img/',$mow['gazou'],'"></a>';
          }
          echo '</div>';
        }
      ?>
      <footer><?php require 'menu.php';?></footer>
</body>
</html>