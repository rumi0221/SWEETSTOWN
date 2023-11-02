<?php require 'db-connect.php'; ?>
<?php
echo '<h4>パスワード再設定</h4><br>';
echo '<form action="passwordagain-ok.php" method="post">'
echo 'メールアドレス<br>';
echo '<input type="text" name="mail"><br><br>';
echo '新しいパスワード<br>';