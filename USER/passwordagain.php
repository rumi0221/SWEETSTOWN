<?php
echo '<h4>パスワード再設定</h4><br>';
echo '<form action="passwordagain-ok.php" method="post">'
echo '<p>メールアドレス</p>';
echo '<input type="text" name="mail"><br><br>';
echo '<p>新しいパスワード</p>';
echo '<input type="pass" name="newpass"><br><br>';
echo '<p>新しいパスワード（確認）</p>';
echo '<input type="pass" name="newpassok">';
echo '<button type="submit">登録</button>';
echo '</form>';
echo ''