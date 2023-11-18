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
            <p>顧客番号：XXX1</p>
        </div>
        <br>
        <div>
            <p class="under">カート内商品</p>
            <table>
                <tr>
                    <th>商品ID</th><th>商品名</th><th>ショップ名</th><th>価格</th><th>数量</th>
                </tr>
                <tr>
                    <td></td><td></td><td></td><td></td><td></td>
                </tr>
            </table>
        </div>
        <br>
        <div>
            <p><span class="under">購入履歴</span></p>
            <table>
                <tr>
                    <th>購入ID</th><th>商品ID</th><th>商品名</th><th>購入日時</th>
                </tr>
                <tr>
                    <td></td><td></td><td></td><td></td>
                </tr>
            </table>
        </div>
        <a href="customerlist.php">戻る</a>
    </div>
</body>
</html>