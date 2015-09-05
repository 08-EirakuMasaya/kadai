<head>
<meta charset="utf-8">
<title>確認画面</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<?php
session_start();
$_SESSION['shohin_id'] = 1;

$_SESSION["name"] = $_GET["name"];
$_SESSION["furigana"] = $_GET["furigana"];
$_SESSION["email"] = $_GET["email"];
$_SESSION["sex"] = $_GET["sex"];
$_SESSION["age"] = $_GET["age"];

$name = $_SESSION["name"];
$furigana = $_SESSION["furigana"];
$email = $_SESSION["email"];
$sex = $_SESSION["sex"];
$age = $_SESSION["age"];
?>
<body>
<div id="comf">
<div  class="title">
<h2>
<p><span>Comfirm</span></p>
<p>記入に間違いがないかご確認ください。</p>
</h2>
</div>
<div class="inner">
<ul>
<li> 氏名:<?php echo $name; ?></li>
<li> フリガナ:<?php echo $furigana; ?></li>
<li> メールアドレス:<?php echo $email; ?></li>
<li> 性別:<?php echo $sex; ?></li>
<li> 年齢:<?php echo $age; ?></li>
    <a href="input_finish.php"><img src="./img/btn_send.png" ></a>
</ul>
</div>
</div>
</body>