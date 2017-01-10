<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>源计划官网</title>
<meta charset="UTF-8" />
<meta name="keywords" content="源计划手游，源计划游戏，源计划官网，源计划游戏官网，辉耀互娱源计划"/>
<meta name="description" content="源计划游戏，源计划官网，游戏，手游" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<!--cnzz统计代码-->
<script type="text/javascript">
	var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cspan id='cnzz_stat_icon_1261031278'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1261031278%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
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
</script>
</head>
<body>
<div class="container" >
	<!--点击视频播放出现层-->
	<div id="mask"></div>
    <!--头部header-->
	<div class="header">
		<a href=""><img src="images/logo.png" class="logo"></a>
		<img src="images/navbg.png" class="navbg">
		<div class="nav">
			<ul>
				<a href=""><li class="on">官网首页</li></a>
				<a href="news/"><li>新闻中心</li></a>
				<a href="data/"><li>游戏资料</li></a>
				<a href="strategy/"><li>游戏攻略</li></a>
				<a href="hero/"><li>英雄库</li></a>
				<p><span>关注公共号赢大奖 </span><img src="images/hwc.png"><img src="images/navwc.png" class="navwc" ></p>
			</ul>
		</div>
	</div>
	<!--媒体播放和扫描下载-->	
	<div class="load_video">
		<img src="images/download.png">
		<div id="v_play"  ><img src="images/video.png" alt=""></div>
		<div class="videobg">
 			<div class="top">游戏介绍<b>&times;</b></div>
			<div><video src="raw/yuan.mp4" controls="controls" id="video">你的浏览器不支持</video></div>
		</div>

		 <?php
		 	include 'manage/connect.php';
		 	//二维码	
		 	$ewm = mysql_query("SELECT * FROM banner where type='ewm' ");
		 	$ewmrow = mysql_fetch_array($ewm);
		 	//android 下载
		 	$an = mysql_query("SELECT * FROM banner where type='apk' and type2='android' ");
		 	$anrow = mysql_fetch_array($an);
		 	//ios下载
		 	$ios = mysql_query("SELECT * FROM banner where type='apk' and type2='ios' ");
		 	$iosrow = mysql_fetch_array($ios);

		 	//领取礼包
		 	$li = mysql_query("SELECT * FROM banner where type='apk' and type2='libao' ");
		 	$lirow = mysql_fetch_array($li);
		 ?>
		<!--二维码-->
		<div class="erweima"><img src="<?php echo $ewmrow['imgUrl']; ?>" ></div>
		<!--ios下载-->
		<a href="<?php echo $iosrow['clickUrl'];?>"><div class="download1"></div></a>
		<!--领取礼包-->
		<a href="<?php echo $lirow['clickUrl'];?>"><div class="download2"></div></a>

	</div>
	<!--滚动banner和文章列表-->
	<div class="scroll_news">

		<div class="scroll">
			<ul class="img">
				<?php 
					//轮播图
					$scroll = mysql_query("SELECT * FROM banner where type='scroll' and type2='pc' order by sequance desc");
					while ($scl=mysql_fetch_array($scroll)) 
					{
						echo "<li><a href='".$scl['clickUrl']."'><img src='".$scl['imgUrl']."'></a></li>";
					}
				?>
			</ul>
			<ul class="num">
				<!--留空，用js自动生成li-->
			</ul>
		</div>
		<div class="news">
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
						//最新
						$n = mysql_query("SELECT * FROM article where state='1' and homepage='1' and ( type='新闻'
							 or type='公告' or type='活动' ) order by createTime desc limit 0,6 ");
						while ($nrow=mysql_fetch_array($n)) 
						{
							echo "<a href='news/detail.php?id=".$nrow['id']."'><li><em>[".$nrow['type']."]</em>".$nrow['title']."<span>".$nrow['createTime']."</span></li></a>";
						}
					?> 
			 	</ul>
			</div>
			<div class="hide">
			 	<ul>
			 		<?php 
						//新闻
						$news = mysql_query("SELECT * FROM article where state='1' and homepage='1' and type='新闻' order by createTime desc limit 0,6");
						while ($newsrow=mysql_fetch_array($news)) 
						{
							echo "<a href='news/detail.php?id=".$newsrow['id']."'><li><em>[".$newsrow['type']."]</em>".$newsrow['title']."<span>".$newsrow['createTime']."</span></li></a>";
						}
					?> 
			 	</ul>
			</div>
			<div class="hide">
			 	<ul>
			 		<?php 
						//公告
						$gg = mysql_query("SELECT * FROM article where state='1' and homepage='1' and type='公告' order by createTime desc limit 0,6");
						while ($ggrow=mysql_fetch_array($gg)) 
						{
							echo "<a href='news/detail.php?id=".$ggrow['id']."'><li><em>[".$ggrow['type']."]</em>
								 ".$ggrow['title']."<span>".$ggrow['createTime']."</span></li></a>";
						}
					?> 
			 	</ul>
			</div>
			<div class="hide">
			 	<ul>
			 		 <?php 
						//活动
						$hd = mysql_query("SELECT * FROM article where state='1' and homepage='1' and type='活动' order by createTime desc limit 0,6");
						while ($hdrow=mysql_fetch_array($hd)) 
						{
							echo "<a href='news/detail.php?id=".$hdrow['id']."'><li><em>[".$hdrow['type']."]</em>
								 ".$hdrow['title']."<span>".$hdrow['createTime']."</span></li></a>";
						}
					?> 
			 	</ul>
			</div>
		</div>
	</div>
	<!--游戏攻略和游戏资料-->
	<div class="gamebg">
		<div class="game">
			<div class="game_strategy">
				<div class="title"><h2>游戏攻略</h2><a href="strategy/"><span>更多 <img src="images/more.png" ></span></a></div>
				<div class="gp">
					<?php
						//游戏攻略展示图 left
						$l = mysql_query("SELECT * FROM banner where type='gl' and type2='left' ");
						$lrow = mysql_fetch_array($l);
						//right
						$r = mysql_query("SELECT * FROM banner where type='gl' and type2='right' ");
						$rrow = mysql_fetch_array($r);

						echo "<a href='".$lrow['clickUrl']."'><div class='left'><img src='".$lrow['imgUrl']."'></div></a>";
						echo "<a href='".$rrow['clickUrl']."'><div class='right'><img src='".$rrow['imgUrl']."'></div></a>";
					?>
				</div>
				<div class="strategy_list">
					<ul>
						<?php
							$stg = mysql_query("SELECT * FROM article where type='攻略' and state='1' 
								and homepage='1' order by createTime desc limit 0,4");
							 
							while ( $stgRow = mysql_fetch_array($stg) ) 
							{
								$t = strtotime($stgRow['createTime']);
								$time = date("Y/m/d",$t);
								echo "<a href='strategy/detail.php?id=".$stgRow['id']."'><li>".$stgRow['title']."<span>".$time."</span></li></a>";
							}
						?>
					</ul>
				</div>
			</div>
			<div class="game_date">
				<div class="title"><h2>游戏资料</h2><a href="data/"><span>更多 <img src="images/more.png" ></span></a></div>
				<div class="atbg">
					<h4>新手指引</h4>
					<ul>
						<?php
							$xs = mysql_query("SELECT * FROM data where type='新手指引' and state='1' 
								and homepage='1' order by createTime desc limit 0,10 ");
							while ($xsrow=mysql_fetch_array($xs)) 
							{
								echo "<a href='data/detail.php?id=".$xsrow['id']."'><li><i class='iconfont'>&#xe601;</i>&nbsp;".$xsrow['title']."</li></a>";
							}
						?>
					</ul>
				</div>
				<div class="pvp">
					<h4>基地系统</h4>
					<ul>
						<?php
							$jd = mysql_query("SELECT * FROM data where type='基地系统' and state='1' 
								and homepage='1' order by createTime desc limit 0,10 ");
							while ($jdrow=mysql_fetch_array($jd)) 
							{
								echo "<a href='data/detail.php?id=".$jdrow['id']."'><li><i class='iconfont'>&#xe601;</i>&nbsp;".$jdrow['title']."</li></a>";
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--英雄库hero-->
	<div class="hero">
		<div class="hero_top">
			 <h2>英雄库</h2>
			 <ul>
			 	<a href="hero/?id=1#href"><li class="on"><em class="iconfont">&#xe604;</em>&nbsp;陆战队</li></a>
			 	<a href="hero/?id=1#href"><li style="width: 110px;"><em class="iconfont">&#xe604;</em>&nbsp;半机械步兵</li></a>
			 	<a href="hero/?id=1#href"><li><em class="iconfont">&#xe604;</em>&nbsp;导弹兵</li></a>
			 	<a href="hero/?id=1#href"><li><em class="iconfont">&#xe604;</em>&nbsp;坦克</li></a>
			 	<a href="hero/?id=5#href"><li><em class="iconfont">&#xe604;</em>&nbsp;机甲</li></a>
			 	<a href="hero/?id=6#href"><li><em class="iconfont">&#xe604;</em>&nbsp;导弹车</li></a>
			 	<a href="hero/?id=7#href"><li><em class="iconfont">&#xe604;</em>&nbsp;飞机</li></a>
			 </ul>
		</div>
		<div class="hero_list">
			<ul>
				<li><h3>斯图尔特</h3><h4>斯图尔特</h4><a href="hero/#href" name="href"><img src="images/zhi1.jpg" ></a></li>
				<li><h3>戴卡德</h3><h4>戴卡德</h4><a href="hero/#href" name="href"><img src="images/zhi2.jpg" ></a></li>
				<li><h3>贝利</h3><h4>贝利</h4><a href="hero/#href" name="href"><img src="images/zhi3.jpg" ></a></li>
				<li><h3>阿修斯</h3><h4>阿修斯</h4><a href="hero/#href" name="href"><img src="images/zhi4.jpg" ></a></li>
				<li><h3>艾玛</h3><h4>艾玛</h4><a href="hero/#href" name="href"><img src="images/zhi5.jpg" > </a></li>
				<li><h3>米娅</h3><h4>米娅</h4><a href="hero/#href" name="href"><img src="images/zhi6.jpg" > </a></li>
				<li><h3>克莱德</h3><h4>克莱德</h4><a href="hero/#href" name="href"><img src="images/zhi7.jpg" ></a></li>
			</ul>
		</div>
	</div>	
	<!--联系方式contact-->
	<!--
	<div class="contact">
		<ul>
			<li class="ct1"><em>2092434589</em><b>2153754487</b><br/><span>官方群：177697981</span></li>
			<a href=""><li class="ct2"><span>源计划<br/>微信公众号</span></li></a>
			<a href=""><li class="ct3"><span>源计划<br/>官方微博</span></li></a>
		</ul>
	</div>
	-->
	<!--底部footer-->
	<div class="footer">
		<div class="ft_box">
			<p class="f_ct">客服qq：2153754487 &nbsp;&nbsp;&nbsp;&nbsp; 官方群：177697981</p>
			<p><em>健康游戏公告：</em>抵制不良游戏，拒绝盗版游戏。注意自我保护，谨防受骗上当。适度游戏益脑，沉迷游戏伤身。合理安排时间，享受健康生活。</p>
			<div class="copyright">
				<div class="left"><a href="http://www.huiyaohuyu.com/"><img src="images/logo_ft.png" ></a></div>
				<div class="right">
					<p>优依购互娱科技有限公司版权所有 2015-2016 <a href="">粤ICP备15108634号-2</a></p>
					<p>《网络文化经营许可证》粤网文〔2016〕1029-186号</p>
				</div>
			</div>
		</div>
	</div>	
</div>

</body>
</html>