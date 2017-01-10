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
<title>banner轮播图修改</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
	<div class="hnav">
		<ul class="nav">
			<a href="index.php"><li>首页</li></a>
			<a href="bannerManage.php"><li class="on">banner管理</li></a>
			<a href="newsManage.php"><li>文章管理</li></a>
			<a href="login/login_out.php"><li>退出</li></a>
		</ul>
		<div class="logo"><img src="../images/logo.png" style="width: 100px;"></div>
	</div>

	<div class="top">首页轮播图修改</div>
	<div class="allPicture">
		<table  style="width:1100px;" class="table table-bordered ">
			<thead>
				<tr>
					<th>ID</th>
					<th>图片名</th>
					<th>图片地址</th>
					<th>点击跳转地址</th>
					<th style="width: 60px;">排序</th>
					<th>操作</th>
				</tr>
			</thead>

			<?php
				include 'connect.php';
				
				$id = $_GET['id'];// 获取要修改的图片id
				$sql = "select * from banner where id=".$id;
				$result = mysql_query($sql,$con);
				$row = mysql_fetch_array($result);

				echo 
					"<form action='scrollUpdateDo.php?id=".$id."' role='form' method='post'>
						<tr>
							<td style='width:80px;'>".$row['id']."</td>
						    <td style='width:120px;'><input type='text' name='name' value='".$row['name']."'></td>
						    <td><input type='text' name='imgUrl' value='".$row['imgUrl']."' ></td>
						    <td><input type='text' name='clickUrl' value='".$row['clickUrl']."' ></td>
						    <td><input type='text' name='sequance' value='".$row['sequance']."' ></td>
						    <td><input type='submit' value='确认修改' class='btn1'></td>
					    </tr>
				    </form>";
				
			 ?>
		</table>
	</div>
</div>
</body>
</html>