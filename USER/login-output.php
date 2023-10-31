<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
unset($_SESSION['member']);
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from session where mail=? and pass=?');
$sql->execute([$_POST['mail'],$_POST['pass']]);
foreach ($sql as $row){
    $_SESSION['member']=[
        'member_id'=>$row['member_id'],'member_mei'=>$row['name'],
        'address'=>$row['address'],'login'=>$row['login'],
        'password'=>$row['password']];
}
if (isset($_SESSION['session'])){
    
    echo 'いらっしゃいませ、',$_SESSION['member']['member_mei'],'さん。';
} else {
    echo 'ログイン名またはパスワードが違います。';
}
?>