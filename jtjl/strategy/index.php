<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>游戏攻略</title>
<meta charset="UTF-8" />
<meta name="keywords" content="军团降临，军团降临官网，军团降临攻略，军团降临游戏攻略"/>
<meta name="description" content="军团降临，军团降临官网" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image/x-icon" href="../images/favicon.ico">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript"src="../js/jquery-1.9.0.min.js"></script>
<script type="text/javascript"src="../js/common.js"></script>
</head>
<body>
<div class="news_container" >
	<!--头部导航-->
	<div class="navbox">
			<div class="nav">
				<div class="logo">
					<a href="../"><img src="../images/logo.png" ></a>
					<h2>军团降临</h2>
					<h3>新召唤玩法！</h3>
				</div>
				<div class="nav_li">	
					<ul >
						<a href="../"><li>官网首页</li></a>
						<a href="../news/"><li >新闻中心</li></a>
						<a href="../hero/"><li>英雄库</li></a>
					<!--	<a href="../date/"><li>游戏资料</li></a>   -->
						<a href=""><li class="on">游戏攻略</li></a>
						<a href="http://bbs.huiyaohuyu.com"><li>论坛中心</li></a>

					</ul>
				</div>
			</div>
	</div>
	<!--攻略-->
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
			<div class="lists strategy">
			<!--
				<ul>
					<li class="on">某某攻略</li>
					<li>某某攻略</li>
					<li>某某攻略</li>
					<li>某某攻略</li>
				</ul>
			-->
				<div>
					<ul>
						<?php
							include '../manage/connect.php';
							 
	                        if(is_array($_GET)&&count($_GET)>0)//先判断是否通过get传值了
	                        {
	                            if(isset($_GET["page"]))//是否存在"page"的参数
	                            {
	                                $page=$_GET["page"];//存在
	                            }
	                            else {
	                                $page=1;
	                            }
	                        }else {
	                                $page=1;
	                        }
	                        
	                        $pagesize=10;   //设置每页显示条数
	                        $showpage=3;   //设置显示的数字页数量
	                         
	                        $startCount = ($page-1)*$pagesize; //分页开始,根据此方法计算出开始的记录

	                        $gl = mysql_query("SELECT * from article where type='攻略' and state='1' order by createTime desc limit $startCount,$pagesize"); //根据前面的计算出开始的记录和记录数
	                        while($gl_row = mysql_fetch_array($gl))
	                        {
	                            echo "<a href='detail.php?id=".$gl_row['id']."'>
					 						<li><em>".$gl_row['title']."</em><span>".$gl_row['createTime']."</span></li>
					 					 </a>";    
	                        }
	                         
	                        /**********分页制作*************/
	                        //获取数据总数
	                        $total_sql="SELECT COUNT(*) FROM article where type='攻略' and state='1' ";
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
	                            <span class='n_up'>上一页</span></a>";
	                        }
	                        //初始化数据
	                        $start=1;   
	                        $end=$total_pages;
	                        //显示页码
	                        if($total_pages>$showpage)
	                        {
	                            if($page>$pageoffset+1)
	                            {
	                               // $page_banner.="...";
	                            }
	                            if ($page>$pageoffset) {
	                                $start=$page-$pageoffset;
	                                $end=$total_pages>$page+$pageoffset?$page+$pageoffset:$total_pages;
	                            }else {
	                                $start=1;
	                                $end=$total_pages > $showpage ? $showpage:$total_pages;
	                            }
	                            if ($page+$pageoffset>$total_pages) {
	                                $start=$start-($page+$pageoffset-$end);
	                            }
	                        }
	                        if($page<$total_pages)
	                         {
	                            $page_banner_down="<a href='".$_SERVER['PHP_SELF']."?page=".($page+1)."' class='page_fl'><span class='n_down'>下一页</span></a>";
	                         }

					 		?>
					</ul>
					<?php
	                    echo "<div class='n_page'> ".$page_banner_up.$page_banner_down."</div>";
	                 ?>
				</div>




			<!--
				<div class="hide">
					<ul>
						 
					</ul>
					<div class="n_page"><span class="n_up">上一页</span><span class="n_down">下一页</span></div>
				</div>
				<div class="hide">
					<ul>
						 
					</ul>
					<div class="n_page"><span class="n_up">上一页</span><span class="n_down">下一页</span></div>
				</div>
				<div class="hide">
					<ul>
						 
					</ul>
					<div class="n_page"><span class="n_up">上一页</span><span class="n_down">下一页</span></div>
				</div>
			-->
			</div>
	 	</div>
	 	
	</div>
	<!--尾部-->
	<div class="footer2">
		<div class="footer_box">
		    <div class="tip">
				<strong style="margin-top: 30px;">
					<em style="color: #ddd697;">健康游戏公告</em>：抵制不良游戏，拒绝盗版游戏。注意自我保护，谨防受骗上当。适度游戏益脑，沉迷游戏伤身。合理安排时间，享受健康生活。
				</strong>
			</div>
			<div class="copyright">

				<a href="http://www.huiyaohuyu.com"><img src="../images/logo_ft.png" alt=""></a>
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