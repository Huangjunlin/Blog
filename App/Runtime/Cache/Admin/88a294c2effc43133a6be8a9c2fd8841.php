<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Welcome To My Blog</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="__PUBLIC__Css/public.css"/>
</head>
<body>
    <form action="<?php echo U(GROUP_NAME.'/Attribute/runAddAttr');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="2">添加博文属性</th>
            </tr>
            <tr>
                <td align="right">属性名称:</td>
                <td>
                    <input type="text" name="name"/>
                </td>
            </tr>
            <tr>
                <td align="right">标题颜色:</td>
                <td>
                    <input type="text" name="color"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="保存添加"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>