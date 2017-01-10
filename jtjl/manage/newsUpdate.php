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
<title>修改文章</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript"src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" charset="utf-8" src="UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="UEditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="UEditor/lang/zh-cn/zh-cn.js"></script>
<!--时间选择器-->
<script type="text/javascript" charset="utf-8" src="My97DatePicker/WdatePicker.js"></script>
</head>
<script>
	var ue = UE.getEditor('editor');
</script>

<body>
<div class="container">
	<div class="hnav">
		<ul class="nav">
			<a href="index.php"><li>首页</li></a>
			<a href="bannerManage.php"><li>banner管理</li></a>
			<a href="newsManage.php"><li class="on">文章管理</li></a>
			<a href="login/login_out.php"><li>退出</li></a>
		</ul>
		<div class="logo"><img src="../images/logo.png" style="width: 100px;"></div>
	</div>
    <div class="top">文章修改</div>
	<div class="allPicture">
		<?php
		include 'connect.php';

		// 获取要修改的文章
		$id = $_GET['id'];
		$sql = "select * from article where id=".$id;
		$result = mysql_query($sql,$con);
		$article = mysql_fetch_array($result);
		//
		if ($article['type']==="新闻") {
			 $article['type']=="0";
		}
		if ($article['type']==="公告") {
			 $article['type']="1";
		}
		if ($article['type']==="活动") {
			 $article['type']="2";
		}
		if ($article['type']==="攻略") {
			 $article['type']="3";
		}
		if ($article['type']==="资料") {
			 $article['type']="4";
		}
		if ($article['type']==="版本更新") {
			 $article['type']="5";
		}


		echo 
		    "<form action='newsUpdateDo.php?id=".$article['id']."' role='form' method='post'>
			    <div class='form-group'>
			    文章类别：<select id='select' class='form-control' name='type' style='display:inline-block; width: 40%;
			    		  margin: 20px 50px 20px 0;'  value='".$article['type']."'>
			    				<option value='新闻'>新闻</option> 
			    				<option value='公告'>公告</option> 
			    				<option value='活动'>活动</option>
			    				<option value='攻略'>攻略</option>
			    				<option value='资料'>资料</option>
			    				<option value='版本更新'>版本更新</option>
		    		 	  </select>
				文章标题：<input type='text' class='form-control' name='title' value='".$article['title']."' 				 style='display:inline-block; width: 40%;margin-bottom: 20px;'  onkeyup='this.value=this.value.replace(/[^\w]/g,'');' ><br/>
				文章作者：<input type='text' class='form-control' name='author' value='".$article['author']."' 
						  style='display:inline-block; width: 40%;margin: 20px 50px 20px 0;' >
				发布时间：<input type='text' class='Wdate form-control' name='createTime' 
						   value='".$article['createTime']."' onClick='WdatePicker()' 
						   style='display:inline-block; width: 40%;height: 34px;margin-bottom: 20px;' ><br/>
				文章内容：<script id='editor' type='text/plain' name='content' style='height:500px;'>
						  ".$article['content']." </script>
						  <input class='btn btn-primary' type='submit' value='确认修改' style='margin:10px auto 10px auto;display: block;'>
				</div>
			</form>"
		?> 
	</div>
</div>
<script>

 var ue = UE.getEditor('editor'); //实例化编辑器

 /***动态获取select下拉框的值**/	
 var select = document.getElementById('select');
 select.selectedIndex=<?php echo $article['type']; ?>;  //selectedIndex的值要从0开始

</script>
</body>
</html>