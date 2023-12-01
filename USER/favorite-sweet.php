<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/favorite-sweet.css">
    <title>お気に入り画面(スイーツ)</title>
</head>

<body>
    <div class="Header">
        SWEETSTOWN
    </div>
    <div class="favorite">
        <h2>お気に入り</h2>
        <div class="favoritebutton">
            <input type="button" value="スイーツ" style="width:80px;height:40px" class="sweetbutton">
            <input type="button" onclick="location.href='./favorite-shop.html'"  value="ショップ" style="width:80px;height:40px">
        </div>
        <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare(
        'select * from favorite,product,shop'.
        'where member_id=? and product_id=id and shop_code=');
        $sql->execute([$_SESSION['member']['id']]);
            foreach ($sql as $row) {
                $id=$row['id'];
                echo '<a href="detail.php?id='.$id.'">', $row['product_mei'],'</a>';
                echo $row['shop_mei'];
                echo $row['tanka'];
            }
        ?> 
    <div class="menu">
        <hr>
            <a href="home.php"><img src="img/home.png"></a>
            <a href="favorite-sweet.php"><img src="img/favorite.png"></a>
            <a href="search.php"><img src="img/search.png"></a>
            <a href="ranking.php"><img src="img/rank.png"></a>
            <a href="others.php"><img src="img/else.png"></a>
    </div> 
</body>

</html>