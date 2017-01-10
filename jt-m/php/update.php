<?php 
	include 'connect.php';
	//版本更新
	$update =  mysql_query("SELECT * FROM banner where type='apk' and type2='update' ");
	$updateRow = mysql_fetch_array($update);
?>