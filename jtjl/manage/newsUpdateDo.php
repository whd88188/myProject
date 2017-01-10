<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
    include 'connect.php';
    date_default_timezone_set('prc'); //设置时区为北京时间，不然获取当前时间是会相差8小时 
    
    $id=$_GET['id'];
    $type=$_POST['type'];
    $title =$_POST['title'];
    $author=$_POST['author'];
    $createTime=$_POST['createTime'];
    $content=$_POST['content'];
    $updateTime=date("Y-m-d H:i:s");
     
  	$sq = "update article set id='$id' , type='$type' , title='$title' , author='$author' , createTime='$createTime' , updateTime='$updateTime' , content='$content' where id='$id' ";
    mysql_query($sq,$con); // 获取影响的行数
    $rows = mysql_affected_rows();  // 返回影响行数
    if($rows >= 1){
    	echo "<script language='javascript'>alert('修改成功');</script>";
        header("refresh:0;url=newsManage.php");
    }else{
        echo "<script language='javascript'>alert('修改失败');history.back();</script>";
    }
?>
</body>
</html>