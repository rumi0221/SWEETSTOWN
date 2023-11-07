<?php session_start();?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">

    <title>ホーム画面</title>
</head>
<body>
    <?php
    unset($_SESSION['member']);
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from member where mail=? and pass=?');
    $sql->execute([$_POST['mail'],$_POST['pass']]);
    $count = $sql -> rowCount();
    if($count != 0){
        echo '<div class="Header">SWEETSTOWN</div><br>';
        echo '<div><br><a href="seasonlist.php"><img src="img/season.jpg"></a><br></div><br>';
    }else{
        header('https://aso2301331.noor.jp/Githab/ejima/SWEETSTOWN/USER/login-input.php');
        exit;
    }
    ?>
    

</body>
</html>