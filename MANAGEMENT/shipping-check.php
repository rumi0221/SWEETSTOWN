<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/order.css">
    <title>発送確認画面</title>
</head>
<body>
    <div class="main">
        <h1>発送確認</h1>
        <?php
            $pdo=new PDO($connect,USER,PASS);
            $sql=$pdo->query('select * from purchase where kou_id = '. $_POST['still']);
            $row = $sql->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
        ?>
        <table class="table-color">
            <tr>
                <th>受注日</th>
                <td><?php echo $row['datetime']; ?></td>
            </tr>
            <tr>
                <th>注文番号</th>
                <td><?php echo $row['kou_id']; ?></td>
            </tr>
            <tr>
                <th>顧客番号</th>
                <td><?php echo $row['member_id']; ?></td>
            </tr>
            <tr>
                <th>お支払い方法</th>
                <td><?php echo $row['pay']; ?></td>
            </tr>
                <th>お届け場所</th>
                <td>
                    〒<?php echo $row['place']; ?>
                    <br>    
                    <?php echo $row['live']; ?>
                </td>
            </tr>
        </table>
        <br>
        <table class="table-color">
            <tr>
                <th>商品ID</th><th>単価</th><th>購入数</th>
            </tr>
            <?php 
                $sql2=$pdo->query('select * from purchase_history where kou_id = '. $_POST['still']);
                $sum = 0;
                foreach($sql2 as $row2){
                    $sql3=$pdo->query('select * from product where product_id = '. $row2['product_id']);
                    $row3 = $sql3->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                    echo '<tr>';
                    echo '<td>', $row3['product_id'], '</td>';
                    echo '<td>', $row3['tanka'], '</td>';
                    echo '<td>', $row2['su'], '</td>';
                    $sum = $row3['tanka'] * $row2['su'];
                    echo '</tr>';
                }
            ?>
            
        </table>
        <br>
        <div class="total">商品合計　￥<?php echo $sum; ?></div>
        <br>
        <form action="shipping-ok.php" method="POST">
            <button name="kou_id" value="<?php echo $row['kou_id']; ?>">発送</button>
        </form>
        <br>
        <br>
        <a href="productlist.php">戻る</a>

    </div>
</body>
</html>