<?php session_start();?>
<?php require 'db-connect.php'; ?>
<?php
    unset($_SESSION['member']);
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from member where mail=? and pass=?');
    $sql->execute([$_POST['mail'],$_POST['pass']]);
    $count = $sql -> rowCount();
    if($count == 0){
        header("Location: login.php");
        exit;
    }else{
        echo '<!DOCTYPE html>';
        echo '<html lang="ja">';
        echo '<head>';
        echo '<link rel="stylesheet" href="css/header.css">';

        echo '<title>ホーム画面</title>';
        echo '</head>';
        echo '<body>';

        echo '</body>';
        echo '</html>';
        echo '<div class="Header">SWEETSTOWN</div><br>';
        echo '<div><br><a href="seasonlist.php"><img src="img/season.jpg"></a><br></div><br>';
    }
?>