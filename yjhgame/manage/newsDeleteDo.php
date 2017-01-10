<?php
    header("Content-Type:text/html;charset=utf-8");
    include 'connect.php';
    $type = $_GET['type'];

    function delete1($id,$con){
        $sql = "delete from article where id='$id'";
        mysql_query($sql,$con); // 执行删除
        $rows = mysql_affected_rows(); // 获取影响的行数
        return $rows;   // 返回影响行数
    }
    function delete2($id,$con){
        $sql = "delete from data where id='$id'";
        mysql_query($sql,$con); // 执行删除
        $rows = mysql_affected_rows(); // 获取影响的行数
        return $rows;   // 返回影响行数
    }
        
    function alert($title){
        echo "<script type='text/javascript'>alert('$title');</script>";
    }
    function href($url){
        echo "<script type='text/javascript'>window.location.href='$url'</script>";
    }

    if ($type=='article') {
        $id = $_GET['id'];    
        $row = delete1($id,$con);
        if ($row >=1) {
            alert("删除成功");
        } else {
            alert("删除失败");
        }
        // 跳转到用户列表页面
        href("newsManage.php");

        
    }

     if ($type=='data') {
        $id = $_GET['id'];    
        $row = delete2($id,$con);
        if ($row >=1) {
            alert("删除成功");
        } else {
            alert("删除失败");
        }
        // 跳转到用户列表页面
        href("data.php");

         
    }
?>