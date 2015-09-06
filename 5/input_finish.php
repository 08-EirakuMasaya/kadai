<head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <div id="thank">
        <div class="title">
            <h2>
<p><span>Thanks</span></p>
<p>ありがとうございました。</p>
</h2>
        </div>
        <div class="inner">
           <a href="show_enp.php"><img src="./img/btn_result.png"></a>
            
        </div>
    </div>
</body>
<?php
session_start();
$_SESSION['shohin_id'] = 1;
$array = array($_SESSION["name"],$_SESSION["furigana"],$_SESSION["email"],$_SESSION["sex"],$_SESSION["age"]);
mb_convert_variables('SJIS-win', 'UTF-8', $array);
$handle=fopen("./data/question.csv","a");
//ロック
     flock($handle,LOCK_EX);

     //書き込み
     fputcsv($handle, $array);

     //ロック解除
     flock($handle,LOCK_UN);

     //閉じる
     fclose($handle);   
/*$input_data = $_SESSION["name"] . "," . $_SESSION["furigana"] . "," . $_SESSION["email"] . "," . $_SESSION["sex"] . "," . $_SESSION["age"];
$file = fopen("./data/data.txt","a");	// ファイル読み込み aは引数（追加書き込み、appendと一緒）
flock($file, LOCK_EX);			// ファイルロック
fputs($file, $input_data . PHP_EOL);
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);*/
?>
    <?php 
$_SESSION = array();
session_destroy();
?>