<?php
$data =$name + "," + $furigana + "," + $email + "," + $sex + "," + $age;
$file = fopen("data/data.txt","a");	// ファイル読み込み
flock($file, LOCK_EX);			// ファイルロック
fputs($file, $data . PHP_EOL);
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);
?>