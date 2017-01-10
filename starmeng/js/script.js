/******首页轮播图片******/ 

 $(document).ready(function(){
  $(".img li").eq(0).show();
  $(".num li").mouseover(function(){
     $(this).addClass("active").siblings().removeClass("active");
     var index=$(this).index();
     $(".img li").eq(index).stop().fadeIn(500).siblings().stop().fadeOut(500);
   })

  var i=0;
  var t=setInterval(move,5000 );
  function move(){
    i++;
    if(i==3){
      i=0;}
    $(".num li").eq(i).addClass("active").siblings().removeClass("active");
    $(".img li").eq(i).fadeIn(500).siblings().fadeOut(500);
  }
  $(".sroll").hover(function(){
    clearInterval(t);
  },function(){
    t=setInterval(move,5000);
  })
  
 })

/******新闻中心新闻导航栏切换********/
 
$(document).ready(function(){
  $("#news_nav ul li").click(function(){
    $(this).addClass("on").siblings().removeClass("on");
    var index=$(this).index();
    $("#news_nav div").eq(index).removeClass("hide").siblings("div").addClass("hide");
  })
 
})
