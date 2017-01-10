<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>资料中心</title>
<meta charset="UTF-8" >
<meta name="keywords" content="源计划游戏，源计划官网">
<meta name="description" content="源计划游戏，源计划官网" >
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image/x-icon" href="../images/favicon.ico">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
</head>
<body>
<div class="container" >
    <!--头部header-->
	<div class="header">
		<a href=""><img src="../images/logo.png" class="logo"></a>
		<img src="../images/navbg.png" class="navbg">
		<div class="nav">
			<ul>
				<a href="../"><li>官网首页</li></a>
				<a href="../news/"><li>新闻中心</li></a>
				<a href=""><li class="on">游戏资料</li></a>
				<a href="../strategy/"><li>游戏攻略</li></a>
				<a href="../hero/"><li>英雄库</li></a>
				<p><span>关注公共号赢大奖 </span><img src="../images/hwc.png"><img src="../images/navwc.png" class="navwc" ></p>
			</ul>
		</div>
	</div>
 	<div class="date_content">
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
 		<div class="date_right">
 			<div class="topbg">
	 			<div class="date_top">
	 				<h1>资料中心</h1>
	 				<p>当前位置：<a href="">首页</a>>资料中心</p>
	 			</div>
	 		</div>
 			<div class="date_list">
 				<div>
 					<h2>新手指引</h2>
 					<ul>
						<?php
							$xs = mysql_query("SELECT * FROM data where type='新手指引' and state='1' 
								order by createTime desc limit 0,15");
							while ($xsrow=mysql_fetch_array($xs)) 
							{
								echo "<a href='detail.php?id=".$xsrow['id']."'><li><i class='iconfont'>&#xe601;</i>&nbsp;".$xsrow['title']."</li></a>";
							}
						?>
					</ul>
 				</div>
 				<div>
 					<h2>基地系统</h2>
 					<ul>
 						<?php
							$jd = mysql_query("SELECT * FROM data where type='基地系统' and state='1' 
								order by createTime desc limit 0,15");
							while ($jdrow=mysql_fetch_array($jd)) 
							{
								echo "<a href='detail.php?id=".$jdrow['id']."'><li><i class='iconfont'>&#xe601;</i>&nbsp;".$jdrow['title']."</li></a>";
							}
						?>
					</ul>
 				</div>
 				<div>
 					<h2>机甲养成</h2>
 					<ul>
 						<?php
							$jj = mysql_query("SELECT * FROM data where type='机甲养成' and state='1' 
								order by createTime desc limit 0,15");
							while ($jjrow=mysql_fetch_array($jj)) 
							{
								echo "<a href='detail.php?id=".$jjrow['id']."'><li><i class='iconfont'>&#xe601;</i>&nbsp;".$jjrow['title']."</li></a>";
							}
						?>
					</ul>
 				</div>
 				<div>
 					<h2>装备养成</h2>
 					<ul>
 						 <?php
							$zb = mysql_query("SELECT * FROM data where type='装备养成' and state='1' 
								order by createTime desc limit 0,15");
							while ($zbrow=mysql_fetch_array($zb)) 
							{
								echo "<a href='detail.php?id=".$zbrow['id']."'><li><i class='iconfont'>&#xe601;</i>&nbsp;".$zbrow['title']."</li></a>";
							}
						?>
					</ul>
 				</div>
 				<div>
 					<h2>PVP玩法</h2>
 					<ul>
 						<?php
							$pvp = mysql_query("SELECT * FROM data where type='PVP玩法' and state='1' 
								order by createTime desc limit 0,15");
							while ($pvprow=mysql_fetch_array($pvp)) 
							{
								echo "<a href='detail.php?id=".$pvprow['id']."'><li><i class='iconfont'>&#xe601;</i>&nbsp;".$pvprow['title']."</li></a>";
							}
						?>
					</ul>
 				</div>
 				<div>
 					<h2>PVE玩法</h2>
 					<ul>
 						<?php
							$pve = mysql_query("SELECT * FROM data where type='PVE玩法' and state='1' 
								order by createTime desc limit 0,15");
							while ($pverow=mysql_fetch_array($pve)) 
							{
								echo "<a href='detail.php?id=".$pverow['id']."'><li><i class='iconfont'>&#xe601;</i>&nbsp;".$pverow['title']."</li></a>";
							}
						?>
					</ul>
 				</div>
 				<div>
 					<h2>联盟系统</h2>
 					<ul>
 						<?php
							$lm = mysql_query("SELECT * FROM data where type='联盟系统' and state='1' 
								order by createTime desc limit 0,15");
							while ($lmrow=mysql_fetch_array($lm)) 
							{
								echo "<a href='detail.php?id=".$lmrow['id']."'><li><i class='iconfont'>&#xe601;</i>&nbsp;".$lmrow['title']."</li></a>";
							}
						?>
					</ul>
 				</div>
 				<div>
 					<h2>福利活动</h2>
 					<ul>
 						<?php
							$fl = mysql_query("SELECT * FROM data where type='福利活动' and state='1' 
								order by createTime desc limit 0,15");
							while ($flrow=mysql_fetch_array($fl)) 
							{
								echo "<a href='detail.php?id=".$flrow['id']."'><li><i class='iconfont'>&#xe601;</i>&nbsp;".$flrow['title']."</li></a>";
							}
						?>
					</ul>
 				</div>
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