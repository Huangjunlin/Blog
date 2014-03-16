<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Welcome To My Blog</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <link rel="stylesheet" href="__PUBLIC__Css/public.css"/>
</head>
<body>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>属性名称</th>
            <th>颜色</th>
            <th>操作</th>
        </tr>

        <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><tr>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["name"]); ?></td>
                <td>
                    <div style="width: 20px;height: 20px;background:<?php echo ($v["color"]); ?>"></div>
                </td>
                <td>
                    [<a href="">修改</a>]
                    [<a href="">删除</a>]
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
</body>
</html>