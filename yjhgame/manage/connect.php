<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con = mysql_connect("578de6347e16c.gz.cdb.myqcloud.com:13327","cdb_outerroot","lover123");
	if (!$con){
	    die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('yuanjihua', $con);
	mysql_query('set names utf8'); 
?>