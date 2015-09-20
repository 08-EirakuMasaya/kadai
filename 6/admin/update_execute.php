<?php
$id = $_POST["id"];
$title = $_POST["title"];
$detail = $_POST["detail"];
var_dump($detail);
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "UPDATE news set news_title = '" . $title . "', news_detail = '" . $detail . "', update_date = sysdate() " . "WHERE news_id = " . $id;
$stmt = $pdo->prepare($sql);//データベース（$POD）の中のテーブル($sql)を準備
$result = $stmt->execute(); //executeは実行の意味
var_dump($sql);
if($result) { 
    $success = "<p class='success'>更新が完了しました。<a href='news_list.php'>一覧へもどる</a></p>";
}
else{
    $success = "更新エラーです。";
}
$pdo = null; //pdoを切断
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
<p><span>RePOSTS</span></p>
<p>修正確認</p>
</h2>
        </div>
        <div class="inner">
           <?php echo $success ?>
        </div>
    </div><!-- end login -->
</body>

</html>