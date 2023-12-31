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
        <div style="margin-bottom: 100px"><a href="seasonlist.php">
            <?php
                $spp=$pdo->query('select distinct season from product where season_flg <> 0');
                $coun=$spp->rowCount();
                foreach($spp as $owo){
                    if($coun >= 2){
                        echo 'エラーが発生しています';
                    }else if($owo['season'] == '春'){
                        echo '<div style="margin-top:60px;"><a href="seasonlist.php"><img src="img/spring.png"></a><br>';
                    }else if($owo['season'] == '夏'){
                        echo '<div style="margin-top:60px;"><a href="seasonlist.php"><img src="img/summer.png"></a><br>';
                    }else if($owo['season'] == '秋'){
                        echo '<div style="margin-top:60px;"><a href="seasonlist.php"><img src="img/fall.png"></a><br>';
                    }else if($owo['season'] == '冬'){
                        echo '<div style="margin-top:60px;"><a href="seasonlist.php"><img src="img/winter.png"></a><br>';
                    }else{
                        echo 'エラーが発生しました。';
                    }
                }
            ?>
        </a><br><br>
        <a href="cart.php" class="btn btn-tag"><i class="fas fa-shopping-cart"></i>カート内の商品</a>
        <br><br><br>

<?php
    echo '<h3 style="margin-bottom: 0/">　商品一覧</h3>';
    echo '<hr><br>';
    $sql=$pdo->query('select * from product where delete_flg = 0');
    $count=0;

    echo '<table>';
    foreach($sql as $row){
        $count++;

        if($count == 0){
            echo '<tr>';
        }
        echo '<td style="width:200px; margin-top: 0;">';
        echo '<a href="detail.php?product_id=',$row['product_id'],'"><img src="img/',$row['gazou'],'" height="50px"></a>';
        echo '<br>',$row['product_mei'],'<br>','<font color="red">','¥',$row['tanka'],'</font>';
        echo '</td>';
        if($count==3){
            echo '</tr>';
            $count=0;
        }
    }
        echo '</table>';
    }
?>
    </div>
    <footer><?php require 'menu.php';?></footer>
    </body>
</html>