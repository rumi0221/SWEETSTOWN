<?php session_start();?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
    <title>検索画面</title>
</head>
<body>
    <div class="Header">
        <a style="left: 0;top: 0;position: absolute;" onclick="history.back()"><i class="fas fa-angle-left fa-2x"></i></a>
        <span>SWEETSTOWN</span>
    </div>
    <div style="margin-top:70px;">
    <div class="search">
        <?php
            $pdo=new PDO($connect,USER,PASS);
            $sql=$pdo->query('select * FROM shop');
            foreach($sql as $row){
                echo '<button class="searchbutton" onclick="location.href=\'searchlist.php?shop=' . $row['shop_code'] . '\'">'.$row['shop_mei'].'</button><br>';
            }
        ?>
    </div>
    <footer><?php require 'menu.php';?></footer>
</body>
</html>