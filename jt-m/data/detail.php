<?php
	include '../php/connect.php';   //引入链接数据库文件
	include '../php/download.php'; //引入悬浮框下载文件
	include '../php/update.php';  //版本更新跳转地址

	$id = $_GET['id'];
	$at = mysql_query("SELECT * FROM article where id=$id ");
	$atRow = mysql_fetch_array($at);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $atRow['title']; //文章题目 ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
	<meta name="keywords" content="军团降临，军团游戏，辉耀互娱军团，军团，军团再临，军团资料，军团降临资料">
	<meta name="decsription" content="军团降临，军团再临。新召唤师玩法">
	<link rel="icon" href="../images/favicon.ico" type="image/X-icon">
	<link rel="stylesheet"  href="../css/style.css">
	<script type="text/javascript" src="../js/jquery-1.9.0.min.js" ></script>
	<script type="text/javascript" src="../js/common.js"></script>
	<!--cnzz统计代码-->
	<script type="text/javascript">
	 	var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1260597582'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1260597582' type='text/javascript'%3E%3C/script%3E"));
	</script>
</head>
<body>
	<div class="container">
	<!--下载悬浮层-->
	<a href="<?php echo $loadRow['clickUrl']; //引入悬浮框下载文件实现 ?>">
		<div class="loadbg"><div class="download"><img src="../images/download.jpg"></div></div>
	</a>
	<div class="clear"></div>
	<!--点击出现导航栏是同时出现这个层-->
	<div class="mask"></div>	
	<!--头部部分，导航-->
	<div class="top-nav top-nav2">
		<a href="../data"><img src="../images/back2.png" alt=""><span>游戏资料</span></a>
		<em><img src="../images/top-nav2.png" ></em>
		<ul>
			<a href="../"><li>首页</li></a>
			<a href="<?php echo $updateRow['clickUrl']; ?>" name="版本更新"><li>版本更新</li></a>
			<a href="../article"><li>新闻资讯</li></a>
			<a href="../strategy"><li>游戏攻略</li></a>
			<a href="index.php"><li>游戏资料</li></a>
			<a href=""><li>玩家论坛</li></a>
		</ul>
	</div>
	<!--游戏介绍-->
	<div class="at-detail">
		<div class="title">
			<h1><?php echo $atRow['title']; //文章标题 ?></h1>
			<span>发布时间:<?php echo $atRow['createTime']; //发布时间?></span>
		</div>
		<div class="at-content">
			<?php echo $atRow['content']; //文章内容 ?>
		</div>
	</div>
	<!--尾部企业信息-->
	<div class="footer">
	 	<img src="../images/ft-logo.jpg" >
	</div>
</div>
</body>
</html>