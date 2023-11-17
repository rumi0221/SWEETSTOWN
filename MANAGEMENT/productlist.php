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
        <button class="registration">商品登録</button>
        <br>
        <table class="table-color">
            <tr>
                <th>商品ID</th><th>商品名</th><th>カテゴリ</th><th>単価</th><th>商品説明</th><th>商品画像</th><th>総購入数</th><th>季節</th><th>在庫</th><th>店舗名</th><th></th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button name="update">更新</button>
                    <button name="delete">削除</button>
                </td>
            <tr>
        </table>
    </div>
</body>
</html>