<?php
//グーグルユーザー情報
$google_id = $_POST["id"];
$google_name = $_POST["name"];
$google_img = $_POST["img"];
$google_email = $_POST["email"];
$google_token = $_POST["token"];
//var_dump($google_id);
//var_dump($google_name);
//var_dump($google_img);
//var_dump($google_email);
//var_dump($google_token);

//セッション開始
session_start();
    $_SESSION["log"] = "1";
?>
 

 <html lang="ja">
  <head>
  </head>
  <body>
  </body>
</html>