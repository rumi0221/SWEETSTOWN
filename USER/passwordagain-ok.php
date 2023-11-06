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
        $sql=$pdo->prepare('select member_id from member where mail = ?');
        $sql->execute([$_POST['mall']]);
        $count = $sql -> rowCount();
        if($count == 1){
            $sql=$pdo->prepare('update member set pass = ? where mail = ?');
            $sql->execute([$_POST['newpass'],$_POST['mall']]);
            echo '<p>新しいパスワードが設定されました</p>';
            echo '<a href="login-input.php">ログイン画面へ</a>';
        }else if($count == 0){
            echo '<font color="red">入力されたメールアドレスが正しくありません</font>';
        }
    }else{
        echo '<font color="red">入力されたパスワードが等しくありません</font>';
    }
    ?>
</body>
</html>