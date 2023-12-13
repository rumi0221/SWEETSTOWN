<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワード再設定画面</title>
    <link rel="stylesheet" href="CSS/passwordagain.css">
</head>
<body>
    <h2>パスワード再設定</h2>
    <form action="passwordagain-ok.php" method="post">

        <div class="content">
            <dl>
                <dt>メールアドレス</dt>
                <dd><input type="text" name="mall" required="required"></dd>
                <dt>新しいパスワード</dt>
                <dd><input type="password" name="newpass" required="required"></dd>
                <dt>新しいパスワード(確認)</dt>
                <dd><input type="password" name="newpass2" required="required"></dd>
            </dl>

            <p><button type="submit">登録</button></p>

            <a href="#" onclick="history.back(-1);return false;">戻る</a>
        </div>
    </form>
</body>
</html>