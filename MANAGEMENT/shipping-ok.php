<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/order.css">
    <title>発送完了画面</title>
</head>
<body>
    <div class="main">
        <div class="link">
            <?php 
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from purchase_history where kou_id = '. $_POST['kou_id']);
                foreach($sql as $row){
                    $row['flg'] = 1;
                }
            ?>
            <p>発送が完了しました</p>
            <a href="administrato-home.php">ホームへ</a>
        </div>
    </div>
</body>
</html>