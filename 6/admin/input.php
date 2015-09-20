<html>

<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
</head>

<body>
    <div id="post">
        <div class="title">
            <h2>
<p><span>NEW POSTS</span></p>
<p>新規ニュースの投稿</p>
</h2>
        </div>
        <div class="inner">
            <form action="input_execute.php" method="post">
               <table>
                   <tr>
                       <td>
                          タイトル: 
                       </td>
                       <td>
                          <input type="test" name="title" size="56" value="" /> <br> 
                       </td>
                   </tr>
                   <tr>
                       <td>
                          本文: 
                       </td>
                       <td>
                          <textarea name="detail" cols=40 rows=10></textarea>
                       </td>
                   </tr>
               </table>
                <input type="submit"  value="" />
            </form>
        </div>
    </div><!-- end login -->
</body>

</html>