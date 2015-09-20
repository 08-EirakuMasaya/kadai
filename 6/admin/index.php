<?php 
session_start(); 		// セッションを使うときは宣言
if (!isset($_SESSION["log"])) {  //isset（イズセット）で設定されているかどうかの判定
	header("Location:login.php");
}
?> 
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
</head>

<body>
    <div id="admin">
        <div class="title">
            <h2>
<p><span>DASH BOARD</span></p>
<p>管理ページ</p>
</h2>
        </div>
        <div class="inner">
           <ul>
            <li><a href="input.php">ニュース新規追加</a></li>
            <li><a href="news_list.php">ニュース一覧（更新はここから）</a></li>
            <li><a href="search_ps.php">ニュース検索</a></li>
            </ul>
            <INPUT TYPE='button' VALUE="ログアウト" onClick="location.href='log_out.php'">
        </div>
    </div>
    <!-- end login -->
</body>

</html>