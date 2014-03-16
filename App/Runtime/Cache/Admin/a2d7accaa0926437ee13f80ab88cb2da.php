<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>分类列表</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <link href="__PUBLIC__Css/public.css" rel="stylesheet"/>
</head>
<body>
    <form action="<?php echo U(GROUP_NAME.'/Category/sortCate');?>" method="post">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>级别</th>
                <th>排序</th>
                <th>操作</th>
            </tr>

            <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr>
                    <td><?php echo ($v["id"]); ?></td>
                    <td><?php echo ($v["html"]); echo ($v["name"]); ?></td>
                    <td><?php echo ($v["level"]); ?></td>
                    <td>
                        <input type="text" name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["sort"]); ?>"/>
                    </td>
                    <td>
                        [<a href="<?php echo U(GROUP_NAME.'/Category/addCate',array('pid'=>$v['id']));?>">添加子分类</a>]
                        [<a href="">修改</a>]
                        [<a href="">删除</a>]
                    </td>
                </tr><?php endforeach; endif; ?>
            <tr>
                <td colspan="5" align="center">
                    <input type="submit" value="排序"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>