<?php
    include_once 'system.inc.php'; // 链接数据库
    session_start();
?>
<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>网页排期</title>
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
    <div class="ant-table-wrapper f-mbv">
        <div class="ant-table ant-table-small ant-table-bordered">
            <div class="ant-table-title f-cb">
                <h2 class="f-fl">2017年</h2>
                <a class="u-btn u-btn-primary f-fr" href="add.php"><span>新增专题</span></a>
            </div>
            <div class="ant-table-content">
                <div class="ant-table-body">
                    <table>
                        <colgroup><col><col><col><col><col><col><col><col><col></colgroup>
                        <thead class="ant-table-thead">
                            <tr>
                                <th><span>序号</span></th>
                                <th><span>专题 Title / <em>需求提交时间</em></span></th>
                                <th><span>需求提交人</span></th>
                                <th><span>开始时间</span></th>
                                <th><span>预完成时间</span></th>
                                <th><span>进度 / <em>实际完成时间</em></span></th>
                                <th><span>设计 / 前端</span></th>
                                <th><span>操作</span></th>
                            </tr>
                        </thead>
                        <tbody class="ant-table-tbody">
                            <?php
                                // 执行sql
                                $sql_select = "select * from page_info ORDER BY id DESC";
                                $res = $conn->query($sql_select);
                                $num = $res->rowCount();
                                $count = $res->rowCount();
                                // data 解析
                                foreach ( $conn->query($sql_select) as $row) {
                                    echo "<tr class='ant-table-row'>
                                <td>{$num}</td>
                                <td>";
                                if($row['state'] == "紧急") {
                                    echo "<div class='ant-tag ant-tag-red-inverse'><span class='ant-tag-text'>紧急</span></div>";
                                } else if($row['state'] == "延后") {
                                    echo "<div class='ant-tag ant-tag-orange-inverse'><span class='ant-tag-text'>延后</span></div>";
                                }
                                echo "{$row["category"]}《<a href='{$row["proto_url"]}'>{$row["title"]}</a>》/ <em>{$row["time_submit"]}</em></td>
                                <td>{$row["sponsor"]}</td>
                                <td>{$row["time_start"]}</td>
                                <td>{$row["time_end"]}</td>
                                <td><a href='javascript:void(0);'>{$row["progress"]}已完成</a> / <em>{$row["time_finish"]}</em></td>
                                <td>{$row["designer"]} / {$row["coder"]}</td>
                                <td>";
                                    if($row['progress'] == "上线") {
                                        echo "<a href='{$row["page_url"]}'>访问</a> ";
                                    }
                                    if (isset($_SESSION['log']) || $_SESSION['log'] == true) {
                                        echo "<a href='edit.php?id={$row["id"]}'>编辑</a> ";
                                        echo "<a href='javascript:void(0);' onclick='doDel({$row["id"]})'>删除</a>";
                                    }
                            echo "</td>
                            </tr>";
                                    $num--;
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="ant-table-footer">共 <?php echo $count ?> 个专题</div>
            </div>
        </div>
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
<script>
// 删除操作
function doDel(id) {
    if(confirm('确认删除?')) {
        window.location='action.php?action=del&id='+id;
    }
}
</script>
</body>
</html>
