<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/product.css">
    <title>顧客一覧画面</title>
</head>
<body>
    <div class="main">
        <h1>商品一覧</h1>
        <form action="product-registration">
            <button class="registration">商品登録</button>
        </form>
        <table class="table-color">
            <thead>
                <tr>
                    <th>商品ID</th><th>商品名</th><th>カテゴリ</th><th>単価</th><th>商品説明</th><th>商品画像</th><th>総購入数</th><th>季節</th><th>在庫</th><th>店舗名</th><th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from product where delete_flg = 0');
                foreach($sql as $row){
                    $sql2 = $pdo->query('select * from shop where shop_code = '. $row['shop_code']);
                    $row2 = $sql2->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                    echo '<tr>';
                    echo '<td class="table-center">', $row['product_id'], '</td>';
                    echo '<td class="table-a">', $row['product_mei'], '</td>';
                    echo '<td class="table-a">', $row['product_type'], '</td>';
                    echo '<td class="table-right">', $row['tanka'], '</td>';
                    echo '<td class="table-c">', $row['setumei'], '</td>';
                    echo '<td class="table-b">', $row['gazou'],'</td>';
                    echo '<td class="table-right">', $row['total_su'],'</td>';
                    echo '<td>', $row['season'], '</td>';
                    echo '<td class="table-right">', $row['zaiko'], '</td>';
                    echo '<td class="table-a">', $row2['shop_mei'], '</td>';
                    echo '<td>';
                    echo '<form action="product-update.php" method="POST">';
                    echo '<button type="submit" name="update" value="', $row['product_id'], '">更新</button>';
                    echo '</form>';
                    echo '<form action="delete-product.php" method="POST">';
                    echo '<button type="submit" name="delete" value="', $row['product_id'], '">削除</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>