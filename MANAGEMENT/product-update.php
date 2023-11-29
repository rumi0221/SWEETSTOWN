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
            <form action="product-registration-check.php" method="POST">
                <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from product where product_id = '. $_POST['update']);
                ?>
                <tr>
                    <th>商品名</th>
                    <td><input type="text" name="product_name"/><?php $sql['product_mei'] ?></td>
                </tr>
                <tr>
                    <th>カテゴリ</th>
                    <td><input type="text" name="category"></td>
                </tr>
                <tr>
                    <th>単価</th>
                    <td><input type="text" name="price"></td>
                </tr>
                <tr>
                    <th>商品画像</th>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <th>商品説明</th>
                    <td><input type="text" name="explanation"></td>
                </tr>
                <tr>
                    <th>季節</th>
                    <td>
                        <select name="season">
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
                        <select name="shop_name">
                            <?php
                                $pdo=new PDO($connect,USER,PASS);
                                $sql=$pdo->query('select * from shop');
                                foreach($sql as $row){
                                    echo '<option>', $row['shop_mei'], '</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>在庫数</th>
                    <td><input type="text" name="stock"></td>
                </tr>
            </table>
                <br>
                <button type="submit">登録確認</button>
            </form>
            <br>
            <br>
            <a href="productlist.php">戻る</a>
    </div>
</body>
</html>