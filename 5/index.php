<html>
<head>
<meta charset="utf-8">
<title></title>
<script type="text/javascript" src="./js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script>
    $(document).ready(function(){
                      function agebox(){
                      for(i = 0; i <= 90; i = i++){
                      var option = $("option");
                      option.attr("value",i)}
                          option.html(i + "歳")
                          $("age").html(option);
                          }
        $("age").value = 20;
                      });
    </script>
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
<!--
<li> <label for="date">説明会の希望日時</label>
<select name="date">
<option value="選択してください">選択してください</option>
<option value="7/19 19:00〜">7/19 19:00〜</option>
<option value="7/26 19:00〜">7/26 19:00〜</option>
</select></li> -->
<li><label for="sex">性別</label><input type="radio" name="sex" value="男性">男性</li>
<li><label for="sex">&nbsp;</label><input type="radio" name="sex" value="女性">女性</li>
<li>年齢を選択してください。<select id="age"></select></li>
<input type="submit" value="">
</ul>
</form>
</div>
</div><!-- end entry -->
</body>
</html>