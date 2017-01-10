<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
	include 'connect.php';
	$sql="INSERT INTO article (type, title, author,content,createtime,state,homepage) VALUES('$_POST[type]','$_POST[title]','$_POST[author]','$_POST[content]','$_POST[createTime]','0','1' )";
	if (!mysql_query($sql,$con)){
	   die('Error: ' . mysql_error());
	}
	echo "<script>alert('添加成功');window.location.href='newsManage.php';</script>";
	mysql_close($con);
?>
</body>
</html>
