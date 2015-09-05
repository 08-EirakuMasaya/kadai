<?php
session_start();
$_SESSION['shohin_id'] = 1;
$input_data = $_SESSION["name"] . "," . $_SESSION["furigana"] . "," . $_SESSION["email"] . "," . $_SESSION["sex"] . "," . $_SESSION["age"];
$file = fopen("./data/data.txt","a");	// ファイル読み込み aは引数（追加書き込み、appendと一緒）
flock($file, LOCK_EX);			// ファイルロック
fputs($file, $input_data . PHP_EOL);
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);
?>
<?php 
$_SESSION = array();
session_destroy();
?>