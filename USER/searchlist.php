<?php
session_start();
require 'db-connect.php'; 

$min_price = isset($_SESSION['min_price']) ? $_SESSION['min_price'] : 0;
$max_price = isset($_SESSION['max_price']) ? $_SESSION['max_price'] : PHP_INT_MAX;
$search_result = isset($_SESSION['search_result']) ? $_SESSION['search_result'] : [];

$pdo = new PDO($connect, USER, PASS);
$stmt = $pdo->prepare('select * from product 
                       where tanka BETWEEN :min_price AND :max_price');
$stmt->execute(['min_price' => $min_price, 'max_price' => $max_price]);
$search_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <title>検索結果一覧画面</title>
</head>

<body>
    <div class="Header">
      SWEETSTOWN
    </div>
    <br>
    <br>
    <div class="search">
        <form action="searchlist.php" method="post">
            <input type="text" name="search" placeholder="🔍 キーワード検索" />
            <p><button type="submit">検索</button></p>
        </form>
    </div>

    <?php foreach ($search_result as $product) : ?>
        <div class="Shohin">
           
            <a href="detail.php?product_id=<?php echo $product['product_id']; ?>">
                <img src="<?php echo $product['gazou']; ?>" alt="商品画像">
            </a>
            <div class="shohin-setumei">
                <p><?php echo $product['product_mei']; ?></p>
                <p><?php echo $product['shop_code']; ?></p>
                ￥<?php echo $product['tanka']; ?>
                <br>
            </div>
        </div>
    <?php endforeach; ?>
    <footer><?php require 'menu.php';?></footer>
</body>
</html>
