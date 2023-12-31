<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>季節のスイーツ一覧画面</title>
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/seasonlist.css">
</head>
<body>
    <div class="Header">
        <a style="left: 10px;top: 5px;position: absolute;" onclick="history.back()"><i class="fas fa-angle-left fa-2x"></i></a>
        SWEETSTOWN
    </div>
    <br><br>
    <h1>季節のスイーツ</h1>
    <hr width="90%" noshade><br>

<table>
    <?php
        echo '<br>';
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from product where season_flg = 1');
        echo '<form action="customer-infomation.php" method="POST">';
        foreach ($sql as $row) {
            echo '<tr>';
            echo '<td class="td1">';
            echo '<a href="detail.php?product_id=',$row['product_id'],'">';
            echo '<img class="img" src="img/', $row['gazou'], '"></a><br>';
            echo '</td>';
            echo '<td class="td2">';
            echo '<a href="detail.php?product_id=',$row['product_id'],'" class="information">', '　', $row['product_mei'], '</a><br>';
            $sql2= $pdo->query('select * from shop where shop_code = '. $row['shop_code']);
            $row2 = $sql2-> fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
            echo '<a href="detail.php?product_id=',$row['product_id'],'" class="information">', '　', $row2['shop_mei'], '</a><br>';
            echo '<a href="detail.php?product_id=',$row['product_id'],'" class="information">', '<font color="red">', '　', '￥', $row['tanka'], '</font>', '</a>';
            echo '<br><br>';
            echo '</td></tr>';
        }
    ?>
</table>

    <br><br><br><br><br>

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