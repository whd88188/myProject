<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>攻略中心</title>
<meta charset="UTF-8" />
<meta name="keywords" content="军团降临，军团降临官网"/>
<meta name="description" content="军团降临，军团降临官网" />
<meta name=”viewport” content=”width=device-width, initial-scale=1, maximum-scale=1″>
<link rel="icon" type="image/x-icon" href="../images/favicon.ico">
<link rel="stylesheet" type="text/css" href="../css/article.css">
<script type="text/javascript"src="../js/jquery-1.9.0.min.js"></script>
<script type="text/javascript"src="../js/common.js"></script>
</head>
<body>
<div class="news_container" >
	<div class="navbox">
			<div class="nav">
				<div class="logo">
					<img src="../images/logo.png" >
					<h2>军团降临</h2>
					<h3>新召唤玩法！</h3>
				</div>
				<div class="nav_li">	
					<ul >
						<a href="../"><li>官网首页</li></a>
						<a href="../news/"><li>新闻中心</li></a>
						<a href="../hero/"><li>英雄库</li></a>
					<!--<a href="../../date.html"><li>游戏资料</li></a> -->
						<a href="index.php"><li  class="on">游戏攻略</li></a>
						<a href="http://bbs.huiyaohuyu.com"><li>论坛中心</li></a>
					</ul>
				</div>
			</div>
	</div>
	<div class="hbg"></div>
	<div class="news_center">

	<?php
		include '../manage/connect.php';
		 
		/**二级页面下载二维码**/
		$s_ewm = mysql_query("SELECT * FROM banner where type='ewm' and type2='second' ");
		$s_ewmrow = mysql_fetch_array($s_ewm);
		/**ios apk下载**/
		$ios = mysql_query("SELECT * FROM banner where type='apk' and type2='ios' ");
		$iosrow = mysql_fetch_array($ios);
		/**android apk下载**/
		$an= mysql_query("SELECT * FROM banner where type='apk' and type2='android' ");
		$anrow = mysql_fetch_array($an);

		//下面会在相应的地方引用
	?>
		<div class="n_right">
			<span class="erwei"><img src="../<?php echo $s_ewmrow['imgUrl']; ?>" alt=""></span>
	 		<!--
	 		<a href="<?php echo $iosrow['clickUrl']; ?>"><div class="ios"><img src="../images/ios.png" alt=""></div></a>
	 		-->
	 		<a href="<?php echo $anrow['clickUrl']; ?>"><div class="android"><img src="../images/android.png" alt=""></div></a>
	 	</div>
	 	<div class="n_left">
	 		<div class="title"><h2>游戏攻略</h2><span>当前位置:<a href="../">首页</a>>游戏攻略</span></div>
			<div class="news_detail">
				<div class="title">

					<?php
						include '../manage/connect.php';
						$id  = $_GET['id'];

						$result = mysql_query("SELECT * FROM article where id='$id' ");
						$row = mysql_fetch_array($result);
					?>
					<h2><?php echo $row['title'];?></h2>
					<span>发布时间：<?php echo $row['createTime'];?></span>	
				</div>
				<div class="neirong">

					<?php echo $row['content'];?>
					 
				</div>
			</div>
	 	</div>
	 	
	</div>
	<div class="footer2">
		<div class="footer_box">
		    <div class="tip">
				<strong style="margin-top: 30px;">
					<em style="color: #ddd697;">健康游戏公告</em>：抵制不良游戏，拒绝盗版游戏。注意自我保护，谨防受骗上当。适度游戏益脑，沉迷游戏伤身。合理安排时间，享受健康生活。
				</strong>
			</div>
			<div class="copyright">

				<a href="http://www.huiyaohuyu.com/"><img src="../images/logo_ft.png" alt=""></a>
				<p style="position: absolute;top: 30px;left: 530px;">优依购互娱科技有限公司版权所有 2015-2016 <a href="" style="color:#64899f; ">粤ICP备15108634号-1</a></p>
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