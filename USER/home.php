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
        header("Location: login.php");
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
?>
        <!DOCTYPE html>
        <html lang="ja">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/menu.css">
        <link rel="stylesheet" href="CSS/home.css">
        <link rel="stylesheet" href="CSS/header.css">
        <title>ホーム画面</title>
        </head>
        <body>
        <div class="Header">SWEETSTOWN</div><br>
        <div style="margin-top:20px;"><a href="seasonlist.php"><img class="img2" src="img/season.jpg"></a><br><br>
        <!-- <form action="cart.php" method="post"> -->
        <!-- <button type="submit">カート内商品一覧</button> -->
        <a href="cart.php" class="btn btn-tag"><i class="fas fa-shopping-cart"></i>カート内の商品</a>
        <!-- </form>--><br><br><br>

<?php
    $sql=$pdo->query('select * from product');
    $count=0;

    echo '<table>';
    foreach($sql as $row){
        $count++;
        // echo '<div class = "product_item">';
        if($count == 0){
            echo '<tr>';
        }
        echo '<td style="width:200px;">';
        echo '<a href="detail.php?product_id=',$row['product_id'],'"><img src="img/',$row['gazou'],'"></a>';
        echo '<br>',$row['product_mei'],'<br>','<font color="red">','¥',$row['tanka'],'</font>';;
        echo '</td>';
        if($count==3){
            echo '</tr>';
            $count=0;
        }
        // echo '</div>';
    }
        echo '</table>';
    }
?>
    </div>
    <footer><?php require 'menu.php';?></footer>
    </body>
</html>