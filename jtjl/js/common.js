$(document).ready(function(){

/******监听滚动条事件,改变悬浮背景******/ 
  $(window).scroll(function(){
     var scrollTop = $("body").scrollTop();
     if (scrollTop>820) {
      $(".navbox").css("background-color","rgba(5,16,22,1)");
     }
     if (scrollTop<820) {
      $('.navbox').css("background-color","rgba(5,16,22,0.8)")
     }
  })

/*********首页轮播图片********/ 
  $(".img li").eq(0).show();    //显示第一张图片
  var lisize=$(".banner .img li").size();   //获取轮播图多少  

//根据轮播图多少动态生成焦点
  for (var i = 1; i <= lisize; i++) {
    $(".banner .num").append("<li><i>&#xe608;</i></li>")
  }
  $(".num li").eq(0).addClass("active");
  $(".num li i").addClass("iconfont iconf")


  $(".num li").mouseover(function(){
     $(this).addClass("active").siblings().removeClass("active");
     var index=$(this).index();
     i=index;
     $(".img li").eq(index).fadeIn(300).siblings().stop().fadeOut(300);
  })

  var i=0;
  var t=setInterval(move,3000);
  function move(){
    i++; 
    if(i==lisize){
      i=0;}
    $(".num li").eq(i).addClass("active").siblings().removeClass("active");
    $(".img li").eq(i).fadeIn(300).siblings().fadeOut(300);
  }
//鼠标移上去清除自动轮播
  $(".banner").hover(function(){  
    clearInterval(t);
  },function(){
    t=setInterval(move,3000);
  });
 

/******首页新闻tag切换******/ 
  $(".newsbox>ul li").mouseover(function(){
      $(this).addClass("on").siblings().removeClass("on");
      var index=$(this).index();
      $(".newsbox>div").eq(index).removeClass("hide").siblings(".newsbox>div").addClass("hide");
  })
   
 
  

/*********首页游戏特色轮播图*************/
  var n = 0;
  $(function(){

    var  clone = $(".game_tese .game_banner .banbox .center .img li").eq(0).clone();
    $(".game_tese .game_banner .banbox .center .img").append(clone);
    var _size = $(".game_tese .game_banner .banbox .center .img li").size();
    //alert(_size);
    var width=$(".game_tese .game_banner .banbox .center").width();
    $(".banbox .right_btn ").click(function(){
      n++
      if(n==_size){
        $(".banbox .center .img").css("left","0");
        n=1
      }
      $(".banbox .center .img").stop().animate({left:(-n*width)},500);
    })

    $(".banbox .left_btn").click(function(){
        n--
        if(n==-1){
          $(".banbox .center .img").css("left",-(_size-1)*width);
          n=_size-2;
        }

        $(".banbox .center .img").stop().animate({left:-n*width},500);
    })
  })


  /******首页 英雄库tag切换******/ 
  $("ul.date_list li").mouseover(function(){
    $(this).addClass("on").siblings().removeClass("on");
    var Index=$(this).index();
    // $(".pt_list").eq(Index).siblings(".pt_list").hide()
    $(".pt_list").eq(Index).fadeIn(800).siblings(".pt_list").stop().fadeOut(0);  //removeClass("hide").siblings(".game_date .pt_list").addClass("hide");
  })


  $(".pt_list ul a li").hover(function(){
    $(this).children("img").stop().animate({width:156,left:-2,top:-5.2},300);
    $(this).children("h4").stop().animate({width:156,left:-2,top:-5.2},300);
  },function(){
    $(this).children().stop().animate({width:148,left:0,top:0},300);
    $(this).children("h4").stop().animate({width:148,left:0,top:0},300);
})



 /*************英雄库页 英雄tag切换*************/
  $(".h_right ul li").click(function(){
    $(this).children().removeClass("hide").parent().siblings().children().addClass("hide");
    var index=$(this).index();
    $(".h_left>div.all").eq(index).removeClass("hide").siblings(".h_left>div.all").addClass("hide");

    $(".h_left>div.all").eq(index).siblings().children().eq(0).children(".hero_detail").children().children().hide();

    if($(".hero_page").css("display")=="none"){
        $(".hero_page").show();
    }
  })


 /*************英雄库页的分页***************/
  var z = 0;
  $(function(){
    $(".all_down").click(function(){
      var index=$(this).index();
      var lisize=$(this).parent().siblings().children().eq(0).children().size();
      var size1=Math.ceil(lisize/15);
      z++
      if(z==size1){
        z=0
      }
      $(this).parent().siblings().children().eq(0).stop().animate({top:-z*728},500);
    })

    $(".all_up").click(function(){
      var index=$(this).index();
      var lisize=$(this).parent().siblings().children().eq(0).children().size();
      var size1=Math.ceil(lisize/15);
      z--
      if(z==-1){
        z=size1-1;
      }
      $(this).parent().siblings().children().eq(0).stop().animate({top:-z*728},500);
    })
  })

/*************英雄库页  随从tag切换***************/
  $("ul.suinav li").click(function(){
    $(this).children().addClass("on").parent().siblings().children().removeClass("on");
    var index2=$(this).index();
    $(".sui").eq(index2).removeClass("hide").siblings(".sui").addClass("hide");

    var lisize2=$(".sui").eq(index2).children().children().size();
    var size2=Math.ceil(lisize2/15);
    var t=0
    
    $(".sui_down").click(function(){
        t++
        if(t==size2){
          t=0
        }
        $(".sui").eq(index2).children().stop().animate({top:-t*728},500);
    })

    $(".sui_up").click(function(){
        t--
        if(t==-1){
          t=size2-1;
        }
        $(".sui").eq(index2).children().stop().animate({top:-t*728},500);
    })
  })

/***************召唤师详情切换**************/
  $(".zhaoList li").click(function(){
    $(this).children().addClass("on").parent().siblings().children().removeClass("on");
    var index=$(this).index();

    $(".zhao_allList>div").eq(index).removeClass("hide").siblings("div").addClass("hide");
  })

/*************英雄库页  英雄详情***************/
  $(".hero_img li").click(function(){
    $(".hero_page").hide();
    var index=$(this).index();
    $(this).parent().siblings().children().children().eq(index).show();
  })

  $(".back").click(function(){
    $(".hero_page").show();
    var index=$(this).index();
    $(this).parent().hide();
  })

/***************新闻页 tag切换*****************/
$(".lists>ul li").mouseover(function(){
      $(this).addClass("on").siblings().removeClass("on");
      var index=$(this).index();
      $(".lists>div").eq(index).removeClass("hide").siblings(".lists>div").addClass("hide");
    })


/*********游戏资料页  去掉最后个li 右边的border*********/
$("ul.date_detail li:last").css("border-right","none");

//解决书名号不对齐问题,封装为函数以调用
    function align(){
        var litext = $(this).text();
        var tstr = litext.slice(0,1);
        if (tstr=="《") {
          $(this).css({'position':'relative','left':'-6px'});
       }
    }

    $('.newsbox>div ul li em').each(align); //新闻资讯
    $('.lists>div ul li em').each(align)  //攻略、资料


})



  

