$(document).ready(function(){
    /*****首页header导航去掉官网首页的左边框*****/
  	$(".header .nav ul li").eq(0).css("border-left","none");


    /*****视频播放*****/ 
    $("#v_play img").hover(function(){
        $("#v_play img").stop().animate({width:81,height:81,left:580,top:140},200);
    },function(){
        $("#v_play img").stop().animate({width:77,height:77,left:582,top:142},200);
    })

    $("#v_play").click(function(){
        $(".videobg").css("display","block");
        $("#mask").css("display","block");
        document.getElementById('video').load();
        document.getElementById('video').play();
    })

    $(".load_video .videobg .top b").click(function(){
        $(".videobg").css("display","none");
        $("#mask").css("display","none");
        document.getElementById('video').pause();
    })

    $("#mask").click(function(){
        $(".videobg").css("display","none");
        $("#mask").css("display","none");
        document.getElementById('video').pause();  //这个不能用jq获取，因为play()和pause()不是jq的方法，是js的方法。
    })
 

    /******首页轮播图片******/ 
    $(".img li").eq(0).show(); //显示第一张图片
    //自动生成 焦点
    var lisize_=$(".img li").size();
    var li="<li></li>" ;
    for(i=1;i<=lisize_;i++){
        $(".num").append(li);
    }
    $(".num li").eq(0).addClass("active")

    $(".num li").mouseover(function(){
        $(this).addClass("active").siblings().removeClass("active");
        var index=$(this).index();
        i=index;   //鼠标移开之后，轮播图会接着移开的数字往后继续
        $(".img li").eq(index).stop().fadeIn(300).siblings().stop().fadeOut(300);
    })

    var i=0;
    var t=setInterval(move,3000);
    function move(){
        i++;
        if(i==lisize_){
            i=0;
        }
        $(".num li").eq(i).addClass("active").siblings().removeClass("active");
        $(".img li").eq(i).stop().fadeIn(300).siblings().stop().fadeOut(300);
    }
    //当鼠标移上.scroll的时候清除自动轮播
    $(".scroll").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(move,3000);
    });

    /******首页英雄库切换******/
    $(".hero_top ul li").click(function(){
        $(this).addClass("on").siblings().removeClass("on");
        var index=$(this).index();
        $(".hero .hero_list").eq(index).removeClass("hide").siblings(".hero .hero_list").addClass("hide");
    })
    
    $(".hero .hero_list ul li").hover(function(){
        $(this).children("a").children("img").stop().animate({width:178,height:316,left:-3.3,top:-6.1},300);
        $(this).children("h4").animate({height:"show"},300);
        $(this).children("h4").css({"background-color":"rgba(245,245,245,0.9)","color":"#1b212f","font-size":"22px","font-weight":"bold"});
    },function(){
        $(this).children("a").children("img").stop().animate({width:171,height:304,left:0,top:0},300);
        $(this).children("h3").siblings("h4").stop().animate({height:"hide"},300);
        $(this).children("h4").css({"background-color":"rgba(245,245,245,0.9)","color":"#1b212f","font-size":"22px"});
    })


    /******首页新闻tag切换******/ 
    $(".news>ul li").mouseover(function(){
        $(this).addClass("on").siblings().removeClass("on");
        var index=$(this).index();
        $(".news>div").eq(index).removeClass("hide").siblings(".news>div").addClass("hide");  
    })


    /******英雄库页   指挥官轮播*****/
    var  y = 0;
    var lisize=Math.ceil($(".hbox ul.detail li").size()/8);
    var liWidth=$(".hbox ul.detail li").width();
   
    $(".ul_btn .right").click(function(){
        y++;
        if(y==lisize){
            y=0;
        }
        $(".hbox ul.detail").stop().animate({left:-y*(920)},400);
    })
    $(".ul_btn .left").click(function(){
        y--;
        if (y==-1) {
            y=lisize-1;
        }
        $(".hbox ul.detail").stop().animate({left:-y*(920)},400);
    })

    $(".hbox ul.detail li").mouseover(function(){
        $(this).children("div").stop().animate({width:"toggle"},300);
        /**指挥官属性强化 条形图长度自动生成****/
        var num1=parseInt($(this).children("div").children("div").children("p").children("em.num1").text());
        $(this).children("div").children("div").children("p").children("em.num1").siblings("span.q1").css("width",(num1*3));

        var num1=parseInt($(this).children("div").children("div").children("p").children("em.num2").text());
        $(this).children("div").children("div").children("p").children("em.num2").siblings("span.q2").css("width",(num1*3));

        var num1=parseInt($(this).children("div").children("div").children("p").children("em.num3").text());
        $(this).children("div").children("div").children("p").children("em.num3").siblings("span.q3").css("width",(num1*3));
    })
    $(".hbox ul.detail li").mouseout(function(){
        $(this).children("div").stop().animate({width:"toggle"},300);
    })

 
    /******英雄库页   机甲tag切换*****/
    $("ul.herolist li").click(function(){
        $(this).addClass("on").siblings().removeClass("on");
        var index=$(this).index();
        $(".hero_dt").eq(index).removeClass("hide").siblings(".hero_dt").addClass("hide");

        var n = 0;
        var clone=$(".hero_dt").eq(index).children().eq(2).children().eq(0).clone();
        $(".hero_dt").eq(index).children().eq(2).append(clone);
        var size=$(".hero_dt").eq(index).children().eq(2).children().size();
    
        $(".hero_dt").eq(index).children(".l_btn").click(function(){
            n++;
            if(n==size){
                $(".hero_dt").eq(index).children().eq(2).css("left","0");
                n=1;
            }
            $(".hero_dt").eq(index).children().eq(2).stop().animate({left:-n*1039},400);
        })

        $(".hero_dt").eq(index).children(".r_btn").click(function(){
            n--;
            if(n==-1){
              $(".hero_dt").eq(index).children().eq(2).css("left",-(size-1)*1039);
              n=size-2;
            }
            $(".hero_dt").eq(index).children().eq(2).stop().animate({left:-n*1039},400);
         })
    })

    $("ul.herolist li").eq(0).click(); 

    /******新闻子页 新闻切换******/ 
    $(".news_list>ul>li").mouseover(function(){
        $(this).addClass("on").siblings().removeClass("on");
        var index=$(this).index();
        $(".news_list>div").eq(index).removeClass("hide").siblings(".news_list>div").addClass("hide");
    })


    //判断设备
    var browser = {
        versions: function () {
            var u = navigator.userAgent, app = navigator.appVersion;
            return {     //移动终端浏览器版本信息
                mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
            };
        }(),
        language: (navigator.browserLanguage || navigator.language).toLowerCase()
    }            
    if (browser.versions.mobile) {//判断是否是移动设备打开
        window.location.href="http://m.yjhgame.com"
    }

  
})



  

