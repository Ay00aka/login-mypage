<?php
mb_internal_encoding("utf8");

//セッションスタート
session_start();

//mypage.phpからの導線以外はlogin.errorへリダイレクト
if(empty($_POST['from_mypage'])){
    header('Location:login_error.php');
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
        <meta charset="utf-8">
        <title>マイページ編集</title>
        <link rel="stylesheet" type="text/css" href="mypage.css">
</head>
<body>
<div class="content">
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="logout"><a href="logout.php">ログアウト</a></div>
    </header>
    <main>
        <form action="mypage_update.php" method="post">
            <div class="myp_box">
                <h2>会員情報</h2>
                <p>
                    こんにちは！ <?php echo $_SESSION['name'];?>さん
                </p>
                <img src="<?php echo $_SESSION['picture'];?>">
                <div class="n_m_p">
                    <p>氏名：
                        <input type="text" name="name" value="<?php echo $_SESSION['name'];?>">
                    </p>
                    <p>メール：
                        <input type="text" name="mail" size="25" value="<?php echo $_SESSION['mail'];?>">
                    </p>
                    <p>パスワード：
                        <input type="password" name="password" value="<?php echo $_SESSION['password'];?>">
                    </p>
                </div>
                <div class="comments">
                    <p>
                        <textarea rows="5" cols="60" name="comments" ><?php echo $_SESSION['comments'];?></textarea>
                    </p>
                </div>
                <div class="button">
                    <input type="submit" class="hensyu" size="35" value="この内容に変更する">
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