<?php
$id = $_GET["id"];
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM news WHERE news_id = $id"; //sql文。テーブルを指定
$stmt = $pdo->prepare($sql);//データベース（$POD）の中のテーブル($sql)を準備
$stmt->execute(); //executeは実行の意味
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);//「fetchAll」全データを配列に変換。「PDO::FETCH_ASSOC」カラム名で配列指定
$view = "";
foreach ($results as $value){
    $date_num = $value["create_date"];
    $title = $value["news_title"];
    $detail = $value["news_detail"];
 $view .= "<dt>" . date("Y.m.d",strtotime($date_num))."</dt>";
                   }
$pdo = null; //pdoを切断
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
<p><span>POSTS</span></p>
<p>ニュース</p>
</h2>
        </div>
        <div class="inner">
            <form action="update_execute.php" method="post">
               <table>
                  <tr>
                      <td>
                          <?php echo $view ?>
                      </td>
                  </tr>
                   <tr>
                       <td>
                          タイトル: 
                       </td>
                       <td>
                          <input type="test" name="title" size="56" value="<?php echo $title ?>" /> <br> 
                       </td>
                   </tr>
                   <tr>
                       <td>
                          本文: 
                       </td>
                       <td>
                          <textarea name="detail" cols=40 rows=10><?php echo $detail ?></textarea>
                          	<input type="hidden" name="id" value="<?php echo $id ?>" />

                       </td>
                   </tr>
               </table>
                <input type="submit"  value="" />
            </form>
        </div>
    </div><!-- end login -->
</body>

</html>
