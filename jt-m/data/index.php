<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>军团降临-资料</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
	<meta name="keywords" content="军团降临，军团游戏，辉耀互娱军团，军团，军团再临，军团资料，军团降临资料">
	<meta name="decsription" content="军团降临，军团再临。新召唤师玩法">
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
	<div class="top-nav top-nav2">
		<a href="../"><img src="../images/back2.png" alt=""><span>游戏资料</span></a>
		<em><img src="../images/top-nav2.png" ></em>
		<ul>
			<a href="../"><li>首页</li></a>
			<a href="<?php echo $updateRow['clickUrl']; ?>" name="版本更新"><li>版本更新</li></a>
			<a href="../article"><li>新闻资讯</li></a>
			<a href="../strategy"><li>游戏攻略</li></a>
			<a href=""><li>游戏资料</li></a>
			<a href="#"><li>玩家论坛</li></a>
		</ul>
	</div>
	<!--游戏介绍-->
	<div class="introduce">
		<h2><img src="../images/introduce.png" alt=""></h2>
		<p>《军团降临》是一款魔兽风格的3D动作卡牌手游，游戏中共有牧师、猎人、法师等三种职业。玩家在战斗前可自由配置10张随从卡的卡组用来战斗。</p>
		<p>同时玩家可任意携带3个技能，根据随从特性来搭配技能组合，出奇方可制胜；随着战局的变化，玩家可在任意时间将随从召唤入场或收回，灵活作战，胜负只在操作的一瞬间。军团已至！风暴降临！异界魔兽之旅等你来！</p>

	</div>
	<!--上收下收图标-->
	<div class="down-up">
		<img src="../images/down.png" class="down  hide" /><img src="../images/up.png" class="up" />
	</div>
	<!--攻略-->
	<div class="new"><img src="../images/new.png"></div>
	<div class="data"> 
		<ul>
			<?php
		 		$zl  = mysql_query("SELECT * FROM article where state='1' and type='资料' order by createTime desc");
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
<script type="text/javascript">
  /**游戏资料页，游戏介绍，显示部分与显示全部之间切换**/
    var t_html = $('.introduce').html();  //获取类introduce里的html
    var str = t_html.slice(0,108);  //用js的slice()方法获取字符
    $('.introduce').html(t_html);  //显示部分游戏介绍
 
    $(".down").click(function(){  //点击向下按钮显示全部内容，向下图片转换为向上图标
      $('.introduce').html(t_html);
      $(this).hide();
      $('.down-up .up').show();     
    })
    $(".up").click(function(){  //点击向上图标收起全部显示部分内容，向上图片转换为向下图标
          $('.introduce').html(str+"......");
          $(this).hide();
          $('.down-up .down').show();
    })
</script>
</body>
</html>