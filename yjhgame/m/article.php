<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>源计划官网</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
<style>
*{margin: 0;padding: 0;}
body{
	min-width: 300px;
	max-width: 1080px;
	background-color: #f1ebeb;
	margin:0 auto;
}
.container{
	width: 90%;
	margin: 0 auto;
	padding: 10px;
}
.container img{
	width: 100%;
}
h2{
	width: 100%;
	height: 30px;
	line-height: 30px;
	font-size: 15px;
	text-align: center;

}
h3{
	color: #a4a4a4;
	text-align: center;
	font-size: 12px;
}
hr{
	margin: 8px 0 18px  0;
}

.footer{
	width: 100%;
}
.footer img{
	width: 100%;
	display: block;
}
</style>

</head>
<body>
	 <div class="container"> 
		
		 <?php
		 	include '../manage/connect.php';

		 	$id = $_GET['id'];
		 	$article = mysql_query("SELECT * FROM article where id='$id' ");
		 	$row = mysql_fetch_array($article);

		 	$t = strtotime($row['createTime']);
		 	$time = date("m-d",$t);
		 	$title = $row['title'];
		 	$content = $row['content'];

		 ?>



	 	<h2><?php echo $title; ?></h2>
	 	<h3>发布时间：<?php echo $time; ?></h3>
	 	<hr>
		
		<?php echo $content; ?>
	 </div>
	 <div class="footer"><img src="images/ft-logo.jpg" alt=""> </div>
</body>
</html>