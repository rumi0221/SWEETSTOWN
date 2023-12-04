<?php session_start();?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
    <html lang="ja">
    <head>
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/header.css">
    <title>ホーム画面</title>
    </head>
    <body>
        <div class="Header">SWEETSTOWN</div><br>
        <div style="margin-top:60px;"><a href="seasonlist.php"><img src="img/season.jpg"></a><br>
            <form action="cart.php" method="post">
                <button type="submit">カート内商品一覧</button>
            </form><br>
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from product');
                $count=0;
                echo '<table>';
                echo '<tr><th></th><th></th><th></th></tr>';
                foreach($sql as $row){
                    $count++;
                    echo '<div class = "product_item">';
                    if($count == 0){
                        echo '<tr>';
                    }
                    echo '<td style="width:100px;">';
                    echo '<a href="detail.php?product_id=',$row['product_id'],'"><img src="img/',$row['gazou'],'"></a>';
                    echo '<br>',$row['product_mei'],'<br>',$row['tanka'];
                    echo '</td>';
                    if($count==3){
                        echo '</tr>';
                        $count=0;
                    }
                    echo '</div>';
                }
                echo '</table>';
            ?>
        </div>
        <footer><?php require 'menu.php';?></footer>
    </body>
</html>