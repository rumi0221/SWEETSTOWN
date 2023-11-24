<?php
session_start();
require 'db-connect.php';

if (isset($_POST['mail']) && isset($_POST['pass'])) {
    $pdo = new PDO($connect, USER, PASS);

    $sql = $pdo->prepare('SELECT * FROM member WHERE mail = ?');
    $sql->execute([$_POST['mail']]);
    
    $row = $sql->fetch();

    if ($row && password_verify($_POST['pass'], $row['pass'])) {
        $_SESSION['member'] = [
            'member_id' => $row['member_id'],
            'member_mei' => $row['mrmber_mei'],
            'kana_mei' => $row['kana_mei'],
            'mail' => $row['mail'],
            'pass' => $row['pass']
        ];

        if (isset($_POST['login'])) {
            $cookie_value = base64_encode(serialize($_SESSION['member']));
            setcookie('login_me_cookie', $cookie_value, time() + (86400 * 30), "/", "", false, true); // HTTP-only cookie
        }

        header("Location: home.php");
        exit();
    }
}
?>

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
    <form action = "home.php" method = "post">
        
    <dl>
        <dt>メールアドレス</dt>
        <dd><input type = "text" name = "mail" size="25"></dd>
        <dt>パスワード</dt>
        <dd><input type = "password" name = "pass" size="25"></dd>
    </dl>
    <p><input type = "checkbox" name = "login">
    ログイン状態を保持する</p>

    <p><button type = "submit">ログイン</button></p>
<p>
    <a href="passwordagain.html">パスワードを忘れた方</a><br>
    <a href="signup.html">新規登録</a>
</p>
</div>

</form>

</body>
</html>