<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>全体売上画面</title>
</head>
<body>
    <div class="main">
        <h1>全体売上</h1>
        <table class="table-color">
            <thead>
                <tr>
                    <th>商品ID</th><th>商品名</th><th>ショップ名</th><th>価格</th><th>数量</th><th>購入ID</th><th>購入日時</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from purchase_history');
                foreach($sql as $row){
                    echo '<tr>';
                    echo '<td>', $row['product_id'], '</td>';
                    $sql2 = $pdo->query('select * from product where product_id = '. $row['product_id']);
                    $row2 = $sql2->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                    echo '<td>', $row2['product_mei'], '</td>';
                    $sql3 = $pdo->query('select * from shop where shop_code = '. $row2['shop_code']);
                    $row3 = $sql3->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                    echo '<td>', $row3['shop_mei'], '</td>';
                    echo '<td>', $row2['tanka'], '</td>';
                    echo '<td>', $row2['total_su'], '</td>';
                    echo '<td>', $row['kou_id'], '</td>';
                    $sql4 = $pdo->query('select * from purchase where kou_id = '. $row['kou_id']);
                    $row4 = $sql4->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                    echo '<td>', $row4['datetime'], '</td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>