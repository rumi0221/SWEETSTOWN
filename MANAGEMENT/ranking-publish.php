<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/publish.css">
    <title>ランキング掲載画面</title>
</head>
<body>
    <div class="main">
        <h1>ランキング</h1>
        <table>
            <tr>
                <th></th><th>商品名</th><th>売上件数</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <br>
        <br>
        <form action="ranking-publish-ok.php">
            <input type="submit" value="掲載">
        </form>
        <a class="mdr" href="publish.php">戻る</a>
    </div>
</body>
</html>