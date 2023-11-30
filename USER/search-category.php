<?php session_start();?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/search.css">

    <title>検索画面</title>
</head>
<body>
    <div class="Header">
        SWEETSTOWN
    </div>
    <div class="search">
        <?php
            $pdo=new PDO($connect,USER,PASS);
            $sql=$pdo->query('select distinct product_type FROM product');
            foreach($sql as $row){
                echo '<button onclick="location.href=\'searchlist.php?id=' . $row . '\'">'.$row.'</button>';
            }
        ?>
    </div>
    <footer><?php require 'menu.php';?></footer>
</body>
</html>