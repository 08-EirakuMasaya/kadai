<?php

$file = "./data/question.csv";
if ( ( $handle = fopen ( $file, "r" ) ) != FALSE ) {
    echo "<table>\n";
    while ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) != FALSE ) {
 /*{文字列長}（省略可能（PHP5から））
取得する文字列の最大値。
【省略値】制限なし（但し若干動作が遅くなる）

{デミリタ文字}（省略可能）
フィールドのデリミタ（区切文字）の設定。
【省略値】カンマ

{フィールド囲い子文字}（省略可能）
フィールド囲い子文字の設定。
【省略値】ダブルクォート
*/
        echo "\t<tr>\n"; // /tは水平タブ（縦位置を揃えるために右方向にタグをずらす）
        for ( $i = 0; $i < count( $data ); $i++ ) {
            echo "\t\t<td>{$data[$i]}</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
    fclose ( $handle );
}

?>