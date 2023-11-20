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
        
        <input type="text" name="mid" placeholder="顧客番号">
        <br>
        <br>
        <table class="table-color">
            <tr>
                <th>顧客番号</th><th>顧客者名</th><th>顧客者（フリガナ）</th><th>メールアドレス</th><th>パスワード</th>
            </tr>
<?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->query('select * from member');
    echo '<form action="customer-infomation.php" method="POST">';
    foreach($sql as $row){
        echo '<tr>';
        /*顧客番号を押下することで、その番号の顧客情報が見れる*/
        echo '<td>', '<input type="submit" name="id" value="', $row['member_id'], '">', '</td>';
        echo '<td>', $row['member_mei'], '</td><td>', $row['kana_mei'], '</td><td>', $row['mail'], '</td><td>', $row['pass'], '</td>';
        echo '</tr>';
    }
    echo '</form>';
?>
        </table>
    </div>
</body>
</html>