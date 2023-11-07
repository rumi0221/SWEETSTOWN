<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>ログイン画面</title>
</head>
<body>
<h2>ログイン</h2>
<hr>

<div class="content">
    <form action = "home.html" method = "post">
        
    <dl>
        <dt>メールアドレス</dt>
        <dd><input type = "text" name = "mail" size="25"></dd>
        <dt>パスワード</dt>
        <dd><input type = "text" name = "pass" size="25"></dd>
    </dl>
    <p><input type = "checkbox" name = "login">
    ログイン状態を保持する</p>

    <p><button type = "submit">ログイン</button></p>
<p>
    <a href="passwordagain.html">パスワードを忘れた方</a><br>
    <a href="passwordagain.html">新規登録</a>
</p>
</div>

</form>

</body>
</html>