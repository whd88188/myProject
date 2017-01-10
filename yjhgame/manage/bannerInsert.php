<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'connect.php';
	$type = $_GET['type'] ;
	//插入pc端轮播图
	if( $type=='scroll' ){
		$sql="INSERT INTO banner (type,type2,name,imgUrl,clickUrl,sequance) 
			  VALUES('scroll','pc',$_POST[name]','$_POST[imgUrl]','$_POST[clickUrl]','$_POST[sequance]')";
		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
		else{
		    echo "<script> alert('添加成功')</script>";
			echo "<script>window.location.href='bannerManage.php';</script>";   //添加成功后返回banner管理界面
		}
	}

	//插入移动端轮播图
	if( $type=='scroll2' ){
		$sql="INSERT INTO banner (type,type2,name,imgUrl,clickUrl,sequance) 
			  VALUES('scroll','m','$_POST[name]','$_POST[imgUrl]','$_POST[clickUrl]','$_POST[sequance]')";
		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
		else{
		    echo "<script> alert('添加成功')</script>";
			echo "<script>window.location.href='bannerManage.php';</script>";   //添加成功后返回banner管理界面
		}
	}

	//插入游戏特色图
	if( $type=='feature' ){
		$sql="INSERT INTO banner (type,name,imgUrl,clickUrl,sequance) 
			  VALUES('feature','$_POST[name]','$_POST[imgUrl]','$_POST[clickUrl]','$_POST[sequance]')";
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
 
