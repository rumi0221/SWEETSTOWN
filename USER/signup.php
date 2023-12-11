<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録画面</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <h2>新規登録</h2>

    <hr size="1">
    <div class="content">
    <form action="signup-check.php" method="post">
        <dl>
            <dt>名前<span class="required">＊必須</span></dt>
            <dd><input type = "text" name = "name1"></dd>
            <dt>名前(フリガナ)<span class="required">＊必須</span></dt>
            <dd><input type = "text" name = "name2"></dd>
            <dt>メールアドレス<span class="required">＊必須</span></dt>
            <dd><input type = "text" name = "address"></dd>
            <dt>パスワード<span class="required">＊必須</span></dt>
            <dd><input type = "password" name = "password"></dd>
        </dl>

        <p><button type="submit">確認画面へ</button></p>

        <a href="#" onclick="history.back(-1);return false;">戻る</a>
       
    </div>
    </form>



    

</body>
</html>