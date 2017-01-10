<?php 
	session_start(); 
	//检测是否登录，若没登录则转向登录界面
	if(!isset($_SESSION['id'])){
    	header("Location:login/");
   	    exit();	
	}
?>
<!doctype html>
<html>
<head>
<title>banner管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript"src="js/jquery-1.9.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
	<div class="hnav">
			<ul class="nav">
				<a href="index.php"><li>首页-图片</li></a>
				<a href="bannerManage.php"><li class="on">banner管理</li></a>
				<a href="newsManage.php"><li>文章管理</li></a>
				<a href="login/login_out.php"><li>退出</li></a>
			</ul>
			<div class="logo"><img src="../images/logo.png" style="width: 100px;"></div>
	</div>
	<div class="top">首页banner管理</div>

	<!--首页背景图-->
	<div class="allPicture" >
		<label>首页背景图</label>
		<table  class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>图片名</th>
					<th>图片地址</th>
					<th>图片缩略图</th>
					<th>操作</th>
				</tr>
			</thead>

			<?php
				include 'connect.php';
				$result = mysql_query("SELECT * FROM banner  where type='bg'");  //通过id倒序获取数据
				while($row= mysql_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
				    echo "<td>" . $row['name'] . "</td>";
				    echo "<td>" . $row['imgUrl'] . "</td>";
				    echo "<td><img src='../".$row['imgUrl']."' style='height:40px'></td>"; 
				    echo "<td><a href='bannerUpdate.php?id=".$row['id']."'>修改</a></td>";
				    echo "</tr>";
				}
			 ?>
		</table>
	</div>

	<!--下载二维码-->
	<div class="allPicture" >
		<label>二维码</label>
		<table  class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>图片名</th>
					<th>图片地址</th>
					<th>图片缩略图</th>
					<th>操作</th>
				</tr>
			</thead>

			<?php
				include 'connect.php';
				$result = mysql_query("SELECT * FROM banner  where type='ewm'");   
				while($row= mysql_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
				    echo "<td>" . $row['name'] . "</td>";
				    echo "<td>" . $row['imgUrl'] . "</td>";
				    echo "<td><img src='../".$row['imgUrl']."' style='height:40px'></td>"; 
				    echo "<td><a href='bannerUpdate.php?id=".$row['id']."'>修改</a></td>";
				    echo "</tr>";
				}
			 ?>
		</table>
	</div>
	
	<!--apk下载链接-->
	<div class="allPicture" >
		<label>url下载管理</label>
		<table  class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>类型</th>
					<th>名字</th>
					<th>URL地址</th>
					<th>操作</th>
				</tr>
			</thead>

			<?php
				include 'connect.php';
				$result = mysql_query("SELECT * FROM banner  where type='apk'");  //通过id倒序获取数据
				while($row= mysql_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
				    echo "<td>" . $row['type2'] . "</td>";
				    echo "<td>" . $row['name'] . "</td>";
				    echo "<td>" . $row['clickUrl'] . "</td>";
				    echo "<td><a href='bannerUpdate2.php?id=".$row['id']."'>修改</a></td>";
				    echo "</tr>";
				}
			 ?>
		</table>
	</div>

	<!--pc端轮播图管理-->
	<div class="allPicture" >
		<label>pc端新闻轮播图</label>
		<table  class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>图片名</th>
					<th>图片地址</th>
					<th>点击跳转地址</th>
					<th>排序</th>
					<th>图片缩略图</th>
					<th colspan="2">操作</th>
				</tr>
			</thead>

			<?php
				include 'connect.php';
				$result = mysql_query("SELECT * FROM banner  where type='scroll' and type2='p' order by sequance desc ");  //通过id倒序获取数据
				while($row= mysql_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
				    echo "<td>" . $row['name'] . "</td>";
				    echo "<td>" . $row['imgUrl'] . "</td>";
				    echo "<td>" . $row['clickUrl']. "</td>";
				    echo "<td>" . $row['sequance'] . "</td>";
				    echo "<td><img src='../".$row['imgUrl']."' style='height:40px'></td>";
				    echo "<td><a href='scrollUpdate.php?id=".$row['id']."'>修改</a></td>";
				    echo "<td><a href='bannerDelete.php?id=".$row['id']."'>删除</a></td>";
				    echo "</tr>";
				}
			 ?>
			<tr id="add" ><td colspan="9"> <a href="#add">+添加轮播图</a></td></tr>
			<tr style="display: none;" class="addBox">
				<form action="bannerInsert.php?type=scroll" role="form" method="post">
				<td></td>
				<td ><input type="text" name="name"></td>
				<td ><input type="text" name="imgUrl"></td>
				<td ><input type="text" name="clickUrl"></td> 
				<td ><input type="text" name="sequance"></td> 
				<td ><input type="submit"  class="btn1" value="确认轮播图" ></td>
				<td colspan="2"><a href="#cancel" id="cancel" class="btn">取消添加</a></td>
				</form>
			</tr>
		</table>
	</div>

	<!--移动端轮播图管理-->
	<div class="allPicture" >
		<label>移动端新闻轮播图</label>
		<table  class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>图片名</th>
					<th>图片地址</th>
					<th>点击跳转地址</th>
					<th>排序</th>
					<th>图片缩略图</th>
					<th colspan="2">操作</th>
				</tr>
			</thead>

			<?php
				include 'connect.php';
				$result = mysql_query("SELECT * FROM banner  where type='scroll' and type2='m' order by sequance desc ");  //通过id倒序获取数据
				while($row= mysql_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
				    echo "<td>" . $row['name'] . "</td>";
				    echo "<td>" . $row['imgUrl'] . "</td>";
				    echo "<td>" . $row['clickUrl']. "</td>";
				    echo "<td>" . $row['sequance'] . "</td>";
				    echo "<td><img src='../".$row['imgUrl']."' style='height:40px'></td>";
				    echo "<td><a href='scrollUpdate.php?id=".$row['id']."'>修改</a></td>";
				    echo "<td><a href='bannerDelete.php?id=".$row['id']."'>删除</a></td>";
				    echo "</tr>";
				}
			 ?>
			<tr id="add3" ><td colspan="9"> <a href="#add">+添加轮播图</a></td></tr>
			<tr style="display: none;" class="addBox3">
				<form action="bannerInsert.php?type=scroll2" role="form" method="post">
				<td></td>
				<td ><input type="text" name="name"></td>
				<td ><input type="text" name="imgUrl"></td>
				<td ><input type="text" name="clickUrl"></td> 
				<td ><input type="text" name="sequance"></td> 
				<td ><input type="submit"  class="btn1" value="确认轮播图" ></td>
				<td colspan="2"><a href="#cancel" id="cancel3" class="btn">取消添加</a></td>
				</form>
			</tr>
		</table>
	</div>

	<!--游戏特色管理-->
	<div class="allPicture" >
		<label>游戏特色</label>
		<table  class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>图片名</th>
					<th>图片地址</th>
					<th>排序</th>
					<th>图片缩略图</th>
					<th colspan="2">操作</th>
				</tr>
			</thead>

			<?php
				include 'connect.php';
				$result = mysql_query("SELECT * FROM banner where type='feature' order by sequance desc ");  //通过id倒序获取数据
				while($row= mysql_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
				    echo "<td>" . $row['name'] . "</td>";
				    echo "<td>" . $row['imgUrl'] . "</td>";
				    echo "<td>" . $row['sequance']. "</td>";
				    echo "<td><img src='../".$row['imgUrl']."' style='height:40px'></td>";
				    echo "<td><a href='scrollUpdate.php?id=".$row['id']."'>修改</a></td>";
				    echo "<td><a href='bannerDelete.php?id=".$row['id']."'>删除</a></td>";
				    echo "</tr>";
				}
			?>
		 	<tr id="add2" ><td colspan="9"> <a href="#add">+添加轮播图</a></td></tr>
			<tr style="display: none;" class="addBox2">
				<form action="bannerInsert.php?type=feature" role="form" method="post">
				<td></td>
				<td ><input type="text" name="name"></td>
				<td ><input type="text" name="imgUrl"></td>
				<td ><input type="text" name="sequance"></td> 
				<td ><input type="submit"  class="btn1" value="确认轮播图" ></td>
				<td colspan="2"><a href="#cancel2" id="cancel2" class="btn">取消添加</a></td>
				</form>
			</tr>
		</table>
	</div>
</div>
    <script type="text/javascript">
	 	$(document).ready(function() {
	 		/**pc添加轮播图**/
	 	 	$('#add').click(function(){
	 	 	 	$('#add').hide();
	 	 	 	$('.addBox').show();
	 	 	})
	 	 	$('#cancel').click(function(){
	 	 	 	$('#add').show();
	 	 	 	$('.addBox').hide();
	 	 	})

	 	 	/**移动添加轮播图**/
	 	 	$('#add3').click(function(){
	 	 	 	$('#add3').hide();
	 	 	 	$('.addBox3').show();
	 	 	})
	 	 	$('#cancel3').click(function(){
	 	 	 	$('#add3').show();
	 	 	 	$('.addBox3').hide();
	 	 	})


	 	 	/**添加游戏特色**/
	 	 	$('#add2').click(function(){
	 	 	 	$('#add2').hide();
	 	 	 	$('.addBox2').show();
	 	 	})
	 	 	$('#cancel2').click(function(){
	 	 	 	$('#add2').show();
	 	 	 	$('.addBox2').hide();
	 	 	})

	 	})
	</script>
</body>
</html>