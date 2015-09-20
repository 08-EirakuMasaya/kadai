<?php
$id = $_GET["id"];
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "DELETE FROM news WHERE news_id = " . $id;
$stmt = $pdo->prepare($sql);
$result = $stmt->execute();
if($result) {
	echo "データが削除できました";
	echo "<a href=news_list.php>一覧へ</a>";
} else {
	echo "データの削除に失敗しました";
}
$pdo = null;
?>
<html>
<head>
</head>
<body>
</body>
</html>