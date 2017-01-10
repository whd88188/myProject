<?php
	include 'connect.php';
	$load = mysql_query("SELECT * FROM banner where type='apk' and type2='android'");
	$loadRow = mysql_fetch_array($load);
?>