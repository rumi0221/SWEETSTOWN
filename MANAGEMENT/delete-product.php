<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>商品削除画面</title>
</head>
<body>
<div class="main">
        <h1>商品削除</h1>
        <table class="table-color">
            <form action="delete-product-ok.php" method="POST">
                <?php
                    $pdo=new PDO($connect,USER,PASS);
                    $sql=$pdo->prepare('select * from product where product_id=?');
                    $sql->execute([$_POST['delete']]);
                    $row = $sql->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                ?>
                <input type="hidden" name="product_id" value="<?php echo $_POST['delete']; ?>">
                <tr>
                    <th>商品名</th>
                    <td><?php echo $row['product_mei']; ?></td>
                    <input type="hidden" name="product_name" value="<?php echo $row['product_mei']; ?>">
                </tr>
                <tr>
                    <th>カテゴリ</th>
                    <td><?php echo $row['product_type']; ?></td>
                    <input type="hidden" name="category" value="<?php echo $row['product_type']; ?>">
                </tr>
                <tr>
                    <th>単価</th>
                    <td><?php echo $row['tanka']; ?></td>
                    <input type="hidden" name="price" value="<?php echo $row['tanka']; ?>">
                </tr>
                <tr>
                    <th>商品画像</th>
                    <td><?php echo $row['gazou']; ?></td>
                    <input type="hidden" name="image" value="<?php echo $row['gazou']; ?>">
                </tr>
                <tr>
                    <th>商品説明</th>
                    <td><?php echo $row['setumei']; ?></td>
                    <input type="hidden" name="explanation" value="<?php echo $row['setumei']; ?>">
                </tr>
                <tr>
                    <th>季節</th>
                    <td>
                        <?php echo $row['season']; ?>
                        <input type="hidden" name="season" value="<?php echo $row['season']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>店舗名</th>
                    <td>
                        <?php    
                            $pdo=new PDO($connect,USER,PASS);
                            $sql2=$pdo->query('select * from shop where shop_code like "' . $row['shop_code']. '"');
                            $row2 = $sql2->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                            echo $row2['shop_mei'];
                        ?>
                        <input type="hidden" name="shop_id" value="<?php echo $row['shop_code']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>在庫数</th>
                    <td>
                        <?php echo $row['zaiko']; ?>
                        <input type="hidden" name="stock" value="<?php echo $row['zaiko']; ?>">
                    </td>   
                </tr>
            </table>
                <br>
                <button type="submit">削除</button>
            </form>
            <br>
            <br>
            <a class="mdr" href="productlist.php">戻る</a>
    </div>

</body>
</html>