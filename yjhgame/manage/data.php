<?php 
	session_start(); 
	//检测是否登录，若没登录则转向登录界面
	if(!isset($_SESSION['id'])){
    	header("Location:login/");
   	    exit();	
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>游戏资料管理</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" charset="utf-8" src="UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="UEditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="UEditor/lang/zh-cn/zh-cn.js"></script>
<!--时间选择器-->
<script type="text/javascript" charset="utf-8" src="My97DatePicker/WdatePicker.js"></script>
</head>
<script>
	$(document).ready(function() {
		/*******添加文章******/
 	 	$('.addNews').click(function(){
 	 	 	$('.addNews').hide();
 	 	 	$('.cancelAdd').show();
 	 	 	$('.addBox').show();
 	 	})
 	 	$('.cancelAdd').click(function(){
 	 	 	$('.addNews').show();
 	 	 	$('.cancelAdd').hide();
 	 	 	$('.addBox').hide();
 	 	})

 	 	//自动设置是否置顶的“是”和“否”的颜色
 	 	$('.isTop').each(function(){
 	 		var text=$(this).text();
 	 		if (text=="是") {
 	 			$(this).css("background","green")
 	 		}else{
 	 			$(this).css("background","red")
 	 		}
 	 	})


 	 	//自动设置状态栏“启动”和“停用”的背景颜色
 	 	$('.state').each(function(){
 	 		var Text=$(this).text();
 	 		if (Text=="启用") {
 	 			$(this).css("background-color","green")
 	 		}else{
 	 			$(this).css("background-color","red")
 	 		}
 	 	})

 	 	//自动设置首页显示栏“是”和“否”的背景颜色
 	 	$('.homepage').each(function(){
 	 		var Text=$(this).text();
 	 		if (Text=="是") {
 	 			$(this).css("background-color","green")
 	 		}else{
 	 			$(this).css("background-color","red")
 	 		}
 	 	})

		/*******实例化编辑器******/
		var ue = UE.getEditor('editor');


		/******动态改变分页按钮背景*******/
		var url=window.location.search;
	    if(url=="")
	    {
	    	$('.page').eq(0).css({"background":"#428bca","color":"#fff","border":"1px solid #428bca"});
	    }
	  	var loc = url.substring(url.lastIndexOf('=')+1, url.length);

	  	$('.page').each(function(){
	    	var text=$(this).text();
		    if (text==loc) {
		          $(this).css({"background":"#428bca","color":"#fff","border":"1px solid #428bca"});
		    }
	  	})

 	 })
</script>

<body>
<div class="container">
	<div class="hnav">
		<ul class="nav">
			<a href="index.php"><li>首页-图片</li></a>
			<a href="bannerManage.php"><li>banner管理</li></a>
			<a href="newsManage.php"><li>文章管理</li></a>
			<a href="data.php"><li  class="on">资料管理</li></a>
			<a href="login/login_out.php"><li>退出</li></a>
		</ul>
		<div class="logo"><img src="../images/logo.png" style="width: 100px;"></div>
	</div>	

	<div class="top">游戏资料</div>

	<div class="allPicture">
		<label>游戏资料列表</label>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>文章ID</th>
					<th>资料类别</th>
					<th>资料标题</th>
					<th>作者</th>
					<th>发布时间</th>
					<th>修改时间</th>
					<th>首页显示</th>
					<th>状态操作</th>
					<th colspan='3'>操作</th>
				<tr>
			</thead>

			<?php
			    include 'connect.php';
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
		        $result=mysql_query("SELECT * FROM data order by id desc limit $startCount,$pagesize");
		        
				while($row = mysql_fetch_array($result))
				{
					 
		        	if ($row['state']==="0") {
		        		$row['state']="启用";
		        	}else{
		        		$row['state']="停用";
		        	}
		        	if ($row['homepage']==="0") {
		        		$row['homepage']="是";
		        	}else{
		        		$row['homepage']="否";
		        	}
					echo "<tr>";
				    echo "<td>" . $row['id'] . "</td>";
				    echo "<td>" . $row['type'] . "</td>";
				    echo "<td>" . $row['title'] . "</td>";
				    echo "<td>" . $row['author'] . "</td>";
				    echo "<td>" . $row['createTime'] . "</td>";
				    echo "<td>" . $row['updateTime'] . "</td>";
				    echo "<td><a href='newsHomepageUpdate.php?type=data&id=".$row['id']."'><button type='button' class='homepage'>".$row['homepage']."</button></a></td>";
				    echo "<td><a href='newsStateUpdate.php?type=data&id=".$row['id']."'><button type='button' class='state'>".$row['state']."</button></a></td>";
				    echo "<td><a href='newsPreview.php?type=data&id=".$row['id']."'>预览</a></td>";
				    echo "<td><a href='dataUpdate.php?id=".$row['id']."'>修改</a></td>";
				    echo "<td><a href='newsDeleteDo.php?type=data&id=".$row['id']."'>删除</a></td>";
				    echo "</tr>";
				}
			   
				/**********分页制作*************/
	            //获取数据总数
	            $total_sql="SELECT COUNT(*) FROM data";
	            $total_result=mysql_fetch_array(mysql_query($total_sql));
	            $total=$total_result[0];
	            //计算页数
	            $total_pages=ceil($total/$pagesize);
	             
	            mysql_close($con);

	            //显示分页
	            $page_banner="";
	            //计算偏移量
	            $pageoffset=($showpage-1)/2;

	            if ($page>1)
	            {
	               // $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1' class='page_fl'>首页</a>";
	                $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($page-1)."' class='page_fl'><上一页</a>";
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

	            //遍历显示页码
	            for($i=$start; $i<=$end; $i++){
	                  $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".$i."' class='page'>{$i}</a>";
	            }

	            //尾部省略
	            if($total_pages>$showpage&&$total_pages>$page+$pageoffset) {
	                //  $page_banner.="...";
	            }
	            if($page<$total_pages)
	             {
	                $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($page+1)."' class='page_fl'>下一页></a>";
	               // $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($total_pages)."' class='page_fl'>尾页</a>";
	             }
	             
	           
	            $page_banner.="<span href='' class='tatol_page'>共 {$total_pages} 页</span>";
	            /*******
	            $page_banner.="<form action='page.php' method='get' style='display:inline-block;'>";
	            $page_banner.="到第<input type='text' size='1' name='p'>页";
	            $page_banner.="<input type='submit' value='确定'>";
	            $page_banner.="<form>";
	            *****/
	            echo "<tr ><td colspan='12'>".$page_banner."</td></tr>";

			?>
			
			<tr class="addNews"><td colspan="12"><a href="#add">+添加资料</a></td></tr>
			<tr class="cancelAdd" style="display: none;"><td colspan="12"><a href="#cancel">取消添加</a></td></tr> 
			
		</table>
	</div>


	<div class="allPicture addBox"  >
	    <label id="add">添加资料</label>
		<form action="newsInsert.php?type=data" role="form" method="post">   
		    资料类别：<select class="form-control" name="type" style="display:inline-block; width: 40%;margin: 20px 		 50px 20px 0">
		    				<option value="新手引导">新手引导</option> 
		    				<option value="基地系统">基地系统</option> 
		    				<option value="机甲养成">机甲养成</option>
		    				<option value="装备养成">装备养成</option>
		    				<option value="PVP玩法">PVP玩法</option>
		    				<option value="PVE玩法">PVE玩法</option>
		    				<option value="联盟系统">联盟系统</option>
		    				<option value="福利活动">福利活动</option>
		    		  </select>
		    资料标题：<input type="text" class="form-control" name="title" style="display:inline-block; width: 40%;		 margin-bottom: 20px; "  placeholder="请输入标题"><br/>
			资料作者：<input type="text" class="form-control" name="author" style="display:inline-block; width: 40%;		 margin: 20px 50px 20px 0;"  placeholder="请输入作者">
			发布时间：<input type="text" class="Wdate form-control"  name="createTime" style="display:inline-block; 	width: 40%;height: 34px;margin-bottom: 20px;" placeholder="选择发布时间" onClick="WdatePicker()"><br/>
			资料内容：<script id="editor" type="text/plain" name="content" style="height:500px;"></script>
					  <input class="btn btn-primary" type="submit" value="确认添加" style="margin:10px auto 10px auto;display: block;">

		</form>
	</div>
</div>
</body>
</html>