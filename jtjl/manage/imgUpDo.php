<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
</style>
</head>
<body>
<?php

	include 'connect.php';
	date_default_timezone_set('prc'); //设置时区为北京时间，不然获取当前时间是会相差8小时 
	$createTime=date("Y-m-d H:i:s"); //获取当期时间
	$sql="INSERT INTO allPicture (type, name,imgUrl,createTime) VALUES ('$_POST[type]','$_POST[name]','$_POST[imgUrl]','$createTime')";
	if (!mysql_query($sql,$con)){
		die('Error: ' . mysql_error());
	}
	else{
	    echo "<script> alert('添加成功')</script>";
		echo "<script>window.location.href='index.php';</script>";   //添加成功后返回图谱按管理页面
	}

	mysql_close($con);
?>
</body>
</html>
