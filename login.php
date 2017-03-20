<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
?>
<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>登录</title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/app.css">
<!--[if lt IE 9]>
<script src="lib/html5shiv/3.7.3/html5shiv.min.js"></script>
<![endif]-->
</head>

<body>
<header class="g-hd">
    <div class="m-nav">
        <div class="g-cnt">
            <a class="logo f-fl" href="/"><img src="images/logo.png" alt="">ZMNSEM</a>
            <ul class="nav-cnt f-fl">
                <li class="nav-item">
                    <h3><a href="index.php">页面排期</a><i></i></h3>
                </li>
            </ul>
            <?php
                if (!isset($_SESSION['log']) || $_SESSION['log'] == false) {
                    echo '<div class="u-user f-fr"><i></i><a href="login.php">登录</a></div>';
                } else {
                    echo '<div class="u-user f-fr"><i><img src="images/user_img.png" alt=""></i>管理员</div>';
                }
            ?>
        </div>
    </div>
</header>
<div class="g-bd g-cnt">
    <div class="m-form m-login">
        <form action="check.php" method="post">
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>用户名</label></div>
                <div class="ant-col-14 item-input">
                    <span class="ant-input-preSuffix-wrapper"><span class="ant-input-prefix"><i class="anticon anticon-user" style="font-size:13px;"></i></span><input class="ant-input ant-input-lg" id="username" type="text" name="username" placeholder="Username"></span>
                </div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>密码</label></div>
                <div class="ant-col-14 item-input">
                    <span class="ant-input-preSuffix-wrapper"><span class="ant-input-prefix"><i class="anticon anticon-lock" style="font-size:13px;"></i></span><input class="ant-input ant-input-lg" id="password" type="password" name="password" placeholder="Password"></span>
                </div>
            </div>
            <?php
                if(!isset($_SESSION['user'])) {
                    if($_SESSION['login'] == true) {
                        echo "账号不存在或者密码错误";
                    }
                }
            ?>
            <div class="form-ft f-tac f-mtv">
                <button id="submit" type="submit" class="u-btn u-btn-primary u-btn-lg"><span>登录</span></button>
            </div>
        </form>
    </div>
</div>
<footer class="g-ft">
    <div class="g-cnt">
        <div class="f-fl">&copy;2017 ZmnSEM 体验技术部出品</div>
        <div class="f-fr">文档版本：0.0.1</div>
    </div>
</footer>

<script src="lib/jquery/1.11.3/jquery.min.js"></script>
<script src="lib/superslide/jquery.SuperSlide.2.1.2.js"></script>
<script src="js/app.js"></script>
</body>
</html>
