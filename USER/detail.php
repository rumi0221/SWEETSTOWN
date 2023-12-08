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
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
</head>
<body>
    <div class="Header">
      <a style="left: 0;top: 0;position: absolute;" onclick="history.back()"><i class="fas fa-angle-left fa-2x"></i></a>
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
              $favd=$pdo->prepare('delete from favorite where member_id=? and product_id=?');
              $favd->execute([$_SESSION['member']['member_id'],$set]);
              $i = '♥';
            }
          }
          echo '<div class="shohin2">';
          echo '<form method="post">';
          echo '<button type="submit" name="car">🛒 カートに入れる</button>';
          echo '</form>';
          if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['car'])) {
            $col=$pdo->prepare('select * from cart where datetime="0000-00-00 00:00:00" and member_id=? and product_id=?');
            $col->execute([$_SESSION['member']['member_id'],$set]);
            $su = $col -> rowCount();
            if($su >= 1){
              echo '<div class="error">この商品はすでにカートに入っています</div>';
            }else{
              $ddd=$pdo->prepare('insert into cart values(default,?,?,1)');
              $ddd->execute([$_SESSION['member']['member_id'],$set]);
              echo '<div>商品を追加しました';
            }
          }
          echo '<p>',$row['setumei'],'</p>';
          echo '<button class="searchbutton" onclick="location.href=\'review.php?id=' . $set . '\'">レビュー</button>';
          $spl=$pdo->prepare('select * from product where product_id <> ? and product_type = ?');
          $spl->execute([$row['product_id'],$row['product_type']]);
          foreach($spl as $mow){
            echo '<a href="detail.php?product_id=',$mow['product_id'],'"><img src="img/',$mow['gazou'],'"></a>　';
          }
          echo '</div>';
        }
      ?>
      <footer><?php require 'menu.php';?></footer>
</body>
</html>