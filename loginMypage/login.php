<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ログイン</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
<body>
<div class="content">
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>
    <main>
        <form action="mypage.php" method="post">
            <div class="loginbox">
                <div class="nyuryoku">
                    <p><label>メールアドレス</label><br>
                    <input type="text" class="lgb" size="40" value="<?php if(isset($_COOKIE['mail'])){echo $_COOKIE['mail'];}?>
                    " name="mail"></p>
                    <p><label>パスワード</label><br>
                    <input type="password" class=lgb size="40" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>"
                    name="password"></p>
                </div>
                <div class="hoji">
                    <input type="checkbox" class=lgb name="log_hoji" value="log_hoji"
                        <?php
                        if(isset($_COOKIE['log_hoji'])){
                            echo "checked='checked'";
                        }?>>
                    ログイン状態を保持する
                </div>
                <div class="log_button">
                    <input type="submit" class="button" value="ログイン" size="40">
                </div>       
            </div>
        </form>
    </main>
    <footer>
        Ⓒ2018 InterNous.inc. All rights reserved
    </footer>
</div>
</body>
</html>