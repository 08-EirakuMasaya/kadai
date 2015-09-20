<?php
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM news"; //sql文。テーブルを指定
$stmt = $pdo->prepare($sql);//データベース（$POD）の中のテーブル($sql)を準備
$stmt->execute(); //executeは実行の意味
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);//「fetchAll」全データを配列に変換。「PDO::FETCH_ASSOC」カラム名で配列指定
$view = "";
foreach ($results as $value){
    $date_num = $value["create_date"];
    $id = $value["news_id"];
 $view .= "<a href='news.php?id=".$id."'><dt>" . date("Y.m.d",strtotime($date_num))."</dt>";
 $view .= "<dd>" . mb_strimwidth($value["news_title"],0,9,'...', "UTF-8")."</dd></a>";//半角
    //SELECTで直接文字数指定　SELECT * , LEFT(news_title,3) as con FROM post;   
 $view .= "<dd>" . mb_strimwidth($value["news_detail"],0,19,'...', "UTF-8")."</dd>";
    $link1 = 'window.location.href="update.php?id='.$id.'"';
    $view .= "<INPUT TYPE='button' VALUE='編集' onClick='".$link1."'>
";
    $link2 = 'window.location.href="delete_execute.php?id='.$id.'"';
    $view .= "<INPUT TYPE='button' VALUE='削除' onClick='".$link2."'>
";
 $view .= "<hr>";
                   }
$pdo = null; //pdoを切断
?>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php echo $view ?>
<INPUT TYPE="button" VALUE="TOPへ" onClick="window.location.href='index.php'">
</body>
</html>