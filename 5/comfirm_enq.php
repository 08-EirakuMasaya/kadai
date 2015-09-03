<head>
<meta charset="utf-8">
<title>確認画面</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<?php
$name = $_GET["name"];
$furigana = $_GET["furigana"];
$email = $_GET["email"];
$sex = $_GET["sex"];
$age = $_GET["age"];
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
<input type="submit" formaction="input_finish.php" value="">
</ul>
</div>
</div>
</body>