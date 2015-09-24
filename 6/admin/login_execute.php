<?php
$name = $_POST["name"];
$password = $_POST["password"];
$status = "none";
$alert = "";
$login_error = "";
var_dump($name);
var_dump($password);
if(empty($_POST["name"]) && empty($_POST["password"]))
   {
       $alert = "ユーザー名とパスワードを入力してください";
   }
else if(empty($_POST["name"]))
   {
       $alert = "ユーザー名を入力してください";
   }
else if(empty($_POST["password"]))
   {
       $alert = "パスワードを入力してください";
   }
else {
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM user WHERE user_name ='" .$name. "'";//ユーザー名が同一のレコードを選択
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_OBJ);//単一カラムの取得
if($result){ //値が取得できたかどうかの判定
$seted_password = $result->pass;//レコードから登録済みのパスワードを取得
    }
    else{
        $seted_password = 0; //値が取得出来なかったため、適当な値を入れる。
    }
//var_dump(password_verify($password , $seted_password));
//var_dump($password);
//var_dump($seted_password);
if(password_verify($password, $seted_password)) { //文字数に注意！カラムで制限している数をチェック
    $status = "ok";
    $login_error = "<p class='alert'>成功</p>";
    //セッション開始
session_start();
    $_SESSION["log"] = "1";
    header("Location:index.php");
}else{
    //ユーザー名、パスワードが違う場合。
    $status = "failed";
    $login_error = "<p class='alert'>ユーザー名、またはパスワードが間違っています。</p>";
}
}
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
</head>

<body>
    <div id="login">
        <div class="title">
            <h2>
<p><span>LOGIN</span></p>
<p>ログイン</p>
</h2>
        </div>
        <div class="inner">
           <p class="alert"><?php echo $alert ?></p>
           <?php echo $login_error ?>
            <form action="login_execute.php" method="post">
               <ul>
               <li>
                ログイン名:
                <input type="text" name="name" value="" /> 
                </li>
                <li>
                パスワード:
                <input type="password" name="password" value="" />
                </li>
                </ul>
                <input type="submit"  value="" />
                <p><a href="register.php">管理者を新規に登録する</a></p>
            </form>
        </div>
    </div><!-- end login -->
</body>

</html>