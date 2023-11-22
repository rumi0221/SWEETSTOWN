<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>受注管理画面</title>
</head>
<body>
    <div class="main">
        <h1>受注管理</h1>
        <table>
            <tr>
                <th>受注日</th><th>受注番号</th><th>顧客番号</th><th>購入額</th><th>お支払い方法</th><th>発送</th>
            </tr>
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from purchase');
                echo '<form action="shipping-check.php" method="POST">';
                forech($row as $sql){
                    $sql2=$pdo->query('select * from purchase_history where kou_id '.$row['kou_id']);
                    echo '<tr>';
                    echo '<td>', $row['datetime'], '</td>';
                    echo '<td>', $row['kou_id'], '</td>';
                    echo '<td>', $row['member_id'], '</td>';
                    echo '<td>', 
                    echo '<td>', $row['pay'], '</td>';
                    echo '<td>';
                        if( $sql2['fig'] == 0 ){
                            echo '未';
                        }else{
                            echo '済';
                        }
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </div>
</body>
</html>