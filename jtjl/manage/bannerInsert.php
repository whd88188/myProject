<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
	include 'connect.php';

	$type = $_GET['type'] ;

	if( $type=='scroll' ){
		$sql="INSERT INTO banner (type,type2,name,imgUrl,clickUrl,state,sequance) 
			  VALUES('scroll','p','$_POST[name]','$_POST[imgUrl]','$_POST[clickUrl]','0','$_POST[sequance]')";
		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
		else{
		    echo "<script> alert('添加成功')</script>";
			echo "<script>window.location.href='bannerManage.php';</script>";   //添加成功后返回banner管理界面
		}
	}

	if( $type=='scroll2' ){
		$sql="INSERT INTO banner (type,type2,name,imgUrl,clickUrl,state,sequance) 
			  VALUES('scroll','m','$_POST[name]','$_POST[imgUrl]','$_POST[clickUrl]','0','$_POST[sequance]')";
		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
		else{
		    echo "<script> alert('添加成功')</script>";
			echo "<script>window.location.href='bannerManage.php';</script>";   //添加成功后返回banner管理界面
		}
	}

	if( $type=='feature' ){
		$sql="INSERT INTO banner (type,name,imgUrl,clickUrl,state,sequance) 
			  VALUES('feature','$_POST[name]','$_POST[imgUrl]','$_POST[clickUrl]','0','$_POST[sequance]')";
		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
		else{
		    echo "<script> alert('添加成功')</script>";
			echo "<script>window.location.href='bannerManage.php';</script>";   //添加成功后返回banner管理界面
		}
	}
	mysql_close($con);
?>
</body>
</html>
 
