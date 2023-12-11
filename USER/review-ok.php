<?php session_start();?>
<?php require 'db-connect.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レビュー完了画面</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/review.css">
</head>
<?php 
    $pdo=new PDO($connect,USER,PASS);
// レビューテーブルに自分のデータがあるかないか？

    $sql2=$pdo->prepare('select count(*) from review where member_id = ? and product_id = ?');
    $sql2->execute([$_SESSION['member']['member_id'],$_POST['product_id']]);
    $count = $sql2->fetchColumn();

    // データベースにレビューがない場合：登録処理
    if($count == 0){
        
        $sql=$pdo->prepare('INSERT INTO review values(?,?,?,?,?)');
        $sql->execute([$_SESSION['member']['member_id'],$_POST['rate'],$_POST['product_id'],$_POST['title'],$_POST['review']]);

    }


?>
<body>

    <div class="Header">
        SWEETSTOWN
    </div>

    <div class="review-ok">
        <?php if ($count == 0){
            echo '<p>レビューが投稿されました</p>';
        } else {
            echo '<p>この商品に対するあなたのレビューはすでにされています。</p>';
        }
        ?>
        <a href="purchase-history.php">購入履歴に戻る</a>
    </div>

</body>
</html>