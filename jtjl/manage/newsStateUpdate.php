<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>

 <?php
    include 'connect.php';
  //  date_default_timezone_set('prc'); //设置时区为北京时间，不然获取当前时间是会相差8小时 
  //  $changeTime = date("Y-m-d H:i:s");

    $id = $_GET['id'];
    $sql = 'select * from article where id='.$id;
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    if ($row['state'] == "0") {
        $state = "1";
    }else{
        $state = "0";
    }

  	$sq = "update article set state='$state' where id='$id' ";
    mysql_query($sq,$con); // 获取影响的行数
    $rows = mysql_affected_rows();  // 返回影响行数
    if ($row['state'] == "0") {
        if($rows >= 1){
        	echo "<script language='javascript'>alert('启用成功');</script>";
            header("refresh:0;url=newsManage.php");
        }else{
            echo "<script language='javascript'>alert('启用失败');history.back();</script>";
        }
    }else{
        echo "<script language='javascript'>alert('停用成功');</script>";
        header("refresh:0;url=newsManage.php");
    }
?>
</body>
</html>