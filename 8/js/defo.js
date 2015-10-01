$(document).ready(function(){
    if(localStorage.getItem("memo")){
         var value = localStorage.getItem("memo");
         $("#text_area").val(value);
     }
        
    });