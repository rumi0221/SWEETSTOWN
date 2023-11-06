<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>パスワード再設定</h4><br>
    <form action="passwordagain-ok.php" method="post">
        <p>メールアドレス</p>
        <input type="text" name="mail"><br><br>
        <p>新しいパスワード</p>
        <input type="pass" name="newpass"><br><br>
        <p>新しいパスワード（確認）</p>
        <input type="pass" name="newpassok">
        <button type="submit">登録</button>
    </form>
</body>
</html>