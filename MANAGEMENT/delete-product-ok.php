<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>商品削除完了画面</title>
</head>
<body>
    <div class="main">
        <?php
            $pdo=new PDO($connect, USER, PASS);
            $sql=$pdo->prepare('update product set delete_flg = 1 where product_id=?');
            $sql->execute([(int)$_POST['product_id']]);
        ?>
        <p>商品の情報が削除されました</p>
        <a href="productlist.php">商品一覧へ</a>
    </div>
</body>
</html>