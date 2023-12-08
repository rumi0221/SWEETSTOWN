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
                <th>順位</th><th>商品名</th><th>売上件数</th>
            </tr>
            <?php
                $ranking=0;
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from product where delete_flg <> 1 order by total_su desc limit 10');
                $hoz=0;
                foreach($sql as $row){
                    if($row['total_su'] != $hoz){
                        $ranking++;
                    }
                    $hoz=$row['total_su'];
                    echo '<tr>';
                    echo '<td>', $ranking, '</td>';
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