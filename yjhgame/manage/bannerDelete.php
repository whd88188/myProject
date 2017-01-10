<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'connect.php';   //引入链接数据库文件
	$id=$_GET['id'];  //获取传递过来要删除的id
	$dlt=delete($id,$con);

	if($dlt>=1){
	    echo  "<script>alert('删除成功');</script>";
	    echo  "<script>window.location.href='bannerManage.php';</script>";
	}else{
	    echo  "<script>alert('删除失败');</script>";
	    echo  "<script>window.location.href='bannerManage.php';</script>";
	}
	function delete($id,$con){
        $sql = "delete from banner where id='$id'";  // 执行删除
        mysql_query($sql,$con);   // 获取影响的行数
        $rows = mysql_affected_rows();  // 返回影响行数
        return $rows;
	}
?>