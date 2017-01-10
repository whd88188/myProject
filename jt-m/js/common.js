window.onload=function(){  //页面加载完后执行
    /***设置clear div的高度****/
    var clearHeight=$(".download").height();
    $(".loadbg").css("height",clearHeight);
    $(".clear").css("height",clearHeight);

    /***设置nav  div的高度****/
    var navHeight=$(".nav").height();
    var navWidth=$(".nav").width();
    $(".nav ul li").css("height",navHeight);
    $(".nav ul li").css("width",navWidth/4);

 }


$(document).ready(function(){  //文档加载后激活
   
    /******轮播图片*****/
    var hWid=$('.hot-p').width(); //设置首页轮播图片的宽带
    $('.img li').css({'width':hWid});
    //轮播图滚动
    var clone = $('.img li').eq(0).clone(); //克隆第一张图片
    $('.img').append(clone); //把克隆的图片添加进类为img的div
    var imgSize = $('.img li').size(); //获取图片数量
    for (var i = 0; i < imgSize-1 ; i++) {  //自动生成焦点图
        $('.num').append('<li></li>')
    }
    $('.num li').eq(0).addClass('on'); //设置第一个焦点图
    //配合css把焦点图设置居中
    var numWid=$('.num').width(); 
    $('.num').css({'margin-left':-(numWid/2+10)});

    var y = 0;
    $('.img li').on("swipeleft",function(){  //向左滑动
        var index=$(this).index();
        y=index;
        if (index==imgSize-2) {
            index=-1;
            $('.img').css('left',-(2*hWid));
        }
        $('.num li').eq(index+1).addClass('on').siblings().removeClass('on');
        $('.img').animate({left:-((index+1)*hWid)},300);
    });
    $('.img li').on("swiperight",function(){  //向右滑动
        var index=$(this).index();
        y=index-1;
        if (index==0) {
            index = imgSize-1;
            $('.img').css('left',-(imgSize-1)*hWid);
        }
        $('.num li').eq(index-1).addClass('on').siblings().removeClass('on');
        $('.img').animate({left:-((index-1)*hWid)},300);

    });
    var t = setInterval(move,3000); //设置定时器
    function move(){  //设置滚动函数
        y++;
        if (y==imgSize-1) {
            y=0;
            $('.img').css('left',-hWid);
        }
        $('.num li').eq(y).addClass('on').siblings().removeClass('on');
        $('.img').stop().animate({left:-(y*hWid)},300);
    }
     

    //二级页面点击导航图标出现导航栏
    $('.top-nav em').click(function(){  //点击导航栏图标，如果导航栏是隐藏，则出现；如果显示中则隐藏
        $('.top-nav ul').toggle();  //toggle()方法是隐藏和显示中切换
        $('.mask').toggle();  
    })
    $('.mask').click(function(){  //点击蒙层导航栏隐藏
        $('.top-nav ul').hide();
        $('.mask').hide();
    })

  
    /******首页新闻与新闻资讯tag切换******/ 
    $(".news>ul>li").click(function(){
        $(this).addClass("on").siblings().removeClass("on");
        var index = $(this).index();
        $(".news>div.newsbox").eq(index).removeClass("hide").siblings(".news>div.newsbox").addClass("hide");

        $(".news>div.newsbox").eq(index).children("ul").children().slice(0,7).show();  //默认显示条数,7条
        var size = $(".news>div.newsbox").eq(index).children("ul").children().size();
        var lisize = Math.floor(size/7);
        var i = 0;
        /*********点击加载更多**********/
        $(".news>div.newsbox").eq(index).children('.news_more').click(function(){
              if(i>=lisize){
                  $(this).children().remove();
                  $(this).append("<span>没有更多了</span>");
              }
              i++;
              $(".news>div.newsbox").eq(index).children("ul").children().slice((7*i),(7*i+7)).show();
              if(i==lisize){
                  $(this).children().remove();
                  $(this).append("<span>没有更多了</span>");
              }
        })
    })
    $('.news>ul>li').eq(0).trigger("click"); //自动执行点击事件，这步很重要


    /**游戏资料、游戏攻略,点击加载更多**/
    $(".data").children("ul").children().slice(0,8).show(); 
    var size2 = $(".data").children("ul").children().size();
    var lisize2 = Math.floor(size2/8);
    var n = 0;
    if(n>=lisize2-1){
         $('.data .news_more').children().remove();
         $('.data .news_more').append("<span>没有更多了</span>");
    }
    $(".data .news_more").click(function(){
        n++;
        $(".data").children("ul").children().slice((8*n),(8*n+8)).show();
        if(n==lisize2-1){
            $(this).children().remove();
            $(this).append("<span>没有更多了</span>");
        }
    }) 


    //判断终端信息
    var browser = {
        versions: function () {
        var u = navigator.userAgent, app = navigator.appVersion;
        return { //移动终端浏览器版本信息 
        ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端 
        android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或uc浏览器 
        iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器 
        iPad: u.indexOf('iPad') > -1, //是否iPad 
        };
        }(),
    }
    $(".download").click(function(){   //给ios系统加个提示
      if (browser.versions.iPhone || browser.versions.iPad || browser.versions.ios) {
        alert('IOS版正在紧密筹备中，敬请期待');  
      } 
    })
    
    
    //解决书名号不对齐问题,封装为函数以调用
    function align(){
        var litext = $(this).text();
        var tstr = litext.slice(0,1);
        if (tstr=="《") {
          $(this).css({'position':'relative','left':'-6px'});
       }
    }
    $('div.newsbox ul li em').each(align); //新闻资讯
    $('.data ul li em').each(align)  //攻略、资料


})

 



  

