<?php

// 链接数据库
include_once 'system.inc.php';

// action 的值做对操作

switch ($_GET['action']){

    case 'add': // add
        $category = $_POST['category'];
        $state = $_POST['state'];
        $title = $_POST['title'];
        $directory = $_POST['directory'];
        $type = $_POST['type'];
        $proto_url = $_POST['proto_url'];
        $page_url = $_POST['page_url'];
        $sponsor = $_POST['sponsor'];
        $time_start = $_POST['time_start'];
        $time_end = $_POST['time_end'];
        $progress = $_POST['progress'];
        $time_finish = $_POST['time_finish'];
        $designer = $_POST['designer'];
        $coder = $_POST['coder'];
        $time_submit = date("Y-m-d");
        $year = date("Y");


        $sql = "insert into page_info (category, state, title, directory, type, proto_url, page_url, sponsor, time_submit, time_start, time_end, progress, time_finish, designer, coder, year) values ('{$category}', '{$state}', '{$title}', '{$directory}', '{$type}', '{$proto_url}', '{$page_url}', '{$sponsor}', '{$time_submit}', '{$time_start}', '{$time_end}', '{$progress}', '{$time_finish}', '{$designer}', '{$coder}', '{$year}')";
        $rw = $conn->exec($sql);
        if ($rw > 0){
            echo "<script>alert('添加成功');</script>";
        }else{
            echo "<script>alert('添加失败');</script>";
        }
        echo "<script>location.href='index.php';</script>";
        break;

    case 'del': // get
        $id = $_GET['id'];
        $sql = "delete from page_info where id={$id}";
        $rw = $conn->exec($sql);
        if ($rw > 0){
            echo "<script>alert('删除成功');</script>";
        }else{
            echo "<script>alert('删除失败');</script>";
        }
        echo "<script>location.href='index.php';</script>";
        break;

    case 'edit': // post
        $id = $_POST['id'];
        $category = $_POST['category'];
        $state = $_POST['state'];
        $title = $_POST['title'];
        $directory = $_POST['directory'];
        $type = $_POST['type'];
        $proto_url = $_POST['proto_url'];
        $page_url = $_POST['page_url'];
        $sponsor = $_POST['sponsor'];
        // $time_submit = $_POST['time_submit'];
        $time_start = $_POST['time_start'];
        $time_end = $_POST['time_end'];
        $progress = $_POST['progress'];
        $time_finish = $_POST['time_finish'];
        $designer = $_POST['designer'];
        $coder = $_POST['coder'];
        // $year = $_POST['year'];

        $sql = "update page_info set category = '{$category}', state = '{$state}', title = '{$title}', directory = '{$directory}', type = '{$type}', proto_url = '{$proto_url}', page_url = '{$page_url}', sponsor = '{$sponsor}', time_start = '{$time_start}', time_end = '{$time_end}', progress = '{$progress}', time_finish = '{$time_finish}', designer = '{$designer}', coder = '{$coder}' where id={$id};";
        // $sql = "update myapp.page_info set name='jike',sex='女', age=24,classid=44 where id=17";
        // print $sql;
        $rw = $conn->exec($sql);
        if ($rw > 0){
            echo "<script>alert('更新成功');</script>";
        }else{
            echo "<script>alert('更新失败');</script>";
        }
        echo "<script>location.href='index.php';</script>";
        break;

    default:
        echo "<script>location.href='index.php';</script>";
        break;
}

?>
