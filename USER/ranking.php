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
        <link rel="stylesheet" href="CSS/ranking.css">
        <link rel="stylesheet" href="CSS/menu.css">
        SWEETSTOWN
    </div>

    <link rel="stylesheet" href="CSS/ranking.css">
    <br><br>

    <h1>ランキング</h1>
    <hr width="90%" noshade>
    <br><br>

        <table>
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from product where delete_flg <> 1 && rank <= 10 && rank != 0 ORDER BY rank');
                $i = 1;
                    foreach ($sql as $row) {
                        echo '<tr>';
                        echo '<td class="td1">';
                        echo '<img class="rank" src="img/ranking', $i ,'.png" alt="　" />';
                        echo '</td>';
                        echo '<td class="td2">';
                        echo '<img>'; 
                        echo '<a href="detail.php?product_id=', $row['product_id'], '">';
                        echo '<img class="img" src="img/', $row['gazou'], '"></a>';
                        echo '</td>';
                        echo '<td class="td3">';
                        echo '<p class="information">', $row['product_mei'], '</p>';
                        $sql2= $pdo->query('select * from shop where shop_code = '. $row['shop_code']);
                        $row2 = $sql2-> fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                        echo '<p class="information">', $row2['shop_mei'], '</p>';
                        echo '<p class="information"><font color="red">', '￥', $row['tanka'], '</font>', '</p>';
                        echo '</td></tr>';
                        $i++;
                    }
            ?>
        </table>

    <br><br><br><br><br>
    <footer><?php require 'menu.php';?></footer>
</body>
</html>