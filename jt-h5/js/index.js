$(function(){
	var gp = $(".game-info>p");
	var arrow = gp.next();
	if (gp.height() > 48) {
		gp.css({
			"height" : "48px",
			"-webkit-line-clamp" : "2"
		});
		arrow.show();
	}
	var flag = true;
	arrow.click(function(){
		if (flag) {
			gp.attr("style","height: auto;")	
			arrow.addClass("active");
		}else{
			gp.attr("style","height: 48px;-webkit-line-clamp:2");
			arrow.removeClass("active");
		}
		flag = !flag;
	});
	//点击视频
	$("#video").click(function(){
        document.getElementById('video').load();
        document.getElementById('video').play();
    })

	//高清图查看
	$(".img-swiper ul li").width(($(".img-swiper").width()*0.4));
    $(".img-swiper ul").width(($(".img-swiper ul li").width()+5)*$(".img-swiper ul li").length);

	$(".img-swiper ul li").click(function(e){
		var index = $(this).index();
		$(".swiper").show();
		var mySwiper = new Swiper('.swiper-container', {
		//autoplay:3000,//可选选项，自动滑动
		pagination : '.swiper-pagination',
		loop : true,
		autoplayDisableOnInteraction: false,
	    });
        mySwiper.slideTo(index+1);
	});
	
	$(".swiper").click(function(){
		$(this).hide();
	});
	$(".swiper-container").click(function(e){
		e.stopPropagation();
	});
});
