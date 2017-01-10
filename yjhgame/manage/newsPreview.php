<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>新闻详情</title>
<meta charset="UTF-8" >
<meta name="keywords" content="源计划游戏，源计划官网">
<meta name="description" content="源计划游戏，源计划官网" >
<meta name=”viewport” content=”width=device-width, initial-scale=1, maximum-scale=1″>
<link rel="stylesheet" type="text/css" href="css/preview.css">
<script type="text/javascript"src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript"src="js/common.js"></script>
</head>

<body>
<div class="container" >
    <!---->
     
    <!--头部header-->
    <div class="header"
        <a href=""><img src="../images/logo.png" class="logo"></a>
        <img src="../images/navbg.png" class="navbg">
        <div class="nav">
            <ul>
                <a href="#"><li>官网首页</li></a>
                <a href="#"><li>新闻中心</li></a>
                <a href="#"><li>游戏资料</li></a>
                <a href="#"><li>游戏攻略</li></a>
                <a href="#"><li>英雄库</li></a>
                <p><span>关注公共号赢大奖 </span><img src="../images/hwc.png"><img src="../images/navwc.png" class="navwc" ></p>
            </ul>
        </div>
    </div>
    <div class="news_content">
        <div class="left">
            <a href="#"><div class="load1">领取礼包</div></a>
            <a href="#"><div class="load2">Andriod下载</div></a>
        </div>
        <div class="details_right">
            <div class="topbg">
                <div class="news_top">
                    <h1>文章中心</h1>
                    <p>当前位置：<a href="">首页</a>>文章中心</p>
                </div>
            </div>

            <?php
                include 'connect.php';

                $type = $_GET['type'];
                if ($type=='data') {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM data WHERE id=".$id;
                    $result = mysql_query($sql);
                    $data = mysql_fetch_array($result);
                }
                if ($type=='article') {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM article WHERE id=".$id;
                    $result = mysql_query($sql);
                    $article = mysql_fetch_array($result);
                }


            ?>
            <div class="news_detail">
                <h2> 
                    <?php 
                        if ($type=='data') {
                            echo $data['title'];
                        }else{
                            echo $article['title'];
                        }    
                    ?> 
                </h2>
                <h3>发布时间:
                    <?php 
                        if ($type=='data') {
                            echo $data['createTime'];
                        }else{
                            echo $article['createTime'];
                        }    
                    ?> 
                </h3>

               <?php 
                    if ($type=='data') {
                        echo $data['content'];
                    }else{
                        echo $article['content'];
                    }    
                ?> 

               <?php 
                    if ($type=='data') {
                        echo "<a href='data.php' style='float:right;color:#000;font-size:20px;text-decoration:underline;'>返回资料管理</a>";
                    }else{
                        echo "<a href='newsManage.php' style='float:right;color:#000;font-size:20px;text-decoration:underline;'>返回文章管理</a>";
                    }    
                ?> 
            </div>
        </div>
    </div>
    <!--底部footer-->
    <div class="footer">
        <div class="ft_box">
            <p><em>健康游戏公告：</em>抵制不良游戏，拒绝盗版游戏。注意自我保护，谨防受骗上当。适度游戏益脑，沉迷游戏伤身。合理安排时间，享受健康生活。</p>
            <div class="copyright">
                <div class="left"><a href=""><img src="../images/logo_ft.png" ></a></div>
                <div class="right">
                    <p>优依购互娱科技有限公司版权所有 2015-2016 <a href="">粤ICP备15108634号-1</a></p>
                    <p>《网络文化经营许可证》粤网文〔2016〕1029-186号</p>
                </div>
            </div>
        </div>
    </div>  
</div>

</body>
</html>