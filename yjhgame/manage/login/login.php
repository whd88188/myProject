<?php 
	session_start(); 
	if(!isset($_POST['submit'])){
    	exit('非法访问!');
	}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
    include '../connect.php';
	$login_id=$_POST['login_id'];
	$password=$_POST['password'];

	if ($login_id && $password){
		$sql = "SELECT * FROM manager WHERE login_id = '$login_id' and password='$password' ";
		$res = mysql_query($sql);
		$rows=mysql_num_rows($res);
		$result =mysql_fetch_array($res);
	 	if($rows){
	 		$_SESSION['login_id'] = $login_id;
    		$_SESSION['id'] = $result['id'];
	   		header('refresh:0;url=../index.php?id='.$result['id'].'');//跳转页面，注意路径
	 	}else{
	   		echo "<script>alert('用户名或密码错误');history.back(); </script>";
		}
	}
	else {
	   echo "<script>alert('用户名和密码不能为空');history.back(); </script>";
	   die(mysql_error());
	}
	
?>
</body>
</html>
 