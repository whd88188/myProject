$(document).ready(function(){
   
/********视频播放********/ 

  $(".play").click(function(){
    $('.play').hide()
    $('video').show();
    document.getElementById('video').load();
    document.getElementById('video').play();
  })

 /*********鼠标在播放按钮悬停***********/
  $(".video_play img").mouseover(function(){
    $(".video_play img").stop().animate({width:'17%',left:'41.3%',top:'31.5%'},400);
  })
  $(".video_play img").mouseout(function(){
    $(".video_play img").stop().animate({width:'15%',left:'42.3%',top:'32.5%'},400);
  })
 

})


window.onload=function(){
  $('.play').show();

}



  

