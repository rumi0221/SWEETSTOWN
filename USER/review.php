<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
 $pdo=new PDO($connect,USER,PASS);
//  $sql=$pdo->query('select * from review');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レビュー画面</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/review.css">
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
<hr size="1">
<div class="content">
    <p>商品名</p>
    <p>ショップ名</p>

    <form action="review-check.php" method="post">
    <div class="title">
        <textarea rows="1" cols="40" name="title">タイトル</textarea>
    </div>
    <div calss="honbun">
        <textarea rows="10" cols="40" name="review">レビュー本文</textarea>
    </div>
    
        <div class="rate-form">
            <input id="star5" type="radio" name="rate" value="5">
            <label for="star5">★</label>
            <input id="star4" type="radio" name="rate" value="4">
            <label for="star4">★</label>
            <input id="star3" type="radio" name="rate" value="3">
            <label for="star3">★</label>
            <input id="star2" type="radio" name="rate" value="2">
            <label for="star2">★</label>
            <input id="star1" type="radio" name="rate" value="1">
            <label for="star1">★</label>
          </div>
        <button class="kakunin" type="submit">内容の確認をする</button>
    
</form>


</div>
    

    
</body>
</html>