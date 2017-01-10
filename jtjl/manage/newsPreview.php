<?php 
    session_start(); 
    //检测是否登录，若没登录则转向登录界面
    if(!isset($_SESSION['id'])){
        header("Location:login/");
        exit(); 
    }
?>
 <!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>新闻中心</title>
<meta charset="UTF-8" />
<meta name="keywords" content="军团降临，军团降临官网"/>
<meta name="description" content="军团降临，军团降临官网" />
<meta name=”viewport” content=”width=device-width, initial-scale=1, maximum-scale=1″>
<link rel="stylesheet" type="text/css" href="../css/article.css">
<script type="text/javascript"src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript"src="/js/common.js"></script>
</head>

<body>
<div class="news_container" >
    <div class="navbox">
            <div class="nav">
                <div class="logo">
                    <img src="../images/logo.png" >
                    <h2>军团降临</h2>
                    <h3>新召唤玩法！</h3>
                </div>
                <div class="nav_li">    
                    <ul >
                        <a href="#"><li>官网首页</li></a>
                        <a href="#"><li class="on">新闻中心</li></a>
                        <a href="#"><li>英雄库</li></a>
                    <!--<a href="../../date.html"><li>游戏资料</li></a> -->
                        <a href="#"><li>游戏攻略</li></a>
                    </ul>
                </div>
            </div>
    </div>
    <div class="hbg"></div>
    <div class="news_center">
        <div class="n_right">
            <span class="erwei"><img src="../images/erwei.png" alt=""></span>
            <a href=""><div class="ios"><img src="../images/ios.png" alt=""></div></a>
            <a href=""><div class="android"><img src="../images/android.png" alt=""></div></a>
        </div>

        <?php
            include 'connect.php';
            $id = $_GET['id'];
            $result = mysql_query(" SELECT * FROM article where id='$id' ");
            $row = mysql_fetch_array($result);
        ?>
        <div class="n_left">
            <div class="title"><h2>新闻中心</h2><span>当前位置:<a href="#">首页</a>>新闻中心</span></div>
            <div class="news_detail">
                <div class="title">
                    <h2><?php echo $row['title'];?></h2>
                    <span>发布时间：<?php echo $row['createTime']; ?></span> 
                </div>
                <div class="neirong">
                     <?php echo $row['content']; ?>

                     <a href="newsManage.php" style="color: #000; text-decoration: underline;float: right;"><h1>返回文章管理</h1></a>
                </div>
            </div>
        </div>
        
    </div>
    <div class="footer2">
        <div class="footer_box">
            <div class="tip">
                <strong style="margin-top: 30px;">
                    <em style="color: #ddd697;">健康游戏公告</em>：抵制不良游戏，拒绝盗版游戏。注意自我保护，谨防受骗上当。适度游戏益脑，沉迷游戏伤身。合理安排时间，享受健康生活。
                </strong>
            </div>
            <div class="copyright">

                <img src="../images/logo_ft.png" alt="">
                <p style="position: absolute;top: 30px;left: 530px;">优依购互娱科技有限公司版权所有 2015-2016 <a href="" style="color:#64899f; ">粤ICP备15108634号-1</a></p>
                <p style="position: absolute;top: 50px;left: 576px;">《网络文化经营许可证》粤网文〔2016〕1029-186号</p>
            </div>
        </div>
    </div>   
</div>


</body>
</html>