<?php
    session_start();
    if(!isset($_SESSION['log']) || $_SESSION['log'] == false) {
        echo " <script>location.href='login.php';</script> ";
        header("Content-type:text/html;charset=utf-8");
    } else {
        include_once 'system.inc.php'; // 链接数据库
        $sql_select = "select * from page_info where id={$_GET['id']}";
        $stmt = $conn->query($sql_select);
        if ($stmt->rowCount() >0) {
            $stu = $stmt->fetch(PDO::FETCH_ASSOC); // 解析数据
        }else{
            die("no have this id:{$_GET['id']}");
        }
    }
?>
<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>信息修改</title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<link rel="stylesheet" href="My97DatePicker/skin/WdatePicker.css">
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
    <div class="m-form m-info">
        <form action="action.php?action=edit" method="post">
            <input type="hidden" name="id" value="<?php echo $stu['id'];?>">
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>任务类别</label></div>
                <div class="ant-col-14 item-input">
                    <div class="ant-radio-group">
                        <label class="ant-radio-wrapper"><span class="ant-radio<?php echo ($stu['category'] == '新增专题')? ' ant-radio-checked':'';?>"><input type="radio" class="ant-radio-input" name="category" value="新增专题" <?php echo ($stu['category'] == "新增专题")? "checked":"";?>><span class="ant-radio-inner"></span></span><span>新增专题</span></label>
                        <label class="ant-radio-wrapper"><span class="ant-radio<?php echo ($stu['category'] == '改版专题')? ' ant-radio-checked':'';?>"><input type="radio" class="ant-radio-input" name="category" value="改版专题" <?php echo ($stu['category'] == "改版专题")? "checked":"";?>><span class="ant-radio-inner"></span></span><span>改版专题</span></label>
                        <label class="ant-radio-wrapper"><span class="ant-radio<?php echo ($stu['category'] == '修改专题')? ' ant-radio-checked':'';?>"><input type="radio" class="ant-radio-input" name="category" value="修改专题" <?php echo ($stu['category'] == "修改专题")? "checked":"";?>><span class="ant-radio-inner"></span></span><span>修改专题</span></label>
                    </div>
                </div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>状态</label></div>
                <div class="ant-col-14 item-input">
                    <div class="ant-radio-group">
                        <label class="ant-radio-wrapper"><span class="ant-radio<?php echo ($stu['state'] == '普通')? ' ant-radio-checked':'';?>"><input type="radio" class="ant-radio-input" name="state" value="普通" <?php echo ($stu['state'] == "普通")? "checked":"";?>><span class="ant-radio-inner"></span></span><span>普通</span></label>
                        <label class="ant-radio-wrapper"><span class="ant-radio<?php echo ($stu['state'] == '紧急')? ' ant-radio-checked':'';?>"><input type="radio" class="ant-radio-input" name="state" value="紧急" <?php echo ($stu['state'] == "紧急")? "checked":"";?>><span class="ant-radio-inner"></span></span><span>紧急</span></label>
                        <label class="ant-radio-wrapper"><span class="ant-radio<?php echo ($stu['state'] == '延后')? ' ant-radio-checked':'';?>"><input type="radio" class="ant-radio-input" name="state" value="延后" <?php echo ($stu['state'] == "延后")? "checked":"";?>><span class="ant-radio-inner"></span></span><span>延后</span></label>
                    </div>
                </div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>专题 Title</label></div>
                <div class="ant-col-14 item-input"><input class="ant-input ant-input-lg" type="text" name="title" value="<?php echo $stu['title'];?>" placeholder="标题"></div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>专题目录</label></div>
                <div class="ant-col-14 item-input">
                    <div class="ant-col-6">
                        <input class="ant-input ant-input-lg directory-input" type="text" name="directory" value="<?php echo $stu['directory'];?>" placeholder="用于页面 url">
                    </div>
                </div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>页面类型</label></div>
                <div class="ant-col-14 item-input">
                    <div class="ant-radio-group">
                        <label class="ant-radio-wrapper"><span class="ant-radio<?php echo ($stu['type'] == 'PC 端')? ' ant-radio-checked':'';?>"><input type="radio" class="ant-radio-input" name="type" value="PC 端"<?php echo ($stu['type'] == "PC 端")? "checked":"";?>><span class="ant-radio-inner"></span></span><span>PC 端</span></label>
                        <label class="ant-radio-wrapper"><span class="ant-radio<?php echo ($stu['type'] == '移动端')? ' ant-radio-checked':'';?>"><input type="radio" class="ant-radio-input" name="type" value="移动端"<?php echo ($stu['type'] == "移动端")? "checked":"";?>><span class="ant-radio-inner"></span></span><span>移动端</span></label>
                    </div>
                </div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>原型 URL</label></div>
                <div class="ant-col-14 item-input"><input class="ant-input ant-input-lg proto-input" type="text" value="<?php echo $stu['proto_url'];?>" placeholder="http://sem.test.zmnedu.com 自动生成" disabled><input class="f-dn proto-input" type="hidden" name="proto_url" value="<?php echo $stu['proto_url'];?>"></div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>需求提交人</label></div>
                <div class="ant-col-14 item-input">
                    <div class="ant-col-8">
                        <select class="ant-input ant-input-lg" name="sponsor">
                            <option value="-" <?php echo ($stu['sponsor'] == "0")? "selected":"";?>>请选择</option>
                            <option value="宋凯悦" <?php echo ($stu['sponsor'] == "宋凯悦")? "selected":"";?>>宋凯悦</option>
                            <option value="卢婷婷" <?php echo ($stu['sponsor'] == "卢婷婷")? "selected":"";?>>卢婷婷</option>
                            <option value="侯玉竹" <?php echo ($stu['sponsor'] == "侯玉竹")? "selected":"";?>>侯玉竹</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>时间</label></div>
                <div class="ant-col-14 item-input">
                    <div class="ant-col-10 f-mrn">
                        <span class="ant-input-preSuffix-wrapper"><input type="text" class="ant-input ant-input-lg" name="time_start" onclick="WdatePicker()" value="<?php echo $stu['time_start'];?>" placeholder="开始时间"><span class="ant-input-suffix"><i class="anticon anticon-calendar"></i></span></span>
                    </div>
                    <div class="ant-col-10">
                        <span class="ant-input-preSuffix-wrapper"><input type="text" class="ant-input ant-input-lg" name="time_end" onclick="WdatePicker()" value="<?php echo $stu['time_end'];?>" placeholder="预完成时间"><span class="ant-input-suffix"><i class="anticon anticon-calendar"></i></span></span>
                    </div>
                </div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>实际完成时间</label></div>
                <div class="ant-col-14 item-input">
                    <div class="ant-col-10 f-mrn">
                        <span class="ant-input-preSuffix-wrapper"><input type="text" class="ant-input ant-input-lg" name="time_finish" onclick="WdatePicker()" value="<?php echo $stu['time_finish'];?>" placeholder="开始时间"><span class="ant-input-suffix"><i class="anticon anticon-calendar"></i></span></span>
                    </div>
                </div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>进度</label></div>
                <div class="ant-col-14 item-input">
                    <div class="ant-radio-group">
                        <label class="ant-radio-wrapper"><span class="ant-radio<?php echo ($stu['progress'] == '设计')? ' ant-radio-checked':'';?>"><input type="radio" class="ant-radio-input" name="progress" value="设计" <?php echo ($stu['progress'] == "设计")? "checked":"";?>><span class="ant-radio-inner"></span></span><span>设计</span></label>
                        <label class="ant-radio-wrapper"><span class="ant-radio<?php echo ($stu['progress'] == '前端')? ' ant-radio-checked':'';?>"><input type="radio" class="ant-radio-input" name="progress" value="前端" <?php echo ($stu['progress'] == "前端")? "checked":"";?>><span class="ant-radio-inner"></span></span><span>前端</span></label>
                        <label class="ant-radio-wrapper"><span class="ant-radio<?php echo ($stu['progress'] == '上线')? ' ant-radio-checked':'';?>"><input type="radio" class="ant-radio-input" name="progress" value="上线" <?php echo ($stu['progress'] == "上线")? "checked":"";?>><span class="ant-radio-inner"></span></span><span>上线</span></label>
                    </div>
                </div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>页面 URL</label></div>
                <div class="ant-col-14 item-input"><input class="ant-input ant-input-lg" type="text" name="page_url" value="<?php echo $stu['page_url'];?>" placeholder="页面上线地址"></div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>设计</label></div>
                <div class="ant-col-14 item-input">
                    <div class="ant-col-8">
                        <select class="ant-input ant-input-lg" name="designer">
                            <option value="-" <?php echo ($stu['designer'] == "0")? "selected":"";?>>请选择</option>
                            <option value="李亚男" <?php echo ($stu['designer'] == "李亚男")? "selected":"";?>>李亚男</option>
                            <option value="王文静" <?php echo ($stu['designer'] == "王文静")? "selected":"";?>>王文静</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-item">
                <div class="ant-col-6 item-label"><label>前端</label></div>
                <div class="ant-col-14 item-input">
                    <div class="ant-col-8">
                        <select class="ant-input ant-input-lg" name="coder">
                            <option value="-" <?php echo ($stu['coder'] == "0")? "selected":"";?>>请选择</option>
                            <option value="徐振瑜" <?php echo ($stu['coder'] == "徐振瑜")? "selected":"";?>>徐振瑜</option>
                            <option value="冯月钗" <?php echo ($stu['coder'] == "冯月钗")? "selected":"";?>>冯月钗</option>
                            <option value="周飞" <?php echo ($stu['coder'] == "周飞")? "selected":"";?>>周飞</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-ft f-tac">
                <button type="submit" class="u-btn u-btn-primary u-btn-lg"><span>更新</span></button>
                <a class="u-btn u-btn-lg" href="index.php"><span>取消</span></a>
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
<script src="My97DatePicker/WdatePicker.js"></script>
<script src="js/app.js"></script>
<script>
$(".proto-input").val("http://sem.test.zmnedu.com/proto/" + $(".directory-input").val());
$(".directory-input").change(function() {
    $(".proto-input").val("http://sem.test.zmnedu.com/proto/" + $(this).val());
});
</script>
</body>
</html>
