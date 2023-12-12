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
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
    <title>購入履歴画面</title>
</head>
<body>
    <div class="Header">
    <a style="left: 0;top: 0;position: absolute;" onclick="history.back()"><i class="fas fa-angle-left fa-2x"></i></a>    
    SWEETSTOWN</div><br>
    <div class="hed">
        <h1>購入履歴</h1>
        <hr width="90%" noshade><br>
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
                            echo '<div class="product-info">';
                            echo '<a href="detail.php?product_id=',$tow['product_id'],'"><img src="img/',$tow['gazou'],'"></a>';
                            echo '<div>';
                            echo '<p>',$tow['product_mei'],'</p>';
                            echo '<p>購入日時：',$row['datetime'],'</p>';
                            if($wow['flg'] == 0){
                                echo '<p>発送準備中</p>';
                            }else{
                                echo '<p>発送済み</p>';
                            }
                            echo '<p><a href="review.php?id=',$tow['product_id'],'">レビューを書く</a></p></div>';
                            echo '</div>';
                        }
                    }
                }
            ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        </div>
        <footer><?php require 'menu.php';?></footer>
    </div>
</body>
</html>