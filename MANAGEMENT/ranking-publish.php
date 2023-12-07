<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/publish.css">
    <title>ランキング掲載画面</title>
</head>
<body>
    <div class="main">
        <h1>ランキング</h1>
        <table>
            <tr>
                <th></th><th>商品名</th><th>売上件数</th>
            </tr>
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select product_mei, total_su, (select count(i2.total_su) from product i2 where i1.total_su < i2.total_su) + 1 as ranking from product i1 where ranking <= 10 order by ranking desc)');
                foreach($sql as $row){
                        echo '<tr>';
                        echo '<td>', $row['ranking'], '</td>';
                        echo '<td>', $row['product_mei'], '</td>';
                        echo '<td>', $row['total_su'], '</td>';
                        echo '</tr>';
                }
            ?>
        </table>
        <br>
        <br>
        <form action="ranking-publish-ok.php">
            <input type="submit" value="掲載">
        </form>
        <a class="mdr" href="publish.php">戻る</a>
    </div>
</body>
</html>