<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>顧客情報画面</title>
</head>
<body>
    <div class="main">
        <div class="box1">
            <?php
                echo '<p>顧客番号：', $_POST['id'], '</p>';
            ?>
        </div>
        <br>
        <div>
            <p class="under">カート内商品</p>
            <table class="table-color">
                <thead>
                    <tr>
                        <th>商品ID</th><th>商品名</th><th>ショップ名</th><th>価格</th><th>数量</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $pdo=new PDO($connect,USER,PASS);
                    $sql=$pdo->query('select * from cart where member_id = '. $_POST['id']);
                    foreach($sql as $row){
                        $id = $row['product_id'];
                        $sql2 = $pdo->query('select * from product where product_id = '. $row['product_id']);
                        $row2 = $sql2->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                        echo '<tr>';
                        echo '<td class="table-center">', $row['product_id'], '</td>';
                        echo '<td>', $row2['product_mei'], '</td>';
                        $sql3 = $pdo->query('select * from shop where shop_code = '. $row2['shop_code']);
                        $row3 = $sql3->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                        echo '<td>', $row3['shop_mei'], '</td>';
                        echo '<td class="table-right">', $row2['tanka'], '</td>';
                        echo '<td class="table-right">', $row['su'], '</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
        </div>
        <br>
        <div>
            <p><span class="under">購入履歴</span></p>
            <table class="table-color">
                <thead>
                    <tr>
                        <th>購入ID</th><th>商品ID</th><th>商品名</th><th>購入日時</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql=$pdo->query('select * from purchase where member_id = '. $_POST['id']);
                    foreach($sql as $row){
                        $id = $row['kou_id'];
                        $sql2 = $pdo->query('select * from purchase_history where kou_id = '. $id);
                        foreach($sql2 as $row2){
                        $sql3 = $pdo->query('select product_mei from product where product_id = '. $row2['product_id']);
                        $row3 = $sql3->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                        echo '<tr>';
                        echo '<td class="table-center">', $row2['kou_id'], '</td>';
                        echo '<td class="table-center">', $row2['product_id'], '</td>';
                        echo '<td>', $row3['product_mei'], '</td>';
                        echo '<td>', $row['datetime'], '</td>';
                        echo '</tr>';
                        }
                    }
                ?>
                <tbody>
            </table>
        </div>
        <br>
        <br>
        <a class="mdr" href="customerlist.php">戻る</a>
    </div>
</body>
</html>