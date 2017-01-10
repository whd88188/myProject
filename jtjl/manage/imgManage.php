<?php 
	session_start(); 
	//检测是否登录，若没登录则转向登录界面
	if(!isset($_SESSION['id'])){
    	header("Location:login/");
   	    exit();	
	}
?>
<!doctype html>
<html>
<head>
<title>图片管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
</head>
<body>
<div class="container">
	<div class="hnav">
		<ul class="nav">
			<a href="index.php"><li>首页</li></a>
			<a href="imgManage.php"><li class="on">图片管理</li></a>
			<a href="bannerManage.php"><li>banner管理</li></a>
			<a href="newsManage.php"><li>文章管理</li></a>
			<a href="login/login_out.php"><li>退出</li></a>
		</ul>
		<div class="logo"><img src="../images/logo.png" style="width: 100px;"></div>
	</div>
	<div class="top">图片管理</div>
	<!--图片上传-->
	<div class="upimg">
		
		<form enctype="multipart/form-data" method="post" name="upform" class="">
			<label for="up">上传图片：</label>
			<input name="upfile" type="file"   id="up"  style="display: inline-block;font-size: 15px;padding: 7px; border-radius: 6px;" class="add">
			<input type="submit" value="确认上传" class="btn1"><br>
			<!--允许上传的文件类型为:<?=implode(', ',$uptypes)?>   -->
		</form>

		<?php
		/******************************************************************************
		参数说明:
		$max_file_size  : 上传文件大小限制, 单位BYTE
		$destination_folder : 上传文件路径
		$watermark   : 是否附加水印(1为加水印,其他为不加水印);
		******************************************************************************/
		//上传文件类型列表
		$uptypes=array(
		    'image/jpg',
		    'image/jpeg',
		    'image/png',
		    'image/pjpeg',
		    'image/gif',
		    'image/bmp',
		    'image/x-png'
		);

		$max_file_size=2000000;     //上传文件大小限制, 单位BYTE
		$destination_folder="../uploadimg/"; //上传文件路径
		$watermark=0;      //是否附加水印(1为加水印,其他为不加水印);
		$watertype=1;      //水印类型(1为文字,2为图片)
		$waterposition=5;     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);
		$waterstring="huiyaohuyu";  //水印字符串
		$waterimg="video.gif";    //水印图片
		$imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);
		$imgpreviewsize=1/4;    //缩略图比例
		?>


		<?php
		

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		    if (!is_uploaded_file($_FILES["upfile"]['tmp_name']))
		    //是否存在文件
		    {
		         echo "<font color='red' >请选择要上传的图片!</font color='red'>";
		         exit;
		    }

		    $file = $_FILES["upfile"];
		    if($max_file_size < $file["size"])
		    //检查文件大小
		    {
		        echo "文件太大!";
		        exit;
		    }

		    if(!in_array($file["type"], $uptypes))
		    //检查文件类型
		    {
		        echo "文件类型不符!".$file["type"];
		        exit;
		    }

		    if(!file_exists($destination_folder))
		    {
		        mkdir($destination_folder);
		    }

		    $filename=$file["tmp_name"];
		    $image_size = getimagesize($filename);
		    $pinfo=pathinfo($file["name"]);
		    $ftype=$pinfo['extension'];
		    $destination = $destination_folder.time().".".$ftype;
		    if (file_exists($destination) && $overwrite != true)
		    {
		        echo "同名文件已经存在了";
		        exit;
		    }

		    if(!move_uploaded_file ($filename, $destination))
		    {
		        echo "移动文件出错";
		        exit;
		    }

		    $pinfo=pathinfo($destination);
		    $fname=$pinfo['basename'];
		    $size=$file["size"]/1024;
		    echo " <div class='success'> <font color=green>已经成功上传</font><br>图片路径:  <font color=blue>uploadimg/".$fname."</font><br><em>(请把图片路径复制然后添加到数据库以便使用)</em><br>";
		    echo " 宽:".$image_size[0]."px";
		    echo " 高:".$image_size[1]."px";
		    echo " 大小:".round($size)." KB </div>";

		    if($watermark==1)
		    {
		        $iinfo=getimagesize($destination,$iinfo);
		        $nimage=imagecreatetruecolor($image_size[0],$image_size[1]);
		        $white=imagecolorallocate($nimage,255,255,255);
		        $black=imagecolorallocate($nimage,0,0,0);
		        $red=imagecolorallocate($nimage,255,0,0);
		        imagefill($nimage,0,0,$white);
		        switch ($iinfo[2])
		        {
		            case 1:
		            $simage =imagecreatefromgif($destination);
		            break;
		            case 2:
		            $simage =imagecreatefromjpeg($destination);
		            break;
		            case 3:
		            $simage =imagecreatefrompng($destination);
		            break;
		            case 6:
		            $simage =imagecreatefromwbmp($destination);
		            break;
		            default:
		            die("不支持的文件类型");
		            exit;
		        }

		        imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
		        imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);

		        switch($watertype)
		        {
		            case 1:   //加水印字符串
		            imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$black);
		            break;
		            case 2:   //加水印图片
		            $simage1 = imagecreatefromgif("video.gif");
		            imagecopy($nimage,$simage1,0,0,0,0,85,15);
		            imagedestroy($simage1);
		            break;
		        }

		        switch ($iinfo[2])
		        {
		            case 1:
		            //imagegif($nimage, $destination);
		            imagejpeg($nimage, $destination);
		            break;
		            case 2:
		            imagejpeg($nimage, $destination);
		            break;
		            case 3:
		            imagepng($nimage, $destination);
		            break;
		            case 6:
		            imagewbmp($nimage, $destination);
		            //imagejpeg($nimage, $destination);
		            break;
		        }

		        //覆盖原上传文件
		        imagedestroy($nimage);
		        imagedestroy($simage);
		    }

		    if($imgpreview==1)
		    {
			    echo "<div class='preview'><br>图片预览:<br>";
			    echo "<img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);
			    echo " alt=\"图片预览:\r文件名:".$destination."\r上传时间:\"></div>";
		    }
		  }
		?>

	</div>
	<!--图片上传 end-->

	<!--添加图片到数据库-->
	<div class="addImg form-group">
		<form action="imgUpDo.php" role="form" method="post">
		<label>添加图片：</label> 
			    <input type="text" name="imgUrl" placeholder="图片路径" class="add" id="imgurl">
			    <input type="text" name="name" placeholder="图片名称" class="add">  
			  <input type="text" name="type" placeholder="图片类型" class="add"> 
			<input type="submit" value="确认添加" class="btn1" id="addimg">
		</form>
	</div>


	<!--管理全部图片-->
	<div class="allPicture" >
		<label>图片列表</label>
		<table  class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>图片类型</th>
					<th>图片名</th>
					<th>图片地址</th>
					<th>图片缩略图</th>
					<th>添加时间</th>
					<th>操作</th>
				</tr>
			</thead>

			<?php
			 include 'connect.php';
			 if(is_array($_GET)&&count($_GET)>0)//先判断是否通过get传值了
                        {
                            if(isset($_GET["page"]))//是否存在"page"的参数
                            {
                                $page=$_GET["page"];//存在
                            }
                            else {
                                $page=1;
                            }
                        }else {
                                $page=1;
                        }
             $pagesize=12;   //设置每页显示条数
             $showpage=3;   //设置显示的数字页数量
             $startCount = ($page-1)*$pagesize; //分页开始,根据此方法计算出开始的记录    

			 $res="SELECT * FROM allPicture order by id desc limit $startCount,$pagesize ";  //通过id倒序获取数据
			 $result =mysql_query($res);	 
			 while($row= mysql_fetch_array($result))
			 {
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
			    echo "<td>" . $row['type'] . "</td>";
			    echo "<td>" . $row['name'] . "</td>";
			    echo "<td>" . $row['imgUrl'] . "</td>";
			    echo "<td><img src='../".$row['imgUrl']."' style='width:80px'></td>";
			    echo "<td>" .$row['createTime'] . "</td>";
			    echo "<td><a href='imgDelect.php?id=".$row['id']."'>删除</a></td>";
			    echo "</tr>";
			 }

            /**********分页制作*************/
            //获取数据总数
            $total_sql="SELECT COUNT(*) FROM allPicture";
            $total_result=mysql_fetch_array(mysql_query($total_sql));
            $total=$total_result[0];
             //计算页数
            $total_pages=ceil($total/$pagesize);
             
            mysql_close($con);

            //显示分页
            $page_banner="";
            //计算偏移量
            $pageoffset=($showpage-1)/2;

            if ($page>1)
            {
                $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1' class='page_fl'>首页</a>";
                $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($page-1)."' class='page_fl'><上一页</a>";
            }
             
            //初始化数据
            $start=1;   
            $end=$total_pages;
            //显示页码
            if($total_pages>$showpage)
            {
                if($page>$pageoffset+1)
                {
                   // $page_banner.="...";
                }
                
                if ($page>$pageoffset) {
                    $start=$page-$pageoffset;
                    $end=$total_pages>$page+$pageoffset?$page+$pageoffset:$total_pages;
                }else {
                    $start=1;
                    $end=$total_pages > $showpage ? $showpage:$total_pages;
                }
                if ($page+$pageoffset>$total_pages) {
                    $start=$start-($page+$pageoffset-$end);
                }
            }

            //遍历显示页码
            for($i=$start; $i<=$end; $i++){
                  $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".$i."' class='page'>{$i}</a>";
            }

            //尾部省略
            if($total_pages>$showpage&&$total_pages>$page+$pageoffset) {
                //  $page_banner.="...";
            }
            if($page<$total_pages)
             {
                $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($page+1)."' class='page_fl'>下一页></a>";
                $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($total_pages)."' class='page_fl'>尾页</a>";
             }
             
           
             $page_banner.="<span href='' class='tatol_page'>共 {$total_pages} 页</span>";
             /*******
              $page_banner.="<form action='page.php' method='get' style='display:inline-block;'>";
             $page_banner.="到第<input type='text' size='1' name='p'>页";
             $page_banner.="<input type='submit' value='确定'>";
             $page_banner.="<form>";
            *****/

			 ?>
		</table>
		<?php
                echo "<span class='pagebar'>".$page_banner."</span>";
        ?>

	</div>
