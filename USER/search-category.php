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
    <title>検索画面</title>
</head>
<body>
    <div class="Header">
        SWEETSTOWN
    </div>
        <?php
            $pdo=new PDO($connect,USER,PASS);
            $sql=$pdo->query('select distinct product_type FROM product');
            $i = 0;
            foreach($sql as $row){
                echo '<div class="search">';
                if($i == 0){
                    echo '<button onclick="location.href=\'searchlist.php?type=' . $row['product_type'] . '\'" style="margin-top:50px;">'.$row['product_type'].'</button><br>';
                    $i += 1;
                }else{
                    echo '<button onclick="location.href=\'searchlist.php?type=' . $row['product_type'] . '\'">'.$row['product_type'].'</button><br>';
                }
                echo '</div>';
            }
        ?>
    </div>
    <footer><?php require 'menu.php';?></footer>
</body>
</html>