<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
	include 'connect.php';   //引入链接数据库文件

	$id=$_GET['id'];  //获取传递过来要删除的id
	$res="SELECT * FROM allPicture WHERE id=".$id  ; //通过id选数据
	$result=mysql_query($res);
	$row = mysql_fetch_array($result);

	$file="../".$row['imgUrl'];
	$dfile = @unlink ($file); 
	$dlt=delete($id,$con);

	if(!$dfile == false&& $dlt>=1){
	  echo  "<script>alert('删除成功');</script>";
	  echo  "<script>window.location.href='index.php';</script>";
	}else{
	  echo  "<script>alert('删除失败');</script>";
	  echo  "<script>window.location.href='index.php';</script>";
	}
	function delete($id,$con){
        $sql = "delete from allPicture where id='$id'";  // 执行删除
        mysql_query($sql,$con);   // 获取影响的行数
        $rows = mysql_affected_rows();  // 返回影响行数
        return $rows;
	}
?>
</body>
</html>