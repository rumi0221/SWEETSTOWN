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
    <link rel="stylesheet" href="css/cart.css">
    <br><br>

    <h2>お届け日・お支払方法の選択</h2>
    <form action="order-check.php" method="post">
    <h5>お届け日指定</h5>
    <input type="radio" value="nasi">指定なし　　　？月？日～？月？日発送予定<br>
    <input type="radio" value="sitei">日時指定<br>
    <input tupe="radio" value="soku">即日発送<br>
    <h5>お支払方法</h5>
    <input type="radio" value="nasi"><br>
    <input type="radio" value="sitei"><br>
    <input tupe="radio" value="soku"><br>
    <input tupe="radio" value="soku"><br>
    </form>
</body>
</html>