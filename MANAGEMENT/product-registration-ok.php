<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>商品登録完了画面</title>
</head>
<body>
    <?php
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('insert into product values(NULL, ?, ?, ?, ?, ?,DEFAULT, ?, DEFAULT, ?, DEFAULT, DEFAULT, ?, DEFAULT)');
        $sql->execute([ $_POST['product_name'], $_POST['category'], $_POST['price'], $_POST['explanation'], $_POST['image'], $_POST['season'], $_POST['stock'] , (int)$_POST['shop_id']]);
    ?>
    <div class="main">
        <div class="link">
            <p>商品が登録されました</p>
            <a href="productlist.php">商品一覧へ</a>
        </div>
    </div>
</body>
</html>