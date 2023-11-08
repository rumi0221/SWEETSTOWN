<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
  $pdo=new PDO($connect,USER,PASS);
  $sql=$pdo->prepare('insert into member values(null,?,?,?,?)');
  $sql->execute([$_POST['name1'],$_POST['name2'],$_POST['address'],$_POST['password']]);
  ?>
  <form action="login.php" method="post">
    <h1>登録が完了しました</1><br>

    <p><img alt="img" src="img/check.png"></p>
    <a href="login-input.php">ログイン画面へ</a>
  </form>
</body>
</html>