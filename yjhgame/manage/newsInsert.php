 <?php
	header("Content-Type:text/html;charset=utf-8");
	include 'connect.php';
	$type = $_GET['type'];
	if ($type=='article') {
		$sql="INSERT INTO article (type, title, author,content,createtime,state,homepage) VALUES('$_POST[type]','$_POST[title]','$_POST[author]','$_POST[content]','$_POST[createTime]','0','1' )";
		if (!mysql_query($sql,$con)){
		   die('Error: ' . mysql_error());
		}
		echo "<script>alert('添加成功');window.location.href='newsManage.php';</script>";
	}

	if ($type=='data') {
		$sql="INSERT INTO data (type, title, author,content,createtime,state,homepage) VALUES('$_POST[type]','$_POST[title]','$_POST[author]','$_POST[content]','$_POST[createTime]','0','1' )";
		if (!mysql_query($sql,$con)){
		   die('Error: ' . mysql_error());
		}
		echo "<script>alert('添加成功');window.location.href='data.php';</script>";
	}
	mysql_close($con);
?>
