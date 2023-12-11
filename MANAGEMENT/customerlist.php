<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>顧客一覧画面</title>
</head>
<body>
    <div class="main">
        <h1>顧客一覧</h1>
        <form action="customerlist.php" method="POST">
            <input type="text" name="mid" placeholder="顧客番号">
            <button type="submit">検索</button>
        </form>
        <table class="table-color">
            <thead>
                <tr>
                    <th>顧客番号</th><th>顧客者名</th><th>顧客者（フリガナ）</th><th>メールアドレス</th><th>パスワード</th>
                </tr>
            </thead>
            <tbody>
<?php
    $pdo=new PDO($connect,USER,PASS);
    //検索キーワードが入力されているか
    if(isset($_POST['mid'])){
        //商品名の部分一致検索
        $sql=$pdo->prepare('select * from member where member_id like ?');
        $sql->execute(['%'.$_POST['mid'].'%']);
    }else{
        //検索キーワードが入力されていない場合は、全件検索
        $sql=$pdo->query('select * from member');
    }
    echo '<form action="customer-infomation.php" method="POST">';
    foreach($sql as $row){
        echo '<tr>';
        /*顧客番号を押下することで、その番号の顧客情報が見れる*/
        echo '<td>', '<input class="btn" type="submit" name="id" value="', $row['member_id'], '">', '</td>';
        echo '<td>', $row['member_mei'], '</td><td>', $row['kana_mei'], '</td><td>', $row['mail'], '</td><td>', $row['pass'], '</td>';
        echo '</tr>';
    }
    echo '</form>';
?>
            </tbody>
        </table>
    </div>
</body>
</html>