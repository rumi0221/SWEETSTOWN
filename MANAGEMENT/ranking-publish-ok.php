<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/publish.css">
    <title>ランキング掲載完了画面</title>
</head>
<body>
    <div class="main">
        <div class="link">
            <?php
                $ranking=0;
                $hoz=0;
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from product ORDER BY total_su desc limit 10');
                foreach($sql as $row){
                    if($hoz != $row['total_su']){
                        $ranking++;
                    }
                    $sol=$pdo->prepare('update product set rank = ? where product_id = ?');
                    $sol->execute([$ranking,$row['product_id']]);
                    $hoz=$row['total_su'];
                }
            ?>
            <p>ランキングの掲載が完了しました</p>
            <br>
            <a href="administrato-home.php">ホームへ</a>
        </div>
    </div>
</body>
</html>