<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<div id="entry">
<div  class="title">
<h2>
<p><span>Survey</span></p>
<p>アンケート</p>
</h2>
</div>
<div class="inner">
<form method="post" action="example.cgi">
<ul>
<li> <label for="name">氏名</label><input type="text" name="name"></li>
<li> <label for="furigana">フリガナ</label><input type="text" name="furigana"></li>
<li> <label for="email">メールアドレス</label><input type="text" name="email"></li>
<li> <label for="date">説明会の希望日時</label>
<select name="date">
<option value="選択してください">選択してください</option>
<option value="7/19 19:00〜">7/19 19:00〜</option>
<option value="7/26 19:00〜">7/26 19:00〜</option>
</select></li>
<li><label for="doki">志望動機</label><input type="radio" name="doki" value="起業をしたい">起業をしたい</li>
<li><label for="doki">&nbsp;</label><input type="radio" name="doki" value="チーズ系企業に就職したい。">チーズ系企業に就職したい。</li>
<li><label for="doki">&nbsp;</label><input type="radio" name="doki" value="チーズと関わる仕事なので、知識をつけたい。">チーズと関わる仕事なので、知識をつけたい。</li>
<li><label for="doki">&nbsp;</label><input type="radio" name="doki" value="教養として身につけたい">教養として身につけたい</li>
<input type="submit" value="">
</ul>
</form>
</div>
</div><!-- end entry -->
</body>
</html>