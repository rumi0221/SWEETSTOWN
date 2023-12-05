<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/product.css">
    <title>商品更新画面</title>
</head>
<body>
    <div class="main">
        <h1>商品更新</h1>
        <table class="table-color">
            <form action="product-update-check.php" method="POST">
                <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->prepare('select * from product where product_id=?');
                $sql->execute([$_POST['update']]);
                $row = $sql->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                ?>
                <input type="hidden" name="product_id" value="<?php echo $_POST['update']; ?>">
                <tr>
                    <th>商品名</th>
                    <td><input type="text" class="textw" name="product_name" required value="<?php echo $row['product_mei'] ?>"></td>
                </tr>
                <tr>
                    <th>カテゴリ</th>
                    <td><input type="text" class="textw" name="category" required value="<?php echo $row['product_type'] ?>"></td>
                </tr>
                <tr>
                    <th>単価</th>
                    <td><input type="text" class="textw" name="price" required value="<?php echo $row['tanka'] ?>"></td>
                </tr>
                <tr>
                    <th>商品画像</th>
                    <td>現在登録されている画像です：<?php echo $row['gazou']; ?><br>
                        <input type="file" class="textw" name="image" required value="<?php echo $row['gazou'] ?>"></td>
                </tr>
                <tr>
                    <th>商品説明</th>
                    <td><textarea class="textw" type="text" name="explanation" rows="4" required><?php echo $row['setumei'] ?></textarea></td>
                </tr>
                <tr>
                    <th>季節</th>
                    <td>
                        <select class="textw" name="season">
                            <option value="<?php echo $row['season'] ?>"><?php echo $row['season'] ?></option>
                            <option value="春">春</option>
                            <option value="夏">夏</option>
                            <option value="秋">秋</option>
                            <option value="冬">冬</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>店舗名</th>
                    <td>
                        <select class="textw" name="shop_name">
                            <?php
                                $pdo=new PDO($connect,USER,PASS);
                                $sql2=$pdo->query('select * from shop where shop_code like "' . $row['shop_code']. '"');
                                $row2 = $sql2->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                                echo '<option>', $row2['shop_mei'], '</option>';
                                $sql3=$pdo->query('select * from shop');
                                foreach($sql3 as $row3){
                                    echo '<option>', $row3['shop_mei'], '</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>在庫数</th>
                    <td><input type="text" class="textw" name="stock" required value="<?php echo $row['zaiko'] ?>"></td>
                </tr>
            </table>
                <br>
                <button type="submit">変更確認</button>
            </form>
            <br>
            <br>
            <a href="productlist.php">戻る</a>
    </div>
</body>
</html>