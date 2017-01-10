<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>游戏攻略</title>
<meta charset="UTF-8" >
<meta name="keywords" content="源计划游戏攻略，源计划官网游戏攻略">
<meta name="description" content="源计划游戏攻略，源计划官网攻略" >
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
				<a href="../data/"><li>游戏资料</li></a>
				<a href="../strategy/"><li class="on">游戏攻略</li></a>
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
 		<div class="right">
 			<div class="news_top">
 				<h1>攻略中心</h1>
 				<p>当前位置：<a href="">首页</a>>游戏攻略</p>
 			</div>
 			<div class="news_list">
 				<!--
 				<ul>
 					<li>最新</li>
 					<li>新闻</li>
 					<li>公告</li>
 					<li>活动</li>
 					<li class="on">攻略</li>
 				</ul>
 				-->
 				<div>
 					<ul>
 						 <?php
							include '../manage/connect.php';

							if(is_array($_GET)&&count($_GET)>0)//先判断是否通过get传值了
	                        {
	                             $page=$_GET["page"];//存在
	                        }else {
	                                $page=1;
	                        }
	                        
	                        $pagesize=13;   //设置每页显示条数
	                        $showpage=3;   //设置显示的数字页数量
	                        $startCount = ($page-1)*$pagesize; //分页开始,根据此方法计算出开始的记录

	                        $all = mysql_query("SELECT * FROM article where state='1' and type='攻略' order by createTime desc limit $startCount,$pagesize "); //根据前面的计算出开始的记录和记录数
	                        while ($allrow=mysql_fetch_array($all)) 
	                        {
								$t = strtotime($allrow['createTime']);
								$time = date("Y/m/d",$t);
								echo "<li><a href='detail.php?id=".$allrow['id']."'><em>[".$allrow['type']."]</em>".$allrow['title']."<span>".$time."</span></a></li>";
							}
	                         
	                        /**********分页制作*************/
	                        //获取数据总数
	                        $total_sql="SELECT COUNT(*) FROM article where state='1' and type='新闻' or type='公告'
							     or type='活动' ";
	                        $total_result=mysql_fetch_array(mysql_query($total_sql));
	                        $total=$total_result[0];
	                         //计算页数
	                        $total_pages=ceil($total/$pagesize);
	                        mysql_close($con);

	                        //显示上下分页
	                        $page_banner_up="";
	                        $page_banner_down="";
	                        //计算偏移量
	                         $pageoffset=($showpage-1)/2;

	                        if ($page>1)
	                        {
	                            $page_banner_up="<a href='".$_SERVER['PHP_SELF']."?page=".($page-1)."' class='page_fl'>
	                            <span class='page_up_down'>上一页</span></a>";
	                        }
	                        if($page<$total_pages)
	                         {
	                            $page_banner_down="<a href='".$_SERVER['PHP_SELF']."?page=".($page+1)."' class='page_fl'><span class='page_up_down'>下一页</span></a>";
	                         }
						?>
 					</ul>
 				    <div class="page">
						<?php
							echo "".$page_banner_up.$page_banner_down."";
						?>
					</div>
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