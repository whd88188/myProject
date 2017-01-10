<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>源计划官网</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
	<link rel="stylesheet"  href="css/style.css">
	<script src="js/jquery-1.9.0.min.js"></script>
	<script src="js/common.js"></script>
</head>
<body>
	<div class="container">
	<!--下载悬浮层-->
	<div class="loadbg"><div class="download"><img src="images/download.png"></div></div>	
	<!--头部部分， 背景图 视频播放 logo-->
	<div class="head"><img src="images/bg.jpg" >
	     <div class="video"></div>
	     <div class="video_play">
	     	<h2>游戏介绍<span>&times;</span></h2>
	     	<video src="../raw/yuan.mp4" controls="controls" id="video"></video>
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
	 		<div>
	 			<ul>
	 				<?php
						include '../manage/connect.php';
						$news = mysql_query("SELECT * FROM article where state='1' and ( type='新闻' or type='公告'
						 	or type='活动' ) order by createTime desc ");

						while ($newsrow=mysql_fetch_array($news)) 
						{
							$t = strtotime($newsrow['createTime']);
							$time = date("m-d",$t);
							echo "<li class='hide'><a href='article.php?id=".$newsrow['id']."'><em>【".$newsrow['type']."】</em>".$newsrow['title']."<span>".$time."</span></a></li>";
						}
					?>
	 			</ul>
	 			<div class="more"><img src="images/more.png"></div>
	 		</div>
	 		<div class="hide">
	 			<ul>
	 				<?php
						include '../manage/connect.php';
						$news = mysql_query("SELECT * FROM article where state='1' and type='新闻' order by createTime desc ");
						while ($newsrow=mysql_fetch_array($news)) 
						{
							$t = strtotime($newsrow['createTime']);
							$time = date("m-d",$t);
							echo "<li class='hide'><a href='article.php?id=".$newsrow['id']."'><em>【".$newsrow['type']."】</em>".$newsrow['title']."<span>".$time."</span></a></li>";
						}
					?>
	 			</ul>
	 			<div class="more"><img src="images/more.png"></div>
	 		</div>
	 		<div class="hide">
	 			<ul>
	 				<?php
						include '../manage/connect.php';
						$gg = mysql_query("SELECT * FROM article where state='1' and type='公告' order by createTime desc ");
						while ($ggrow=mysql_fetch_array($gg)) 
						{
							$t = strtotime($ggrow['createTime']);
							$time = date("m-d",$t);
							echo "<li class='hide'><a href='article.php?id=".$ggrow['id']."'><em>【".$ggrow['type']."】</em>".$ggrow['title']."<span>".$time."</span></a></li>";
						}
					?>
	 			</ul>
	 			<div class="more"><img src="images/more.png"></div>
	 		</div>
	 		<div class="hide">
	 			<ul>
	 				<?php
						include '../manage/connect.php';
						$hd = mysql_query("SELECT * FROM article where state='1' and type='活动' order by createTime desc ");
						while ($hdrow=mysql_fetch_array($hd)) 
						{
							$t = strtotime($hdrow['createTime']);
							$time = date("m-d",$t);
							echo "<li class='hide'><a href='article.php?id=".$hdrow['id']."'><em>【".$hdrow['type']."】</em>".$hdrow['title']."<span>".$time."</span></a></li>";
						}
					?>
	 			</ul>
	 			<div class="more"><img src="images/more.png"></div>
	 		</div>
	 </div>
	 <!--联系我们-->
	 <div class="contact">
	 	<ul>
	 		<li>
	 			<img src="images/contact1.jpg">
	 			<h2>电话<br/>0755-86719254</h2>
	 		</li>
	 		<li>
	 			<img src="images/contact2.jpg">
	 			<h2>官方微信<br/>yjhgame</h2>
	 		</li>
	 		<li>
	 			<img src="images/contact3.jpg">
	 			<h2>官方Q群<br/>177697981</h2>
	 		</li>
	 	</ul>
	 </div>
	 <!--尾部企业信息-->
	 <div class="footer">
	 	<img src="images/ft-logo.jpg" >
	 <!--
	 	<p class="small-font smallsize-font">优依购互娱科技有限公司版权所有 粤ICP备15108634号-1 <br/>
			&nbsp;《网络文化经营许可证》粤网文 〔2016〕1029-186号 </p>
	-->
	 </div>
	<div class="clear"></div>
</div>
</body>
</html>