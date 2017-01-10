<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>军团降临-攻略</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
	<meta name="keywords" content="军团降临，军团游戏，辉耀互娱军团，军团，军团再临，军团攻略，军团降临攻略">
	<meta name="decsription" content="军团降临，军团再临">
	<link rel="icon" href="../images/favicon.ico" type="image/X-icon">
	<link rel="stylesheet"  href="../css/style.css">
	<script src="../js/jquery-1.9.0.min.js"></script>
	<script src="../js/common.js"></script>
	<!--cnzz统计代码-->
	<script type="text/javascript">
	 	var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1260597582'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1260597582' type='text/javascript'%3E%3C/script%3E"));
	</script>
</head>
<body>
	<?php 
		include '../php/connect.php';   //引入链接数据库文件
		include '../php/download.php'; //引入悬浮框下载文件
		include '../php/update.php';  //版本更新跳转地址
	?>
	<div class="container">
	<!--下载悬浮层-->
	<a href="<?php echo $loadRow['clickUrl']; //引入悬浮框下载文件实现 ?>">
		<div class="loadbg"><div class="download"><img src="../images/download.jpg"></div></div>
	</a>
	<div class="clear"></div>
	<!--点击出现导航栏是同时出现这个层-->
	<div class="mask"></div>	
	<!--头部部分，导航-->
	<div class="top-nav">
		<a href="../"><img src="../images/back.png" alt=""><span>游戏攻略</span></a>
		<em><img src="../images/top-nav.png" ></em>
		<ul>
			<a href="../"><li>首页</li></a>
			<a href="<?php echo $updateRow['clickUrl']; ?>" name="版本更新"><li>版本更新</li></a>
			<a href="../article"><li>新闻资讯</li></a>
			<a href=""><li>游戏攻略</li></a>
			<a href="../data"><li>游戏资料</li></a>
			<a href=""><li>玩家论坛</li></a>
		</ul>
	</div>
	<!--攻略-->
	<div class="data"> 
		<ul>
			<?php
		 		$zl  = mysql_query("SELECT * FROM article where state='1' and type='攻略' order by createTime desc");
		 		while ($zl_row=mysql_fetch_array($zl)) 
		 		{
		 			echo 
		 			"<li class='hide'>
		 				<a href='detail.php?id=".$zl_row['id']."'>
		 					<em>".$zl_row['title']."</em><span>".$zl_row['createTime']."</span>
		 				</a>
		 			</li>";
		 		}
			?>
		</ul>
		<div class="news_more"><span>展开更多</span>&nbsp;<img src="../images/more.jpg" alt=""></div>
		<div style="width: 100%;height:16px;"></div>
	</div>
	
	<!--尾部企业信息-->
	<div class="footer">
	 	<img src="../images/ft-logo.jpg" >
	</div>
</div>
</body>
</html>