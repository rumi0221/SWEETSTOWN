<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
    //DB接続
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from review');
    //選択された商品IDを取得
    // $productId = $_POST['id']; こんなかんじ
    
    //とりあえず1にしておく
    $productId = 1;

    //レビューテーブルのデータをすべて出力
   $sql=$pdo->prepare('select * from review,product where review.product_id = product.product_id');
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    var_dump($result);
    exit;
    // echo $row['product_mei'];
// $count = $sql->rowCount();
// echo $count ;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レビュー一覧画面</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/review.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
</head>
<body>
<div class="Header">
<a style="left: 0;top: 0;position: absolute;" onclick="history.back()"><i class="fas fa-angle-left fa-2x"></i></a>
        SWEETSTOWN
      </div>
    <div class="hed">
        <h1>レビュー</h1>
    </div>
    <div class="shohin">
    <hr size="1">
    <?php
     echo '<p>',$result[0]['product_mei'],'</p>';
    ?>
</div>

<?php
    foreach($result as $row){
        // echo '<p>';
        // echo $row['member_id'],':';
        // echo $row['product_id'],':';
        // echo $row['hoshi'],':';
        // echo $row['title'],':';
        // echo $row['view'];
        // echo '</p>';
        echo '<div class="review1">';
        for($i=0;$i<$row['hoshi'];$i++){
            echo '☆';
        }
        echo '<p>',$row['title'],'</p>';
        echo '<p>',$row['view'],'</p>';
        echo '</div>';


    }
?>
<footer><?php require 'menu.php';?></footer>
</body>
</html>