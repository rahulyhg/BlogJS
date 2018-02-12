$(window).resize(function(){
     if ($(window).width() <= 550) {
         $(".card-main").hide();
         $(".ad-top").hide();
     } else {
         $(".card-main").show();
         $(".ad-top").show();
     }
});