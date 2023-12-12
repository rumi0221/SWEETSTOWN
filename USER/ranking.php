<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ランキング画面</title>
</head>
<body>
    <div class="Header">
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/menu.css">
        SWEETSTOWN
    </div>

    <link rel="stylesheet" href="CSS/ranking.css">
    <br><br>

    <h1>ランキング</h1>
    <hr width="90%" noshade><br>
        <?php
            echo '<br>';
            $pdo=new PDO($connect,USER,PASS);
            $sql=$pdo->query('select * from product where delete_flg <> 1 && rank <= 10 && rank != 0 ORDER BY rank');
            echo '<form action="customer-infomation.php" method="POST">';
            $i = 1;
                foreach ($sql as $row) {
                    echo '<div class="item">';
                    echo '<img src="img/ranking', $i ,'.png"' . ($row['rank']) . '.png" alt="　" width="20%" height="20%">';

                    echo '<div class="ranking">';
                    echo '<a href="detail.php?product_id=',$row['product_id'],'" class="information"><img style=height="45px" width="25px" src=img/', $row['gazou'], '></a>', '<br>';
                    echo '<section>';
                    echo '<a href="detail.php" class="information">', '　', $row['product_mei'], '</a>', '<br>';
                    $sql2= $pdo->query('select * from shop where shop_code = '. $row['shop_code']);
                    $row2 = $sql2-> fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                    echo '<a href="detail.php" class="information">', '　', $row2['shop_mei'], '</a>', '<br>';
                    echo '<a href="detail.php" class="information">', '<font color="red">', '　', '￥', $row['tanka'], '</font>', '</a>';
                    echo '<br><br>';
                    echo '</section></div></div>';
                    $i++;
                }
        ?>


    <br><br><br><br><br>
        <hr>
    <footer><?php require 'menu.php';?></footer>
</body>
</html>