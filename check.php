<?php

// 链接数据库
include_once 'system.inc.php';

error_reporting(E_ALL ^ E_NOTICE);
session_start();

$username = $_POST['username'];
if($username == "") {
    $_SESSION['login'] = false;
    $_SESSION['log'] = false;
    echo "<script>location.href='login.php'; </script>";
    exit;
}

$password = $_POST['password'];
$passmd5 = md5($password);
$query = "select id from sem_user where user_name='{$username}' and password='{$passmd5}'";
$result = $conn->query($query);

if($result->rowCount() == 1) {
    $_SESSION['user'] = $username;
    $_SESSION['login'] = false;
    $_SESSION['log'] = true;
    echo " <script>location.href='index.php';</script>";
} else {
    $_SESSION['login'] = true;
    $_SESSION['log'] = false;
    unset($_SESSION['user']);
    echo " <script>location.href='login.php';</script>";
}

?>
