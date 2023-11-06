<?php session_start();?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワード再設定完了画面</title>
</head>
<body>
    <?php
    $pdo=new PDO($connect,USER,PASS);
    if(strcmp($_POST['newpass'],$_POST['newpass2']) == 0){
        $sql=$pdo->prepare('update member set pass = ? where mail = ?');
        $sql->execute([$_POST['newpass'],$_POST['mail']]);
        echo '<p>新しいパスワードが設定されました</p>';
        echo '<a href="login-input.php">ログイン画面へ</a>';
    }else{
        echo '<font color="red">入力されたパスワードが等しくありません</font>';
    }
    ?>
</body>
</html>