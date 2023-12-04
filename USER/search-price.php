<?php
session_start();
require 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['price_range'])) {
    $min_price = 0;
    $max_price = 0;

    
        switch ($_POST['price_range']) {
            case '100-500':
                $min_price = 100;
                $max_price = 500;
                break;
            case '500-1000':
                $min_price = 500;
                $max_price = 1000;
                break;
            case '1000-1500':
                $min_price = 1000;
                $max_price = 1500;
                break;
            case '1500-2000':
                $min_price = 1500;
                $max_price = 2000;
                break;
            case '2000-2500':
                $min_price = 2000;
                $max_price = 2500;
                break;
            case '2500-3000':
                $min_price = 2500;
                $max_price = 3000;
                break;
            default:
               
                break;
        }

        try {
            $stmt = $pdo->prepare('SELECT * FROM product
                                   WHERE tanka BETWEEN :min_price AND :max_price');
            $stmt->execute(['min_price' => $min_price, 'max_price' => $max_price]);
            $search_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $_SESSION['min_price'] = $min_price;
            $_SESSION['max_price'] = $max_price;
            $_SESSION['search_result'] = $search_result;
            header("Location: searchlist.php");
            exit();
        } catch (PDOException $e) {
            echo "エラー：" . $e->getMessage();
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/search.css">
    <title>検索画面</title>
</head>
<body>
    <div class="Header">
        SWEETSTOWN
    </div>
    <div class="search">
        <form action="searchlist.php" method="post">
            <button class="searchbutton" name="price_range" value="100-500">￥100 ～ 500</button>
            <button class="searchbutton" name="price_range" value="500-1000">￥500 ～ 1000</button>
            <button class="searchbutton" name="price_range" value="1000-1500">￥1000 ～ 1500</button>
            <button class="searchbutton" name="price_range" value="1500-2000">￥1500 ～ 2000</button>
            <button class="searchbutton" name="price_range" value="2000-2500">￥2000 ～ 2500</button>
            <button class="searchbutton" name="price_range" value="2500-3000">￥2500 ～ 3000</button>
        </form>
    </div>
</body>
</html>
