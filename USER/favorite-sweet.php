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
        <?php
        <div class="favoritebutton">
            <input type="button" value="スイーツ" style="width:80px;height:40px" class="sweetbutton">
            <input type="button" onclick="location.href='./favorite-shop.html'"  value="ショップ" style="width:80px;height:40px">
        </div>
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare(
        'select * from favorite,product '.
        'where customer_id=? and product_id=id');
        $sql->execute([$_SESSION['customer']['id']]);
        foreach ($sql as $row){
            $id=$row['id'];
            echo '<tr>';
            echo '<td>',$id,'</td>';
            echo '<td><a href="detail.php?id='.$id.'">',$row['name'],
                 '</a></td>';
            echo '<td>',$row['price'],'</td>';
            echo '<td><a href="favorite-delete.php?id=',$id,
                 '">削除</a></td>';
            echo '</tr>';
        }
        <div class="content">
            <div class="item">
                <img src="img/a.jpg" alt="ショップ名" width="250" height="150" class="sweet_img">
                <div class="item_detail">
                    <p class="item_name">商品名</p>
                    <p class="shop_name">ショップ名</p>
                    <p class="price">価格</p>
                </div>
            </div>
        </div>
    </div>
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