<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <title>注文情報入力画面</title>
</head>
<body>
    <div class="Header">SWEETSTOWN</div>
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/cart.css">
    <link rel="stylesheet" href="CSS/header.css">
    <br><br>

    <h2>お届け日・お支払方法の選択</h2>
    <form action="order-check.php" method="post">
    <h5>お届け日指定</h5>
    <input type="radio" name="delivery" value="指定なし">指定なし　　　？月？日～？月？日発送予定<br>
    <input type="radio" name="delivery" value="日時指定">日時指定<br>
    <input type="radio" name="delivery" value="即日発送">即日発送<br><br>
    <h5>お支払方法</h5>
    <input type="radio" name="payment" value="ツケ払い">ツケ払い<br>
    <input type="radio" name="payment" value="クレジットカード">クレジットカード<br>
    <input type="radio" name="payment" value="代金引換">代金引換<br>
    <input type="radio" name="payment" value="コンビニ払い">コンビニ払い<br>
    <br>
    <h5>お届け場所</h5>
    郵便番号
    <input type="text" name="place" size="9" value="〒"><br>
    　住所　
    <input type="text" name="live" size="30"><br><br>
    <button type="submit">注文確認</button>
    </form>
    <br>
    <footer><?php require 'menu.php';?></footer>
</body>
</html>