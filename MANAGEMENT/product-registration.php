<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/product.css">
    <title>商品登録画面</title>
</head>
<body>
    <div class="main">
        <h1>商品登録</h1>
        <form action="product-registration-check.html" method="POST">
        <table class="table-color">
            <form action="product-registration-check.php" method="POST">
                <tr>
                    <th>商品名</th>
                    <td><input type="text" name="productname"></td>
                </tr>
                <tr>
                    <th>カテゴリ</th>
                    <td>
                        <select name="category">
                            <option></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>単価</th>
                    <td><input type="text" name="price"></td>
                </tr>
                <tr>
                    <th>商品画像</th>
                    <td></td>
                </tr>
                <tr>
                    <th>商品説明</th>
                    <td></td>
                </tr>
                <tr>
                    <th>季節</th>
                    <td>
                        <select name="season">
                            <option value="spring">春</option>
                            <option value="summer">夏</option>
                            <option value="fall">秋</option>
                            <option value="winter">冬</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>店舗名</th>
                    <td>
                        <select name="">
                            <option></option>
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
            <a href="productlist.php">戻る</a>
    </div>
</body>
</html>