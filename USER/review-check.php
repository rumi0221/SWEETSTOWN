<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
// 商品詳細情報取得
 $pdo=new PDO($connect,USER,PASS);
//  $sql=$pdo->query('select * from review');
$sql=$pdo->prepare('select * from product where product_id=?');
$sql->execute([$_GET['id']]);
$productData = $sql->fetch();


// ショップ名取得 TODO:多分取れた
$sql2=$pdo->prepare('select product.product_id, shop.shop_mei from product left JOIN shop ON product.shop_code = shop.shop_code where product.product_id = ?;');
$sql2->execute([$_GET['id']]);
$shopData = $sql2->fetch();



?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レビュー確認画面</title>
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
        <h1>レビュー確認</h1>
</div>
<hr size="1">
<div class="content">
    <p><?php echo $productData['product_mei']?>
    </p>
    <p><?php echo $shopData['shop_mei']?></p>
    <div class="title">
        <textarea readonly rows="1" cols="40"><?=$_POST['title']?></textarea>
    </div>
    <div calss="honbun">
        <textarea readonly rows="10" cols="40"><?=$_POST['review']?></textarea>
    </div>

    <form action="review-ok.php" method="post">

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

        <input type="hidden" name="ratevalue" value="<?=$_POST['rate']?>">
        <button class="kakunin" type="submit">投稿する</button>

    </form>
</div>
<script type= "text/javascript">
    // document.getElementById("star2").checked = true;
    let rate = "<?php echo $_POST['rate']?>";
    document.getElementById("star" + rate).checked = true;

</script>
    
</body>
</html>