<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])){

try{
$pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","");
}catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインしてください。</p>
    <a href='http://localhost/loginMypage/login.php'>ログイン画面へ</a>"
        );
}

$stmt=$pdo->prepare("select * from login_mypage where mail = ? && password = ?");

$stmt->bindValue(1,$_POST["mail"]);
$stmt->bindValue(2,$_POST["password"]);

$stmt->execute();

$pdo=NULL;

while($row=$stmt->fetch()){
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}

if(empty($_SESSION['id'])){
    header('Location:http://localhost/loginMypage/login_error.php');
}

if(!empty($_POST['log_hoji'])){
    $_SESSION['log_hoji']=$_POST['log_hoji'];
}
}

if(!empty($_SESSION['id']) && !empty($_SESSION['log_hoji'])){
setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
setcookie('password',$_SESSION['password'],time()+60*60*24*7);
setcookie('log_hoji',$_SESSION['log_hoji'],time()+60*60*24*7);
}elseif(empty($_SESSION['log_hoji'])){
    setcookie('mail','',time()-1);
    setcookie('password','',time()-1);
    setcookie('log_hoji','',time()-1);
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>マイページ</title>
        <link rel="stylesheet" type="text/css" href="mypage.css">
    </head>
    <body>
    <div class="content">
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="logout"><a href="logout.php">ログアウト</a></div>
    </header>
    <main>
        <div class="myp_box">
            <h2>会員情報</h2>
            <p>
                こんにちは！ <?php echo $_SESSION['name'];?>さん
            </p>
            <img src="<?php echo $_SESSION['picture'];?>">
            <div class="n_m_p">
                <p>氏名：
                    <?php echo $_SESSION['name'];?>
                </p>
                <p>メール：
                    <?php echo $_SESSION['mail'];?>
                </p>
                <p>パスワード：
                    <?php echo $_SESSION['password'];?>
                </p>
            </div>
            <div class="comments">
                <p><?php echo $_SESSION['comments'];?></p>
            </div>
            <form action="mypage_hensyu.php" method="post" class="form_center">
                <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
                <div class="button">
                    <input type="submit" class="hensyu" size="35" value="編集する">
                </div>
            </form>
        </div>
    </main>
    <footer>
        Ⓒ2018 InterNous.inc. All rights reserved
    </footer>
    </div>
    </body>
</html>

