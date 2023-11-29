<?php session_start();?>
<?php require 'db-connect.php'; ?>
<?php
    if(!isset($_SESSION['member'])){
        $_SESSION['member']=['mail'=>$_POST['mail'],'pass'=>$_POST['pass']];
    }
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from member where mail=? and pass=?');
    $sql->execute([$_SESSION['member']['mail'],$_SESSION['member']['pass']]);
    $count = $sql -> rowCount();
    if($count == 0 && !isset($_SESSION['member']['id'])){
        unset($_SESSION['member']);
        header("Location: login-input.php");
        exit;
    }else{
        unset($_SESSION['member']);
        foreach ($sql as $row){
            $_SESSION['member']=[
                'member_id'=>$row['member_id'],'member_mei'=>$row['member_mei'],
                'kana_mei'=>$row['kana_mei'],'mail'=>$row['mail'],
                'pass'=>$row['pass']
            ];
            if (isset($_POST['login'])) {
                $cookie_value = serialize($_SESSION['member']);
                setcookie('login_me_cookie', $cookie_value, time() + (86400 * 30), "/"); // 30日間のクッキーを設定
            }
        
        }
        echo '<!DOCTYPE html>';
        echo '<html lang="ja">';
        echo '<head>';
        echo '<link rel="stylesheet" href="CSS/menu.css">';
        echo '<link rel="stylesheet" href="CSS/home.css">';
        echo '<link rel="stylesheet" href="CSS/header.css">';
        echo '<title>ホーム画面</title>';
        echo '</head>';
        echo '<body>';
        echo '<div class="Header">SWEETSTOWN</div><br>';
        echo '<div style="margin-top:60px;"><a href="seasonlist.php"><img src="img/season.jpg"></a><br>';
        echo '<form action="cart.php" method="post">';
        echo '<button type="submit">カート内商品一覧</button>';
        echo '</form><br>';
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
            echo '<td>';
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
    }
    ?>
    </div>
    <footer><?php require 'menu.php';?></footer>
    </body>
</html>