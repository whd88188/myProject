<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>新闻详情</title>
<meta charset="UTF-8" >
<meta name="keywords" content="源计划游戏，源计划官网">
<meta name="description" content="源计划游戏，源计划官网" >
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript"src="../js/jquery-1.9.0.min.js"></script>
<script type="text/javascript"src="../js/common.js"></script>
</head>

<body>
<div class="container" > 
    <!--头部header-->
	<div class="header"
		<a href=""><img src="../images/logo.png" class="logo"></a>
		<img src="../images/navbg.png" class="navbg">
		<div class="nav">
			<ul>
				<a href="../"><li>官网首页</li></a>
				<a href="index.php"><li>新闻中心</li></a>
				<a href="../data/"><li>游戏资料</li></a>
				<a href="../strategy/"><li>游戏攻略</li></a>
				<a href="../hero/"><li>英雄库</li></a>
				<p><span>关注公共号赢大奖 </span><img src="../images/hwc.png"><img src="../images/navwc.png" class="navwc" ></p>
			</ul>
		</div>
	</div>
 	<div class="news_content">
 		<?php
		 	include '../manage/connect.php';
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

 		<div class="left">
 			<div class="ewm"><img src="<?php echo "../".$ewmrow['imgUrl']; ?>" ></div>
 			<a href="<?php echo $lirow['clickUrl']; ?>"><div class="load1">领取礼包</div></a>
 			<a href="<?php echo $iosrow['clickUrl']; ?>"><div class="load2">IOS下载</div></a>
 		</div>
 		<div class="details_right">
 			<div class="topbg">
	 			<div class="news_top">
	 				<h1>新闻中心</h1>
	 				<p>当前位置：<a href="../">首页</a>><a href="index.php">新闻中心</a></p>
	 			</div>
 			</div>
 			<?php
 				 
 				$id = $_GET['id'];
 				$atc = mysql_query("SELECT * FROM article where id='$id' ");
 				$row = mysql_fetch_array($atc);
 			?>
 			<div class="news_detail">
 				<h2><?php echo $row['title'];?></h2>
 				<h3>发布时间：<?php echo $row['createTime']; ?></h3>
				<?php echo $row['content']; ?>
				 
 				 
 			</div>
 		</div>
 	</div>
	<!--底部footer-->
	<div class="footer">
		<div class="ft_box">
			<p class="f_ct">客服qq：2153754487 &nbsp;&nbsp;&nbsp;&nbsp; 官方群：177697981</p>
			<p><em>健康游戏公告：</em>抵制不良游戏，拒绝盗版游戏。注意自我保护，谨防受骗上当。适度游戏益脑，沉迷游戏伤身。合理安排时间，享受健康生活。</p>
			<div class="copyright">
				<div class="left"><a href="http://www.huiyaohuyu.com/"><img src="../images/logo_ft.png" ></a></div>
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