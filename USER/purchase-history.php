<?php session_start(); ?>
<?php require 'db-connect.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/purchase-history.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <title>購入履歴画面</title>
</head>
<body>
    <div class="Header">SWEETSTOWN</div>
    <div class="hed">
        <h1>購入履歴</h1>
    </div>
    <div class="shohin">
        <div class="shohin-rireki">
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->prepare('select * from purchase where member_id = ?');
                $sql->execute([$_SESSION['member']['member_id']]);
                foreach($sql as $row){
                    $spl=$pdo->prepare('select * from purchase_history where kou_id = ?');
                    $spl->execute([$row['kou_id']]);
                    foreach($spl as $wow){
                        $sol=$pdo->prepare('select * from product where product_id = ?');
                        $sol->execute([$wow['product_id']]);
                        foreach($sol as $tow){
                            echo '<div class="columns is-mobile">';
                            echo '<div class="column is-narrow">';
                            echo '<figure class="image is-128x128">';
                            echo '<a href="detail.php"><img src="img/',$tow['gazou'],'"></a>';
                            echo '</figure>';
                            echo '</div>';
                            echo '<div class="column"';
                            echo '<p>',$tow['product_mei'],'</p>';
                            echo '<p>購入日時：',$row['datetime'],'</p>';
                            if($wow['flg'] == 0){
                                echo '<p>発送準備中</p>';
                            }else{
                                echo '<p>発送済み</p>';
                            }
                            echo '<p><a href="review.php?id=',$tow['product_id'],'">レビューを書く</a></p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                }
            ?>
        </div>
        <footer><?php require 'menu.php';?></footer>
    </div>
</body>
</html>