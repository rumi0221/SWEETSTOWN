<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h4>パスワード再設定</h4>
    <form action="passwordagain-ok.html" method="post">

        <div class="content">
            <dl>
                <dt>メールアドレス</dt>
                <dd><input type="text" name="mall"></dd>
                <dt>新しいパスワード</dt>
                <dd><input type="text" name="newpass"></dd>
                <dt>新しいパスワード(確認)</dt>
                <dd><input type="text" name="newpass2"></dd>
            </dl>

            <p><button type="submit">登録</button></p>

            <a href="#" onclick="history.back(-1);return false;">戻る</a>
        </div>
    </form>
</body>
</html>