<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>
  <?php
      include 'connect.php';

      date_default_timezone_set('prc'); //设置时区为北京时间，不然获取当前时间是会相差8小时
      $updateTime=date("Y-m-d H:i:s");
      $type = $_GET['type'];
      $id=$_GET['id'];

      if ($type == 1) {
          $name =$_POST['name'];
          $imgUrl=$_POST['imgUrl'];                 
        	$sq = "update banner set name='$name' , imgUrl='$imgUrl' ,updateTime='$updateTime' where id='$id' ";
        	
          mysql_query($sq,$con); // 获取影响的行数
          $rows = mysql_affected_rows();  // 返回影响行数
        
          if($rows >= 1){
          	echo "<script language='javascript'>alert('修改成功');</script>";
            header("refresh:0;url=bannerManage.php");
          }else{
            echo "<script language='javascript'>alert('修改失败');history.back();</script>";
            die('错误: ' . mysql_error());
          }
      }

      if ($type == 2) {

          $clickUrl = $_POST['clickUrl'];                 
          $sq = "update banner set clickUrl='$clickUrl' ,updateTime='$updateTime' where id='$id' ";
          
          mysql_query($sq,$con); // 获取影响的行数
          $rows = mysql_affected_rows();  // 返回影响行数
        
          if($rows >= 1){
            echo "<script language='javascript'>alert('修改成功');</script>";
            header("refresh:0;url=bannerManage.php");
          }else{
            echo "<script language='javascript'>alert('修改失败');history.back();</script>";
            die('错误: ' . mysql_error());
          }
      }
  ?>
</body>
</html>