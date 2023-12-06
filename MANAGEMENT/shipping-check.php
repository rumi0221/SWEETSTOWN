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
        <table>
            <tr>
                <th>受注日</th>
                <td></td>
            </tr>
            <tr>
                <th>注文番号</th>
                <td></td>
            </tr>
            <tr>
                <th>顧客番号</th>
                <td></td>
            </tr>
            <tr>
                <th>お支払い方法</th>
                <td></td>
            </tr>
                <th>お届け場所</th>
                <td></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <th>商品ID</th><th>単価</th><th>購入数</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        
        <p>商品合計　￥</p>

        <button>発送</button>

        <a href="productlist.php">戻る</a>

    </div>
</body>
</html>