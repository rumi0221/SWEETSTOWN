



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レビュー確認画面</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/review.css">
</head>
<body>
    <div class="Header">
        SWEETSTOWN
    </div>
    <div class="hed">
        <h1>レビュー確認</h1>
</div>
<hr size="1">
<div class="content">
    <p>商品名</p>
    <p>ショップ名</p>
    <div class="title">
        <textarea readonly rows="1" cols="40"><?=$_POST['title']?></textarea>
    </div>
    <div calss="honbun">
        <textarea readonly rows="10" cols="40"><?=$_POST['review']?></textarea>
    </div>

    <?php var_dump($_POST['rate']);?>
    
        <div class="rate-form-kakunin">
            <?php
            for($i=0;$i<$_POST['rate'];$i++){
        echo '<input id="staryellow" type="radio" name="rate" value="5">
            <label id="staryellowlabel" for="staryellow">★</label>';
        }
        for($i=$_POST['rate'];$i<5;$i++){
            echo '<input id="starwhite" type="radio" name="rate" value="5">
                <label id="starlabel" for="starwhite">★</label>';
            }
?>

        </div>
        <input type="hidden" name="ratevalue" value="<?=$_POST['rate']?>">
        <button class="kakunin" type="submit">投稿する</button>
    
</div>
    
</body>
</html>