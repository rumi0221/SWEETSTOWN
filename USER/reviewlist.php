<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
    //DB接続
    echo '<br>';
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from review');
    //選択された商品IDを取得
    // $productId = $_POST['id']; こんなかんじ
    
    //とりあえず1にしておく
    $productId = 1;

    //レビューテーブルのデータをすべて出力
    foreach($pdo->query('select * from review')as $row){
        echo '<p>';
        echo $row['member_id'],':';
        echo $row['product_id'],':';
        echo $row['hoshi'],':';
        echo $row['title'],':';
        echo $row['view'];
        echo '</p>';

    }
?>」
\
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レビュー一覧画面</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/review.css">
</head>
<body>
     <div class="Header">
        SWEETSTOWN
      </div>
      <div class="hed">
        <h1>レビュー</h1>
    </div>
    <div class="shohin">
    <hr size="1">
</body>
</html>