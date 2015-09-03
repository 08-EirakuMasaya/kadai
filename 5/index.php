<html>
<head>
<meta charset="utf-8">
<title></title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script>
    $(document).ready(function(){
                      $(function agebox(){
                      for(i = 0; i <= 90; i = i+1){
                          $("#age").append("<option value=" + i + ">" + i + "歳</option>");
                      }
                          $("#age").val("20");
                          });
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
<form action="comfirm_enq.php" method="get" target="_blank">
<ul>
<li> <label for="name">氏名</label><input type="text" name="name"></li>
<li> <label for="furigana">フリガナ</label><input type="text" name="furigana"></li>
<li> <label for="email">メールアドレス</label><input type="text" name="email"></li>
<li><label for="sex">性別</label><input type="radio" name="sex" value="男性">男性</li>
<li><label for="sex">&nbsp;</label><input type="radio" name="sex" value="女性">女性</li>
<li>年齢を選択してください。<select id="age" name="age"></select></li>
<input type="submit" value="">
</ul>
</form>
</div>
</div><!-- end entry -->
</body>
</html>