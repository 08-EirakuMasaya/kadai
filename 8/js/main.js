$("#save").on("click",function(){
chrome.tabs.executeScript(null, { file: "js/jquery-2.1.1.min.js" }, function(){
    var value = $("#text_area").val();
   localStorage["memo"] = JSON.stringify(value);
    console.log(value);
    //canvasも保存
    chrome.tabs.getSelected(null, function(tab) {
    chrome.tabs.sendRequest(tab.id, {method: "setCV"})});
     alert("SAVEしました");
    });
 });
$("#clear").on("click",function(){
chrome.tabs.executeScript(null, { file: "js/jquery-2.1.1.min.js" }, function(){
    localStorage.clear();
     alert("CLEARしました");
     $("#text_area").val("");
    });
 });
 
chrome.tabs.getSelected(null, function(tab) {
    chrome.tabs.sendRequest(tab.id, {method: "getData"}, function(response) {
         $("#text_area").val(response.tabData);  
});
});
//canvasを設置
$("#set").on("click",function(){
chrome.tabs.getSelected(null, function(tab) {
    chrome.tabs.sendRequest(tab.id, {method: "setCV"})});
});
//canvasを削除
$("#clear_d").on("click",function(){
chrome.tabs.getSelected(null, function(tab) {
    chrome.tabs.sendRequest(tab.id, {method: "cvClear"})});
});

/*//テストでアラートひょうじ コンテントスクリプトへ
$("#set").on("click",function(){
chrome.tabs.getSelected(null, function(tab) {
    chrome.tabs.sendRequest(tab.id, {method: "setDiv"})});
});*/


/*chrome.tabs.query({active: true, currentWindow: true}, function(tabs) {
  chrome.tabs.sendMessage(tabs[0].id, {method: "getData"}, function(response) {
         $("#text_area").val(response.tabData);  
});
});*/

/*$(function(){

  // ローカルストレージに設定されているメッセージを表示する。
  // 設定されてない場合は「Hello, world!」を表示する。
  if (localStorage["memo"]) {
    $("#text_area").text(localStorage["memo"]);
  } else {
    $("#text_area").text("Hello, world!");
  }
});
*/
    
