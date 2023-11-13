<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文情報入力画面</title>
</head>
<body>
    <div class="Header">
        <link rel="stylesheet" href="css/header.css">
        SWEETSTOWN
    </div>

    <link rel="stylesheet" href="css/cart.css">
    <br><br>

    <h2>お届け日・お支払方法の選択</h2>
    <u><h3>お届け日指定</h3></u>
    <div class="radio">
        <input type="radio" id="指定なし" name="delivery" value="指定なし" checked />
        <label for="指定なし">指定なし　　　？月？日～？月？日発送予定</label><hr>
    </div>
    <div class="radio">
        <input type="radio" id="日時指定" name="delivery" value="日時指定"/>
        <label for="日時指定">日時指定</label><hr>
    </div>
    <div class="radio">
        <input type="radio" id="即日発送" name="delivery" value="即日発送"/>
        <label for="即日発送">即日発送</label><hr>
    </div>
    <br> 
    <u><h3>お支払方法</h3></u>
    <div class="radio">
        <input type="radio" id="ツケ払い" name="payment" value="ツケ払い" checked />
        <label for="ツケ払い">ツケ払い</label><hr>
    </div>
    <div class="radio">
        <input type="radio" id="クレジットカード" name="payment" value="クレジットカード"/>
        <label for="クレジットカー">クレジットカード</label><hr>
    </div>
    <div class="radio">
        <input type="radio" id="代金引換" name="payment" value="代金引換"/>
        <label for="代金引換">代金引換</label><hr>
    </div>
    <div class="radio">
        <input type="radio" id="コンビニ払い" name="payment" value="コンビニ払い"/>
        <label for="コンビニ払い">コンビニ払い</label><hr>
    </div>
    <br>
    <u><h3>お届け場所</h3></u>
    <div class="radio">
        <input type="radio" id="指定なし" name="delivery" value="指定なし" checked />
        <label for="指定なし">指定なし　　　？月？日～？月？日発送予定</label><hr>
    </div>
    <div class="radio">
        <input type="radio" id="日時指定" name="delivery" value="日時指定"/>
        <label for="日時指定">日時指定</label><hr>
    </div>
</body>
</html>