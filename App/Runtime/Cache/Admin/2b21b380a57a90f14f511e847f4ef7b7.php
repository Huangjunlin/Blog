<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>添加分类</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <!--<link rel="stylesheet" type="text/css" href="__PUBLIC__Css/public.css"/>-->
    <link rel="stylesheet" href="__PUBLIC__Css/public.css" />
</head>
<body>
    <form action="<?php echo U(GROUP_NAME.'/Category/runAddCate');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="2">添加栏目分类</th>
            </tr>
            <tr>
                <td align="right">分类栏目名称</td>
                <td>
                    <input type="text" name="name"/>
                </td>
            </tr>
            <tr>
                <td align="right">排序：</td>
                <td>
                    <input type="text" name="sort" value="100"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="hidden" name="pid" value="<?php echo ($pid); ?>"/>
                    <input type="submit" value="保存添加"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>