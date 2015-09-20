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
 $hashed_password = password_hash($password,PASSWORD_DEFAULT);//ハッシュ化（暗号化？）
$sql = "INSERT INTO user (id, user_name, pass, create_date, update_date) VALUES (NULL, :name, :pass, sysdate(), sysdate()) ";//query はそのまま実行。prepare は後で execute が必要
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':pass', $hashed_password, PDO::PARAM_STR);
$result = $stmt->execute();
var_dump($result);
if($result) { 
    $status = "ok";
    $login_error = "<p class='success'>登録が完了しました。<a href='login.php'>ログイン画面へ移動</a></p>";
}else{
    //ユーザー名に紐付いたパスワードのハッシュが一緒じゃなかったらfalse
    $status = "failed";
    $login_error = "<p class='alert'>エラー：既に存在するユーザ名です。</p>";
}
    var_dump($hashed_password);
    var_dump($stmt);
}
$pdo = null;
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
</head>

<body>
    <div id="register">
        <div class="title">
            <h2>
<p><span>New User Registration</span></p>
<p>新規ユーザー登録</p>
</h2>
        </div>
        <div class="inner">
           <p class="alert"><?php echo $alert ?></p>
           <?php echo $login_error ?>
            <form action="register_execute.php" method="post">
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