<?php session_start();?>
<?php require 'db-connect.php'; ?>
<?php
    unset($_SESSION['member']);
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from member where mail=? and pass=?');
    $sql->execute([$_POST['mail'],$_POST['pass']]);
    $count = $sql -> rowCount();
    if($count == 0){
        header("Location:login-input.php");
        exit;
    }else{
        echo '<!DOCTYPE html>';
        echo '<html lang="ja">';
        echo '<head>';
        echo '<link rel="stylesheet" href="CSS/header.css">';
        echo '<title>ホーム画面</title>';
        echo '</head>';
        echo '<body>';
        echo '<div class="Header">SWEETSTOWN</div><br>';
        echo '<div><br><a href="seasonlist.php"><img src="img/season.jpg"></a><br></div><br>';
        echo '<br>';
        echo '<form action="cart.php" method="post">';
        echo '<button type="submit">カート内商品一覧</button>';
        echo '</form><br>';
        $sql=$pdo->query('select * from product');
        $count=0;
        foreach($sql as $row){
            $count++;
            echo '<div class = "product_item">';
            echo '<a href="detail.php"><img src="img/',$row['gazou'],'"></a>';
            echo '<br>';
            cho "<span>",$row['product_mei'],$row['tanka'],"</span>";
            if($count==3){
                echo '<br>';
                $count=0;
            }
            echo '</div>';
        }
        echo '</body>';
        echo '</html>';
    }
?>