</div>

<script>
/*********为兼容IE10以下而搬砖************/
function isPlaceholder(){  
    var input = document.createElement('input');  
    return 'placeholder' in input;  
}  
  
if (!isPlaceholder()) {//不支持placeholder 用jquery来完成  
    $(document).ready(function() {  
        if(!isPlaceholder()){  
            $("input").not("input[type='password']").each(//把input绑定事件 排除password框  
                function(){  
                    if($(this).val()=="" && $(this).attr("placeholder")!=""){  
                        $(this).val($(this).attr("placeholder"));//获取当前input的属性值，属性值可以获取也可以设置
                        $(this).focus(function(){  //focus()方法是获取焦点，blur()方法是失去焦点
                            if($(this).val()==$(this).attr("placeholder")) $(this).val("");  
                            //当前input获得焦点时，把当前input设置为空
                        });  
                        $(this).blur(function(){  
                            if($(this).val()=="")  $(this).val($(this).attr("placeholder"));   
                            //if里面的执行语句是一句是可以不带括号，当大于一句时一定得带括号
                        });  
                    }  
            });  
            //对password框的特殊处理1.创建一个text框 2获取焦点和失去焦点的时候切换，先在原有input后面插入一个input，在得焦的时候把插入的隐藏，原有的出现；在失焦的时候把原有的隐藏，插入的出现  
            var pwdField   = $("input[type=password]");  
            var pwdVal     = pwdField.attr('placeholder');  
            pwdField.after('<input id="pwdPlaceholder" type="text" value='+pwdVal+' autocomplete="off" />');  
            var pwdPlaceholder = $('#pwdPlaceholder');  
            pwdPlaceholder.show();  
            pwdField.hide();  
              
            pwdPlaceholder.focus(function(){     
                pwdPlaceholder.hide();  
                pwdField.show();  
                pwdField.focus();  
            });  
              
            pwdField.blur(function(){  
                if(pwdField.val() == '') {  
                    pwdPlaceholder.show();  
                    pwdField.hide();  
                }  
            });  
              
        }  
    });  
      
}  

/******动态改变分页按钮背景*******/
$(document).ready(function(){


	  var url=window.location.search;
	  if(url=="")
	  {
	    $('.page').eq(0).css({"background":"#428bca","color":"#fff","border":"1px solid #428bca"});
	  }
	 // alert(url);
	  //  alert(url.length);
	  //  alert(url.lastIndexOf('='));
	  var loc = url.substring(url.lastIndexOf('=')+1, url.length);
	  // alert(loc);
	  $('.page').each(function(){
	      var text=$(this).text();
	  // alert(text);
	      if (text==loc) {
	          $(this).css({"background":"#428bca","color":"#fff","border":"1px solid #428bca"});
	      }
	  })
 })
</script>

</body>
</html>