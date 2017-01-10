<?php	
	session_start();	
	unset($_SESSION['id']);
	header("Content-type:text/html; charset=utf-8"); 
 	echo "<script> window.location.href='index.html'; alert('退出成功'); </script>";
	exit;
?>