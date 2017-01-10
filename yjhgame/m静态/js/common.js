$(document).ready(function(){

/*****首页header导航去掉官网首页的左边框*****/
	$(".header .nav ul li").eq(0).css("border-left","none");

  
/******首页新闻tag切换******/ 
  $(".news>ul>li").click(function(){
      $(this).addClass("on").siblings().removeClass("on");
      var index=$(this).index();
      $(".news>div").eq(index).removeClass("hide").siblings(".news>div").addClass("hide");
      

      $(".news>div").eq(index).children("ul").children().slice(0,5).show();  /*******默认显示条数*********/
      var size = $(".news>div").eq(index).children("ul").children().size();
      var lisize = Math.floor(size/5);
      var i = 0;
  /*********点击加载更多**********/
      $(".news>div").eq(index).children(1).children("img").click(function(){
            if(i==lisize){
                $(this).parent().append("<p>没有更多</p>");
                $(this).remove();
            }
            i++;
            $(".news>div").eq(index).children("ul").children().slice((5*i),(5*i+5)).show();
            if(i==lisize){
                $(this).parent().append("<p>没有更多</p>");
                $(this).remove();
            }
      })
  })
  /*********页面加载完后自动触发点击事件*********/
  $('.news>ul>li').eq(0).trigger("click");


  /*********视频点击播放**************/
  $(".video").click(function(){
      document.getElementById('video').load();
      document.getElementById('video').play();
  })
 
  $(".video_play span").click(function(){
      document.getElementById('video').pause();
  })


  //监听滚动条，当往下滚动的时候底部下载栏出现
  $(window).scroll(function() {
     
      var  scrolltop = $(document).scrollTop();
      var  height = $('.download').height();
 

      if (scrolltop>height) {
        $('.download').stop().animate({opacity:'1'},1000).css("background",'#00060d');
      }
      if(scrolltop<height) {
           $('.download').stop().animate({opacity:'0.8'},500).css("background",'none');
      }
  })


})



window.onload = function() {

   /***设置clear div的高度****/
    var clearHeight=$(".download").height();
    $(".loadbg").css("height",clearHeight);
    $(".clear").css("height",clearHeight);
}



  

