<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>商品登録確認画面</title>
</head>
<body>
<div class="main">
        <h1>商品登録</h1>
        <table class="table-color">
            <form action="product-registration-ok.php" method="POST">
                <tr>
                    <th>商品名</th>
                    <td><?php echo $_POST['product_name']; ?></td>
                    <input type="hidden" name="product_name" value="<?php echo $_POST['product_name']; ?>">
                </tr>
                <tr>
                    <th>カテゴリ</th>
                    <td><?php echo $_POST['category']; ?></td>
                    <input type="hidden" name="category" value="<?php echo $_POST['category']; ?>">
                </tr>
                <tr>
                    <th>単価</th>
                    <td><?php echo $_POST['price']; ?></td>
                    <input type="hidden" name="price" value="<?php echo $_POST['price']; ?>">
                </tr>
                <tr>
                    <th>商品画像</th>
                    <td><?php echo $_POST['image']; ?></td>
                    <input type="hidden" name="image" value="<?php echo $_POST['image']; ?>">
                </tr>
                <tr>
                    <th>商品説明</th>
                    <td><?php echo $_POST['explanation']; ?></td>
                    <input type="hidden" name="explanation" value="<?php echo $_POST['explanation']; ?>">
                </tr>
                <tr>
                    <th>季節</th>
                    <td>
                        <?php echo $_POST['season']; ?>
                        <input type="hidden" name="season" value="<?php echo $_POST['season']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>店舗名</th>
                    <td>
                        <?php echo $_POST['shop_name']; ?>
                        <input type="hidden" name="shop_id" value="
                            <?php
                                $pdo=new PDO($connect,USER,PASS);
                                // $sql=$pdo->query('select * from shop where shop_mei like '. $_POST['shop_name']);
                                $sql=$pdo->query('select * from shop where shop_mei like "'. $_POST['shop_name']. '"');
                                $row = $sql->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                                echo $row['shop_code'];
                            ?>
                        ">
                            
                    </td>
                </tr>
                <tr>
                    <th>在庫数</th>
                    <td>
                        <?php echo $_POST['stock']; ?>
                        <input type="hidden" name="stock" value="<?php echo $_POST['stock']; ?>">
                    </td>   
                </tr>
            </table>
                <br>
                <button type="submit">登録</button>
            </form>
            <br>
            <br>
            <a href="product-registration.php">戻る</a>
    </div>
</body>
</html>