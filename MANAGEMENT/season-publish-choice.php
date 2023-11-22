<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/publish.css">
    <title>季節商品掲載選択画面</title>
</head>
<body>
    <div class="main">
        <div class="link">
            <form action="season-publish.php" method="POST">
                <button type="submit" name="season" value="spring">春の季節商品</button>
                <br>
                <br>
                <button type="submit" name="season" value="summer">夏の季節商品</button>
                <br>
                <br>
                <button type="submit" name="season" value="fall">秋の季節商品</button>
                <br>
                <br>
                <button type="submit" name="season" value="winter">冬の季節商品</button>
            </form>
            <br>
            <br>
            <br>
            <a class="mdr" href="publish.php">戻る</a>
        </div>
    </div>
</body>
</html>