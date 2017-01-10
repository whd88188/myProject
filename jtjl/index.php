<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>军团降临官网</title>
<meta charset="UTF-8" />
<meta name="keywords" content="军团降临，军团降临官网，军团降临游戏官网，军团降临官网首页，军团降临手游，
辉耀互娱军团降临，优依购互娱军团降临官网"/>
<meta name="description" content="《军团降临》是一款魔兽风格的全3D动作卡牌手游，召唤师根据随从特性选择不同的技能搭配，会有意想不到的效果；召唤师随着战局的变化，可随时将随从召唤入场或收回，胜负尽在一念间。" />
<meta name=“viewport” content=”width=device-width, initial-scale=1, maximum-scale=1″>
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript">
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
	if (browser.versions.iPhone || browser.versions.iPad || browser.versions.ios||browser.versions.android) {
	 	window.location.href = "http://jt.huiyaohuyu.com"; //移动端地址
	}	
 </script>
</head>
<body >
<div class="container">
	<!--头部导航-->
	<div class="navbox">
		<div class="nav">
			<div class="logo">
			 	<a href=""><img src="images/logo.png" ></a>
				<h2>军团降临</h2>
				<h3>新召唤玩法！</h3>
			</div>
			<div class="nav_li">	
				<ul >
					<a href=""><li class="on">官网首页</li></a>
					<a href="news/"><li>新闻中心</li></a>
					<a href="hero/"><li>英雄库</li></a>
					<!--<a href="date/"><li>游戏资料</li></a>-->
					<a href="strategy/"><li>游戏攻略</li></a>
					<a href="http://bbs.huiyaohuyu.com"><li>论坛中心</li></a>
				</ul>
			</div>
		</div>
	</div>

	<?php
		include 'manage/connect.php';
		/**首页背景图片**/
		$bg = mysql_query("SELECT * FROM banner where type='bg' ");
		$bgrow = mysql_fetch_array($bg);
		/**首页下载二维码**/
		$h_ewm = mysql_query("SELECT * FROM banner where type='ewm' and type2='home' ");
		$h_ewmrow = mysql_fetch_array($h_ewm);
		/**ios apk下载**/
		$ios = mysql_query("SELECT * FROM banner where type='apk' and type2='ios' ");
		$iosrow = mysql_fetch_array($ios);
		/**android apk下载**/
		$an= mysql_query("SELECT * FROM banner where type='apk' and type2='android' ");
		$anrow = mysql_fetch_array($an);

		//下面会在相应的地方引用
	?>
	<!--android/ios下载/图片轮播/新闻-->
	<div class="header" style="background-image: url(<?php echo $bgrow['imgUrl']; ?>)" > 
		<div class="headerbox">

			<span class="erwei"><img src="<?php echo $h_ewmrow['imgUrl']; ?>"><h3>扫描二维码下载</h3></span><!--下载二维码-->
			
			<!--
			<a  href="<?php echo $iosrow['clickUrl']; ?>"><div class="ios"><img src="images/ios.png" ></div></a>
			-->
			<a  href="<?php echo $anrow['clickUrl']; ?>"><div class="android"><img src="images/android1.png" ></div></a>
		</div>
		<!--轮播与新闻-->
		<div class="news">
			<div class="banner">
				<ul class="img">
					<?php

						$scroll = mysql_query("SELECT * FROM banner where type='scroll' and type2='p' order by sequance desc");
						while ($sclrow = mysql_fetch_array($scroll)) {
							echo "<li><a href='".$sclrow['clickUrl']."'><img src='".$sclrow['imgUrl']."'></a></li>";
						}
					?>
				</ul>
				<ul class="num">
					 <!--留空，用js 自动生成li-->
				</ul>
			</div>
			<div class="newsbox">
				<ul>
				 	<li class="on">最新</li>
				 	<li>新闻</li>
				 	<li>公告</li>
				 	<li>活动</li>
					<a href="news/"><span>更多 <img src="images/more.png" ></span></a>
				</ul>
				<div>
				 	<ul>
				 		<?php
				 			$new  = mysql_query("SELECT * FROM article where state='1' and homepage='1' and type='新闻' or type='公告' or type='活动' order by createTime desc limit 0,6");
				 			while ($new_row=mysql_fetch_array($new)) 
				 			{
				 				echo "<a href='news/detail.php?id=".$new_row['id']."'>
				 						<li><em>".$new_row['title']."</em><span>".$new_row['createTime']."</span></li>
				 					 </a>";
				 			}
				 		?>
				 	</ul>
				</div>
				<div class="hide">
				 	<ul>
						<?php
				 			$news  = mysql_query("SELECT * FROM article where state='1'and homepage='1'
				 					 and type='新闻' order by createTime desc limit 0,6");
				 			while ($news_row=mysql_fetch_array($news)) 
				 			{
				 				echo "<a href='news/detail.php?id=".$news_row['id']."'>
				 					  	<li><em>".$news_row['title']."</em><span>".$news_row['createTime']."</span></li>
				 					  </a>";
				 			}
				 		?>
				 	</ul>
				</div>
				<div class="hide">
				 	<ul>
				 		<?php
				 			$gg  = mysql_query("SELECT * FROM article where state='1'and homepage='1'and type='公告'  order by createTime desc limit 0,6");
				 			while ($gg_row=mysql_fetch_array($gg)) 
				 			{
				 				echo "<a href='news/detail.php?id=".$gg_row['id']."'>
				 					      <li><em>".$gg_row['title']."</em><span>".$gg_row['createTime']."</span></li>
				 					 </a>";
				 			}
				 		?>
				 	</ul>
				</div>
				<div class="hide">
				 	<ul>
					 	<?php
				 			$hd  = mysql_query("SELECT * FROM article where state='1'and homepage='1'and type='活动'  order by createTime desc limit 0,6");
				 			while ($hd_row=mysql_fetch_array($hd)) 
				 			{
				 				echo "<a href='news/detail.php?id=".$hd_row['id']."'>
				 					 	<li><em>".$hd_row['title']."</em><span>".$hd_row['createTime']."</span></li>
				 					 </a>";
				 			}
				 		?>
				 	</ul>
				</div>
			</div>
		</div>
	</div>
	<!--游戏特色-->
	<div class="game_tese">
		<div class="title">
			<img src="images/tese_dt.png"  >
		</div>
		<div class="game_banner">
			<img src="images/tesebg.jpg"  >

			<div class="banbox">
				<div class="left_btn"> 
					<div class="lbtn_img">	
						<img src="images/btn_left.png" >
					</div>	
				</div>
				<div class="center">
					<ul class="img">

						<?php

							$ft = mysql_query("SELECT * FROM banner where type='feature' order by sequance desc");
							while ($ftrow = mysql_fetch_array($ft)) {
								echo "<li><img src='".$ftrow['imgUrl']."'></li>";
							}
						?>

					</ul>
				</div>
				<div class="right_btn">
					<div class="rbtn_img">		
						<img src="images/btn_right.png" >
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--游戏资料-->
	<div class="game_date">
		<div class="title">
			<img src="images/tese_tt.png"  >
			<ul class="date_list">
				<li class="on"><i class="iconfont">&#xe608;</i>&nbsp;全部</li>
				<li><i class="iconfont">&#xe608;</i>&nbsp;召唤师</li>
				<li><i class="iconfont">&#xe608;</i>&nbsp;随从</li>
				<li><i class="iconfont">&#xe608;</i>&nbsp;坐骑</li>
			</ul>
		</div>
		<div class="pt_list">
			<ul>
				<a href="hero/?id=1"><li class="1"><img src="images/all1.png"><h4>艾路侍从</h4></li></a>
				<a href="hero/?id=2"><li><img src="images/all2.png"><h4>潜行专家</h4></li></a>
				<a href="hero/?id=3"><li><img src="images/all3.png"><h4>暗夜射手</h4></li></a>
				<a href="hero/?id=4"><li><img src="images/all4.png"><h4>宝石男巫</h4></li></a>
				<a href="hero/?id=5"><li><img src="images/all5.png"><h4>毒泥怪</h4></li></a>
				<a href="hero/?id=6"><li><img src="images/all6.png"><h4>冰霜鱼人</h4></li></a>
				<a href="hero/?id=7"><li><img src="images/all7.png"><h4>部落酋长</h4></li></a>
				<a href="hero/?id=8"><li><img src="images/all8.png"><h4>草原狮</h4></li></a>
				<a href="hero/?id=9"><li><img src="images/all9.png"><h4>豺狼人头领</h4></li></a>
				<a href="hero/"><li class="more">更多</li></a>
			</ul>
		</div>
		<div class="pt_list hide">
			<ul>
				<a href="hero/?id=10"><li><img src="images/53.png"><h4>珍娜</h4></li></a>
				<a href="hero/?id=11"><li><img src="images/51.png"><h4>艾克</h4></li></a>
				<a href="hero/?id=12"><li><img src="images/52.png"><h4>雷克</h4></li></a>
			</ul>
		</div>
		<div class="pt_list hide">
			<ul>
				<a href="hero/?id=1"><li><img src="images/all1.png"><h4>艾路随从</h4></li></a>
				<a href="hero/?id=2"><li><img src="images/all2.png"><h4>潜行专家</h4></li></a>
				<a href="hero/?id=3"><li><img src="images/all3.png"><h4>暗夜射手</h4></li></a>
				<a href="hero/?id=4"><li><img src="images/all4.png"><h4>宝石男巫</h4></li></a>
				<a href="hero/?id=5"><li><img src="images/all5.png"><h4>北方牧师</h4></li></a>
				<a href="hero/?id=6"><li><img src="images/all6.png"><h4>冰霜鱼人</h4></li></a>
				<a href="hero/?id=7"><li><img src="images/all7.png"><h4>部落酋长</h4></li></a>
				<a href="hero/?id=8"><li><img src="images/all8.png"><h4>草原狮</h4></li></a>
				<a href="hero/?id=9"><li><img src="images/all9.png"><h4>豺狼人头领</h4></li></a>
				<a href="hero/"><li class="more">更多</li></a>
			</ul>
		</div>
		<div class="pt_list hide">
			<ul>
				 
			</ul>
		</div>
	</div>
	<!--尾部-->
	<div class="footer">
		<div class="footer_box">
			 <div class="contact">
			    <!--
			 	<p><span>QQ : 2092534589 &nbsp;   <span  style="margin-left: 205px;"> 魔兽了么</span> <span style="margin-left: 280px;">魔兽了么</span>  </p>
			 	<p><span>官方群：555253110 <span  style="margin-left: 280px;">   微信公众号</span> <span style="margin-left: 266px;">官方微博</span>  </p>
				<p>客服邮箱：2092534589@qq.com</p>
				-->
				<p>QQ : 2092534589 &nbsp;&nbsp;&nbsp;官方群：555253110&nbsp;&nbsp;&nbsp;客服邮箱：2092534589@qq.com</p>
				<strong style="margin-top: 10px;"><em style="color: #ddd697;">健康游戏公告	</em>：抵制不良游戏，拒绝盗版游戏。注意自我保护，谨防受骗上当。适度游戏益脑，沉迷游戏伤身。合理安排时间，享受健康生活。</strong>
				
			 </div>
			<div class="copyright">
				<a href="http://www.huiyaohuyu.com"><img src="images/logo_ft.png" alt=""></a>
				<p style="position: absolute;top: 30px;left: 530px;">优依购互娱科技有限公司版权所有 2015-2016 粤ICP备15108634号-1 </p>
				<p style="position: absolute;top: 50px;left: 576px;">《网络文化经营许可证》粤网文〔2016〕1029-186号</p>
			</div>
		</div>
	</div>	 
</div>
<!--cnzz统计-->
<script type="text/javascript">
	var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1260597582'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1260597582%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>