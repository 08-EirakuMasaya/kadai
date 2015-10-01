chrome.runtime.sendMessage({method: "getStatus"}, function(response) {
  console.log(response.data);
 localStorage["memo"] = response.data;
    if(response.data == null) {
        localStorage.clear();
    }
});
 chrome.extension.onRequest.addListener(function(request, sender, sendResponse) {
    if (request.method == "getData")
      sendResponse({tabData: localStorage['memo']});
    else
      sendResponse({}); // snub them.
});

chrome.extension.onRequest.addListener(function(request, sender, sendResponse) {
    if (request.method == "setCV"){
        var bheight = $("body").height();
var cvw = window.innerWidth + 'px';
var cvh = bheight + 'px';
console.log("要素が追加されました。");
    var div = $('<div style="position: relative;"><canvas id="drowarea" width="' + cvw + '" height="' + cvh + '" style="position:absolute; z-index:100;left: 0; top: 0; display:inline;"></canvas></div>');
    $("body").prepend(div);
   
//初期化
var canvas_mouse_event = false; //スイッチ [ true=線を引く, false=線は引かない ]  ＊＊＊
var txy   = 10;               //iPadなどは15＋すると良いかも
var oldX  = 0;                //１つ前の座標を代入するための変数
var oldY  = 0;                //１つ前の座標を代入するための変数
bold_line = 3;            //ラインの太さをここで指定
var color = "#FF0000";           //ラインの色をここで指定

//------------------------------------------------
var can = $("#drowarea")[0]; //CanvasElement(描画エリア)
var context = can.getContext("2d"); //描画するための準備！
//------------------------------------------------
//上2つのスクリプトを記述します。


//MouseDown：フラグをTrue
//-----------------------------------------------
$(can).on("mousedown", function(e){
oldX = e.offsetX;       //MOUSEDOWNしたところの左上を基準としたX横座標取得
oldY = e.offsetY - txy; //MOUSEDOWNしたところの左上を基準としたY高さ座標取得
canvas_mouse_event=true;
});
//-----------------------------------------------
//上5つのスクリプトを記述します。


//MouseMove：
//----------------------------------------------
$(can).on("mousemove", function (e){
    console.log(e);//http://shgam.hatenadiary.jp/entry/2013/06/27/022956
if(canvas_mouse_event==true){
      var px = e.offsetX;
      var py = e.offsetY - txy;
      context.strokeStyle = color;
      context.lineWidth = bold_line;
      context.beginPath();//描画開始の命令
      context.lineJoin= "round";//結合の形状を丸くする。miter,bevel
      context.lineCap = "round";//始点・終点の形状
      context.moveTo(oldX, oldY);//描画の始点
      context.lineTo(px, py);//描画の終点
      context.stroke();
      context.closePath();
      oldX = px;//動かし終わった位置座標を始点に代入
      oldY = py;//動かし終わった位置座標を始点に代入
  }
});

//MouseUp：フラグをfalse
//------------------------------------------------
$(can).on("mouseup", function(e){
    canvas_mouse_event=false;
});
//------------------------------------------------


//クリアーボタンAction
//-----------------------------------------------------------------
chrome.extension.onRequest.addListener(function(request, sender, sendResponse) {
    if (request.method == "cvClear"){
    context.beginPath();
    context.clearRect(0, 0, can.width, can.height);
    localStorage.clear();
    }
    });
//-----------------------------------------------------------------

//保存ボタン
    //-----------------------------------------------------------------
chrome.extension.onRequest.addListener(function(request, sender, sendResponse) {
    if (request.method == "setCV"){
    var base64 = can.toDataURL();
    localStorage.setItem("saveKey", base64);
    }
});
    //-----------------------------------------------------------------
    
//リロードボタン
    //-----------------------------------------------------------------
    $("#loard").on ("click",function(){
        // Imageオブジェクトを作成し、src属性にデータを設定する
var image = new Image();//imageオブジェクトのインスタンス作成。引数に幅 , 高さを持つ
image.src = localStorage.getItem("saveKey");
image.onload = function(){
  // 画像の読み込みが終わったら、Canvasに画像を反映する。
  context.drawImage(image, 0, 0);
}
    });
    //-----------------------------------------------------------------
    
//ラインのプロパティ選択
    //-----------------------------------------------------------------
  function changeSelect(){
      var selectVal = $("#line_select").val();
      //alert(selectVal);
      bold_line = selectVal;
}
    //-----------------------------------------------------------------
    }
});
//main.jeからsetボタンが押された時
 /*chrome.extension.onRequest.addListener(function(request, sender, sendResponse) {
    if (request.method == "setDiv")
      alert("要素が追加されました。");
    var div = $('<div><p>test</p></div>');
    $("body").wrapInner(div);
});*/