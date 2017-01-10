<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>军团降临</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
	<meta name="keywords" content="军团降临，军团游戏，辉耀互娱军团，军团，军团再临">
	<meta name="decsription" content="军团降临，军团再临">
	<link rel="stylesheet"  href="css/style.css">
	<link rel="icon" href="images/favicon.ico" type="image/X-icon">
	<script src="js/jquery-1.9.0.min.js"></script>
	<script src="js/common.js"></script>
	<script src="js/jquery.mobile.custom.min.js"></script>
	<!--cnzz统计代码-->
	<script type="text/javascript">
	 	var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1260597582'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1260597582' type='text/javascript'%3E%3C/script%3E"));
	</script>

 
</head>
<body>
	<?php
		include 'php/connect.php'; //引入链接数据库文件
		include 'php/download.php'; //引入悬浮框下载文件，每个页面都要引入
		include 'php/update.php';  //版本更新跳转地址
		//微信公众号二维码
		$ggh =  mysql_query("SELECT * FROM banner where type='ewm' and type2='ggh' ");
		$gghRow = mysql_fetch_array($ggh);

		//qq群二维码
		$qqq =  mysql_query("SELECT * FROM banner where type='ewm' and type2='qqq' ");
		$qqqRow = mysql_fetch_array($qqq);
		
	?>
	<div class="container">
	<!--下载悬浮层-->
	<a href="<?php echo $loadRow['clickUrl']; //引入悬浮框下载文件实现 ?>"><div class="loadbg"><div class="download"><img src="images/download.jpg"></div></div></a>
	<div class="clear"></div>	
	<!--头部部分， 背景图-->
	<div class="head">
		<img src="images/bg.jpg" >
		<div class="nav">
			<ul>
			 	<a href="<?php echo $updateRow['clickUrl']; ?>" name="版本更新"><li></li></a>
			 	<a href="data/" name="游戏资料"><li></li></a>
			 	<a href="strategy/" name="游戏攻略"><li></li></a>
			 	<a href="http://bbs.huiyaohuyu.com" name="玩家论坛"><li></li></a>
			</ul>
		</div>
	</div>
	<!--热门活动-->
	<div class="hot">
		<h2><img src="images/hot.jpg" alt=""></h2>
		<div class="hot-p">
			<ul class="img">
			<?php
				//热门活动图片与跳转链接
				$hot = mysql_query("SELECT * FROM banner where type='scroll' and type2='m' order by sequance desc");
				while ($hotRow = mysql_fetch_array($hot)) {
					echo "<li><a href='".$hotRow['clickUrl']."'><img src='http://jtjl.huiyaohuyu.com/".$hotRow['imgUrl']."'></a></li>";
				};
			?>
			</ul>
			<ul class="num">
				<!--自动生成焦点图-->
			</ul>
		</div>
	</div>
	 <!--新闻-->
	 <div class="news">
	 		<ul>
	 			<li class="on">最新</li>
	 			<li>新闻</li>
	 			<li>公告</li>
	 			<li>活动</li>
	 		</ul>
	 		<div class="newsbox">
	 			<ul>
	 				<?php
				 		$new = mysql_query("SELECT * FROM article where state='1' and homepage='1' and 
				 				type='新闻' or type='公告' or type='活动' order by createTime desc limit 0,5");
				 		while ($new_row=mysql_fetch_array($new)) 
				 		{
				 			echo "<li class=>
				 					<a href='article/detail.php?id=".$new_row['id']."'>
				 						<em>".$new_row['title']."</em><span>".$new_row['createTime']."</span>
				 					</a>
				 				 </li>";
				 		}
				 	?>
	 			</ul>
	 		</div>
	 		<div class="newsbox hide">
	 			<ul>
	 				<?php
				 		$news = mysql_query("SELECT * FROM article where state='1' and homepage='1' and 
				 			     type='新闻' order by createTime desc limit 0,5");
				 		while ($news_row=mysql_fetch_array($news)) 
				 		{
				 			echo "<li>
				 					<a href='article/detail.php?id=".$news_row['id']."'>
				 						<em>".$news_row['title']."</em><span>".$news_row['createTime']."</span>
				 					</a>
				 				 </li>";
				 		}
				 	?>	 
	 			</ul>
	 		</div>
	 		<div class="newsbox hide">
	 			<ul>
	 				<?php
				 		$gg = mysql_query("SELECT * FROM article where state='1' and homepage='1' and 
				 			  type='公告' order by createTime desc limit 0,5");
				 		while ($gg_row=mysql_fetch_array($gg)) 
				 		{
				 			echo 
				 			"<li>
				 				<a href='article/detail.php?id=".$gg_row['id']."'>
				 					<em>".$gg_row['title']."</em><span>".$gg_row['createTime']."</span>
				 				</a>
				 			</li>";
				 		}
				 	?>
	 			</ul>
	 		</div>
	 		<div class="newsbox hide">
	 			<ul>
	 				<?php
				 		$hd  = mysql_query("SELECT * FROM article where state='1' and homepage='1' and type='活动' order by createTime desc limit 0,5");
				 		while ($hd_row=mysql_fetch_array($hd)) 
				 		{
				 			echo 
				 			"<li>
				 				<a href='article/detail.php?id=".$hd_row['id']."'>
				 					<em>".$hd_row['title']."</em><span>".$hd_row['createTime']."</span>
				 				</a>
				 			 </li>";
				 		}
				 	?>
	 			</ul>
	 		</div>
	 </div>
	 <a href="article/"><div class="news_more">更多&nbsp;<img src="images/more.jpg" alt=""></div></a>
	 <!--联系我们-->
	 <div class="contact">
	 	 <ul>
	 	 	<li>
	 	 		<div class="erwei"><img src="<?php echo 'http://jtjl.huiyaohuyu.com/'.$gghRow['imgUrl']; ?>"></div>
	 	 		<h3>长按识别图中二维码</h3>
	 	 		<div class="bt1">
	 	 			<h3 class="small-font2">《军团降临》微信公众号</h3>
	 	 			<h3 class="small-font red">搜索[ juntuanjianglin ]</h3>
	 	 		</div>
	 	 	</li>
	 	 	<li>
	 	 		<div class="erwei"><img src="<?php echo 'http://jtjl.huiyaohuyu.com/'.$qqqRow['imgUrl']; ?>"></div>
	 	 		<h3>扫一扫二维码，加入该群</h3> 
	 	 		<div class="bt1 bt2 ">
	 	 			<h3 class="small-font2">《军团降临》QQ群</h3>
	 	 			<h3 class="small-font red">群号码：486298034</h3>
	 	 		</div>
	 	 	</li>
	 	 	<a href="http://tieba.baidu.com/f?kw=%E5%86%9B%E5%9B%A2%E9%99%8D%E4%B8%B4&fr=index"><li class="bd"><img src="images/t3.jpg" ></li></a>
	 	 </ul>
	 </div>
	 <!--尾部企业信息-->
	 <div class="footer">
	 	<img src="images/ft-logo.jpg" alt="">
	 </div>
</div>
</body>
</html>