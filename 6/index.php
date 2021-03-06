<?php include("header.php"); ?>
    <section class="main_visual">
        <div class="inner">
            <p class="catch text-center">世界を震わすチーズを創ろう。<span class="catch-small">新しい形のチーズ職人養成学校、はじまります。</span></p>
        </div>
    </section>

    <section class="news contents-box">
        <h2 class="section-title text-center">
            <span class="section-title__yellow">News</span><span class="section-title-ja text-center">お知らせ・更新情報</span>
        </h2>
        <article class="news-detail">
            <dl class="clearfix">
<?php
session_start(); 		// セッションを使うときは宣言
if (isset($_SESSION["log"])) {  //isset（イズセット）で設定されているかどうかの判定
    $link ='location.href="admin/index.php"';
	$admin = "<INPUT TYPE='button' VALUE='管理画面へ' onClick='$link'>";
}
else{
    $admin= "";
}
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");//hostは繋ぎ場所。rootはデータベースに繋げるユーザー。最後の「""」はパスワード
$sql = "SELECT * FROM news LIMIT 5"; //sql文。テーブルを指定
$stmt = $pdo->prepare($sql);//データベース（$POD）の中のテーブル($sql)を準備
$stmt->execute(); //executeは実行の意味
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);//「fetchAll」全データを配列に変換。「PDO::FETCH_ASSOC」カラム名で配列指定
$pdo = null; //pdoを切断
               foreach ($results as $value){
    $date_num = $value["create_date"];
                   $id = $value["news_id"];
 echo "<dt class='news-date'><a href='news.php?".$id."'>" . date("Y.m.d",strtotime($date_num))."</dt>";
 echo "<dd class='news-description'>" . mb_strimwidth($value["news_title"],0,44,'...')."</a></dd>";//半角
    //SELECTで直接文字数指定　SELECT * , LEFT(news_title,3) as con FROM post;
                   }
?>
            </dl>
            <p class="view-detail text-right"><?php echo $admin ?></p>
            <p class="view-detail text-right"><a href="#">ニュース一覧を見る</a></p>
        </article>
    </section>

    <section class="feature contents-box">
        <div class="inner">
            <h2 class="section-title text-center">
                <span class="section-title__white">Feature</span><span class="section-title-ja text-center">特徴</span>
            </h2>
            <ul class="list-feature">
                <li><img src="img/point1.png" alt=""></li>
                <li><img src="img/point2.png" alt=""></li>
                <li><img src="img/point3.png" alt=""></li>
            </ul>
        </div>
    </section>

    <section class="cource contents-box">
        <div class="inner">
            <h2 class="section-title text-center">
                <span class="">Cource</span><span class="section-title-ja text-center">コース紹介</span>
            </h2>
            <div class="block-cource block-cource-lab clearfix">
                <div class="cource-img"><img src="img/cource-lab.png" alt=""></div>
                <div class="cource-txt cource-txt__usually">
                    <h3 class="cource-title text-center">LABコース</h3>
                    <p>週末集中型の初心者対象のチーズ職人養成講座です。
                        <br /> 週末集中型の初心者対象のチーズ職人養成講座です。
                        <br /> 週末集中型の初心者対象のチーズ職人養成講座です。
                        <br /> 週末集中型の初心者対象のチーズ職人養成講座です。
                        <br /> 週末集中型の初心者対象のチーズ職人養成講座です。
                        <br />
                    </p>
                </div>
            </div>
            <div class="block-cource clearfix">
                <div class="cource-img__reverse">
                    <img src="img/cource-academy.png" alt="">
                </div>
                <div class="cource-txt cource-txt__reverse">
                    <h3 class="cource-title text-center">ACADEMYコース</h3>
                    <p>週末集中型の初心者対象のチーズ職人養成講座です。
                        <br /> 週末集中型の初心者対象のチーズ職人養成講座です。
                        <br /> 週末集中型の初心者対象のチーズ職人養成講座です。
                        <br /> 週末集中型の初心者対象のチーズ職人養成講座です。
                        <br /> 週末集中型の初心者対象のチーズ職人養成講座です。
                        <br />
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery">
        <div class="contents-heading bg-yellow">
            <h2 class="section-title text-center">
                <span class="section-title">Gallery</span><span class="section-title__white section-title-ja text-center">ギャラリー</span
            </h2>
        </div>
        <div class="inner contents-box">
            <ul class="list-gallery clearfix">
                <li>
                    <a href="#"><img src="img/gallery01.jpg" alt="" /></a>
                </li>
                <li>
                    <a href="#"><img src="img/gallery02.jpg" alt="" /></a>
                </li>
                <li>
                    <a href="#"><img src="img/gallery03.jpg" alt="" /></a>
                </li>
                <li class="no-white-space">
                    <a href="#"><img src="img/gallery04.jpg" alt="" /></a>
                </li>
                <li>
                    <a href="#"><img src="img/gallery05.jpg" alt="" /></a>
                </li>
                <li>
                    <a href="#"><img src="img/gallery06.jpg" alt="" /></a>
                </li>
                <li>
                    <a href="#"><img src="img/gallery07.jpg" alt="" /></a>
                </li>
                <li class="no-white-space">
                    <a href="#"><img src="img/gallery08.jpg" alt="" /></a>
                </li>
                <li>
                    <a href="#"><img src="img/gallery09.jpg" alt="" /></a>
                </li>
                <li>
                    <a href="#"><img src="img/gallery10.jpg" alt="" /></a>
                </li>
                <li>
                    <a href="#"><img src="img/gallery11.jpg" alt="" /></a>
                </li>
                <li class="no-white-space">
                    <a href="#"><img src="img/gallery12.jpg" alt="" /></a>
                </li>
            </ul>
        </div>
    </section>

    <section class="entry-form">
        <div class="contents-heading bg-yellow">
            <h2 class="section-title text-center">
                <span class="section-title">Entry</span><span class="section-title__white section-title-ja text-center">説明会に申し込む</span></h2>
        </div>
        <div class="inner contents-box">
            <form action="#" class="form-module">
                <table>
                    <tr>
                        <td class="form-text">氏名</td>
                        <td>
                            <input type="text" value="" name="name">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-text">フリガナ</td>
                        <td>
                            <input type="text" value="" name="kana">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-text">メールアドレス</td>
                        <td>
                            <input type="text" value="" name="email">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-text">説明会の希望日時</td>
                        <td>
                            <select id="select-box" name="date">
                                <option value="2015/7/18 10:00">2015/7/18 10:00</option>
                                <option value="2015/7/25 10:00">2015/7/25 10:00</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-text">志望動機</td>
                        <td>
                            <label for="1">
                                <input type="radio" name="motivation" value="起業したい" id="1">起業をしたい</label>
                            <label for="2">
                                <input type="radio" name="motivation" value="チーズ企業に就職したい。" id="2">チーズ企業に就職したい。</label>
                            <label for="3">
                                <input type="radio" name="motivation" value="チーズと関わる仕事なので、知識をつけたい。" id="3">チーズと関わる仕事なので、知識をつけたい。</label>
                            <label for="4">
                                <input type="radio" name="motivation" value="教養として身につけたい" id="4">教養として身につけたい</label>
                        </td>
                    </tr>
                </table>
                <p class="text-center">
                    <input type="submit" class="entry-btn">
                </p>
            </form>
        </div>
    </section>

    <!--#information-->
    <?php include("footer.php"); ?>