<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup-check.css">
    <title>登録確認画面</title>
</head>
<body>
    
    <div style="text-align: center">
    <form action="signup-ok.php" method="post">
    <h1>登録確認</h1>
    <hr>
    <?php
    echo '<dl>';
        echo '<dt>名前</dt>';
        echo '<dd>',$_POST['name1'],'</dd>';
        echo '<dt>名前(フリガナ)</dt>';
        echo '<dd>',$_POST['name2'],'</dd>';
        echo '<dt>メールアドレス</dt>';
        echo '<dd>',$_POST['address'],'</dd>';
        echo '<dt>パスワード</dt>';
        echo '<dd>',$_POST['password'],'</dd>';
        echo '</dl>';
    ?>
    <input type="hidden" name="name1"  value="<?= $_POST['name1'] ?>">
    <input type="hidden" name="name2" value="<?= $_POST['name2'] ?>">
    <input type="hidden" name="address" value="<?= $_POST['address'] ?>">
    <input type="hidden" name="password" value="<?= $_POST['password'] ?>">
    <p>記入情報にお間違いないですか？<br>
        よろしければ、登録ボタンを押下してください。</p>
    <p><button type="submit">登録</button></p>
</from>
<a href="login.html">戻る</a>
</div>
</body>
</html>