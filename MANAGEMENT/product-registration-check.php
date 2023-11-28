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
                </tr>
                <tr>
                    <th>カテゴリ</th>
                    <td><?php echo $_POST['category']; ?></td>
                </tr>
                <tr>
                    <th>単価</th>
                    <td><?php echo $_POST['price']; ?></td>
                </tr>
                <tr>
                    <th>商品画像</th>
                    <td><?php echo $_POST['image']; ?></td>
                </tr>
                <tr>
                    <th>商品説明</th>
                    <td><?php echo $_POST['explanation']; ?></td>
                </tr>
                <tr>
                    <th>季節</th>
                    <td>
                        <?php echo $_POST['season']; ?>
                    </td>
                </tr>
                <tr>
                    <th>店舗名</th>
                    <td>
                        <?php echo $_POST['shop_name']; ?>
                    </td>
                </tr>
                <tr>
                    <th>在庫数</th>
                    <td><?php echo $_POST['stock']; ?></td>
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