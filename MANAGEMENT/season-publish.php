<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/publish.css">
    <title>季節商品掲載画面</title>
</head>
<body>
    <div class="main">
        <?php
            $season = $_POST['season'];
            echo '<h1>';
            $s = "";
            switch($season){
                case 'spring':
                    echo '春';
                    $s = '春';
                    break;
                case 'summer':
                    echo '夏';
                    $s = '夏';
                    break;
                case 'fall':
                    echo '秋';
                    $s = '秋';
                    break;
                case 'winter':
                    echo '冬';
                    $s = '冬';
                    break;
            }  
            echo 'の季節商品</h1>';
        ?>
        <br>
        <table class="table-color">
            <tr>
                <th>商品ID</th><th>商品名</th><th>カテゴリ</th><th>単価</th><th>商品説明</th><th>商品画像</th><th>総購入数</th><th>季節</th><th>在庫数</th><th>店舗名</th>
            </tr>
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from product where season = "'.$s.'"');
                foreach($sql as $row){
                    echo '<tr>',
                         '<td>', $row['product_id'], '</td>',
                         '<td>', $row['product_mei'], '</td>',
                         '<td>', $row['product_type'], '</td>',
                         '<td>', $row['tanka'], '</td>',
                         '<td>', $row['setumei'], '</td>',
                         '<td>', $row['gazou'], '</td>',
                         '<td>', $row['total_su'], '</td>',
                         '<td>', $row['season'], '</td>',
                         '<td>', $row['zaiko'], '</td>';
                    $sql2 = $pdo->query('select * from shop where shop_code = '. $row['shop_code']);
                    $row2 = $sql2->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                    echo '<td>', $row2['shop_mei'], '</td>'; 
                    echo '</tr>';
                }
            ?>
        </table>
        <br>
        <br>
        <form action="season-publish-ok.php" method="POST">
            <input type="hidden" name="sflg" value="<?php echo $s; ?>">
            <input type="submit" value="掲載">
        </form>
        <br>
        <a class="mdr" href="season-publish-choice.php">戻る</a>
    </div>
</body>
</html>