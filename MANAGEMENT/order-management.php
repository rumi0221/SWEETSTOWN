<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/order.css">
    <title>受注管理画面</title>
</head>
<body>
    <div class="main">
        <h1>受注管理</h1>
        <table class="table-color">
            <thead>
                <tr>
                    <th>受注日</th><th>受注番号</th><th>顧客番号</th><th>発送</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from purchase');
                foreach($sql as $row){
                    $sql2=$pdo->query('select * from purchase_history where kou_id = '. $row['kou_id']);
                    $row2 = $sql2->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                    echo '<tr>';
                    echo '<td>', $row['datetime'], '</td>';
                    echo '<td>', $row2['kou_id'], '</td>';
                    echo '<td>', $row['member_id'], '</td>';
                    echo '<td>';
                        if( $row2['flg'] == 0 ){
                            echo '<form action="shipping-check.php" method="POST">';
                            echo '<button type="submit" name="still" value="', $row2['kou_id'], '">発送する</button>';
                            echo '</form>';
                        }else{
                            echo '済';
                        }
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>