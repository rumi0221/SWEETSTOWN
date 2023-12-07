<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/publish.css">
    <title>季節商品掲載完了画面</title>
</head>
<body>
    <div class="main">
        <div class="link">
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('update product set season_flg = 0');
                $sql2=$pdo->query('update product set season_flg = 1 where season = "'.$_POST['sflg'].'"');
            ?>
                <p>季節商品の掲載が完了しました</p>
                <br>
                <a href="administrato-home.php">ホームへ</a>
        </div>
    </div>
</body>
</html>