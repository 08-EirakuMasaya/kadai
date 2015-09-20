<?php
$title = $_POST["title"];
$detail = $_POST["detail"];
$status = "none";
$alert = "";
if(empty($_POST["title"]) && empty($_POST["detail"]))
   {
       $alert = "タイトルと本文を入力してください";
   }
else if(empty($_POST["title"]))
   {
       $alert = "タイトルを入力してください";
   }
else if(empty($_POST["detail"]))
   {
       $alert = "本文を入力してください";
   }
else {  
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "INSERT INTO news (news_id, news_title, news_detail, show_flg, author, create_date, update_date) VALUES (NULL, :title, :detail, 1, '', sysdate(), sysdate()) ";
//var_dump($sql);
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
$result = $stmt->execute();
//var_dump($result);
//var_dump($title);
//var_dump($detail);
$done = "登録が完了しました。";
}
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
</head>

<body>
    <div id="post">
        <div class="title">
            <h2>
<p><span>NEW POSTS</span></p>
<p>新規ニュースの投稿</p>
</h2>
        </div>
        <div class="inner">
           <p class="alert"><?php echo $alert ?></p>
               <p　class='success'><?php echo $done ?></p>
                <p><a href="index.php">topへ移動する</a></p>
        </div>
    </div><!-- end login -->
</body>

</html>