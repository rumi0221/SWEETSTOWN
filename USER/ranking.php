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
        <link rel="stylesheet" href="header.css">
        SWEETSTOWN
    </div>

    <link rel="stylesheet" href="ranking.css">
    <br><br>

    <h1>ランキング</h1>
    <hr width="90%" noshade><br>

        <?php
            echo '<br>';
            $pdo=new PDO($connect,USER,PASS);
            // $sql=$pdo->query('select * from product');
            $sql=$pdo->query('select * from product where rank <= 10 && rank != 0 ORDER BY rank');
            echo '<form action="customer-infomation.php" method="POST">';
            $i = 1;
            // while($i < 10){
                foreach ($sql as $row) {
                    // if($row['rank'] == $i){
                    echo '　　　', '<img src="image/ranking-number.png' . ($row['rank']) . '.png" alt="　" width="50%" height="50%">';

                    echo '<div class="ranking">';
                    echo '<a href="detail.php" class="information">', $row['gazou'], '</a>', '<br>';
                    echo '<section>';
                    echo '<a href="detail.php" class="information">', '　', $row['product_mei'], '</a>', '<br>';
                    echo '<a href="detail.php" class="information">', '　', $row['shop_code'], '</a>', '<br>';
                    echo '<a href="detail.php" class="information">', '<font color="red">', '　', '￥', $row['tanka'], '</font>', '</a>';
                    echo '<br><br>';
                    echo '</section></div></div>';
                    // }else{
                    //     break;
                    }
                // }
            // }
        ?>


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