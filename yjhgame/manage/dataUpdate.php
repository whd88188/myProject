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
<title>修改资料</title>
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
			<a href="newsManage.php"><li>文章管理</li></a>
			<a href="data.php"><li class="on">资料管理</li></a>
			<a href="login/login_out.php"><li>退出</li></a>
		</ul>
		<div class="logo"><img src="../images/logo.png" style="width: 100px;"></div>
	</div>
    <div class="top">游戏资料修改</div>
	<div class="allPicture">
		<?php
		include 'connect.php';

		// 获取要修改的文章
		$id = $_GET['id'];
		$sql = "select * from data where id=".$id;
		$result = mysql_query($sql,$con);
		$data = mysql_fetch_array($result);
		
		switch ($data['type']) {
			case '基地系统':
				$data['type']="1";
				break;
			case '机甲养成':
				$data['type']="2";
				break;
			case '装备养成':
				$data['type']="3";
				break;
			case 'PVP玩法':
				$data['type']="4";
				break;
			case 'PVE玩法':
				$data['type']="5";
				break;
			case '联盟系统':
				$data['type']="6";
				break;
			case '福利活动':
				$data['type']="7";
				break;
			default:
				$data['type']="0";
				break;
		}

		echo 
		    "<form action='newsUpdateDo.php?type=data&id=".$data['id']."' role='form' method='post'>
			    <div class='form-group'>
			    文章类别：<select id='select' class='form-control' name='type' style='display:inline-block; width: 40%;
			    		  margin: 20px 50px 20px 0;'  value='".$data['type']."'>
			    				<option value='新手指引'>新手指引</option> 
			    				<option value='基地系统'>基地系统</option> 
			    				<option value='机甲养成'>机甲养成</option>
			    				<option value='装备养成'>装备养成</option>
			    				<option value='PVP玩法'>PVP玩法</option> 
			    				<option value='PVE玩法'>PVE玩法</option> 
			    				<option value='联盟系统'>联盟系统</option>
			    				<option value='福利活动'>福利活动</option>
		    		 	  </select>
				文章标题：<input type='text' class='form-control' name='title' value='".$data['title']."' 				 style='display:inline-block; width: 40%;margin-bottom: 20px;'  onkeyup='this.value=this.value.replace(/[^\w]/g,'');' ><br/>
				文章作者：<input type='text' class='form-control' name='author' value='".$data['author']."' 
						  style='display:inline-block; width: 40%;margin: 20px 50px 20px 0;' >
				发布时间：<input type='text' class='Wdate form-control' name='createTime' 
						   value='".$data['createTime']."' onClick='WdatePicker()' 
						   style='display:inline-block; width: 40%;height: 34px;' ><br/>
				文章内容：<script id='editor' type='text/javascript' name='content' style='height:500px;'>
						  ".$data['content']."</script>
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
 select.selectedIndex=<?php echo $data['type']; ?>;  //selectedIndex的值要从0开始

</script>
</body>
</html>