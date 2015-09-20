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
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);//ハッシュ化（暗号化？）生成される文字は基本60文字？
$sql = "SELECT * FROM user WHERE user_name ='" .$name. "'";//ユーザー名が同一のレコードを選択
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_OBJ);
if($result){ //値が取得できたかどうかの判定
$seted_password = $result->pass;
    }
    else{
        $seted_password = 0; //値が出来なかったため、適当な値を入れる。
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
    //既に存在するユーザ名だった場合INSERTに失敗する
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