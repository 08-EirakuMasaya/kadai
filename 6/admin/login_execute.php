<?php
//セッション開始
session_start();
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
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);//ハッシュ化（暗号化？）
$sql = "SELECT * FROM user WHERE user_name ='" .$name.  "' AND pass ='" . $password. "'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);
if($result) { 
    $status = "ok";
    $login_error = "<p class='alert'>成功</p>";
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
            </form>
        </div>
    </div><!-- end login -->
</body>

</html>