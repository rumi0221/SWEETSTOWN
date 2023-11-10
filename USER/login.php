<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
unset($_SESSION['member']);
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from member where mail=? and pass=?');
$sql->execute([$_POST['mail'],$_POST['pass']]);
foreach ($sql as $row){
    $_SESSION['member']=[
        'member_id'=>$row['member_id'],'member_mei'=>$row['mrmber_mei'],
        'kana_mei'=>$row['kana_mei'],'mail'=>$row['mail'],
        'pass'=>$row['pass']
    ];
    if (isset($_POST['login'])) {
        $cookie_value = serialize($_SESSION['member']);
        setcookie('login_me_cookie', $cookie_value, time() + (86400 * 30), "/"); // 30日間のクッキーを設定
    }

    header("Location: home.html");
    exit();
}

?>
