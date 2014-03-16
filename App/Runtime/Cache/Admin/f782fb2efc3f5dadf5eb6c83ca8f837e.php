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
            <th>标题</th>
            <th>所属分类</th>
            <th>点击次数</th>
            <th>时间</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr>
                <td width="10%"><?php echo ($v["id"]); ?></td>
                <td width="30%">
                    <?php echo ($v["title"]); ?>
                    <?php if(is_array($v["attr"])): foreach($v["attr"] as $key=>$value): ?><strong style="color:<?php echo ($value["color"]); ?>">[<?php echo ($value["name"]); ?>]</strong><?php endforeach; endif; ?>
                </td>
                <td><?php echo ($v["cate"]); ?></td>
                <td width="10%"><?php echo ($v["click"]); ?></td>
                <td width="20%"><?php echo (date('Y-m-d H:i',$v["time"])); ?></td>
                <td>
                    <?php if(ACTION_NAME == 'index'): ?>[<a href="<?php echo U(GROUP_NAME.'/Blog/editBlog',array('id'=>$v['id']));?>">修改</a>]
                        [<a href="<?php echo U(GROUP_NAME.'/Blog/toJunk',array('id'=>$v['id'],'type'=>1));?>">删除</a>]
                    <?php else: ?>
                        [<a href="<?php echo U(GROUP_NAME.'/Blog/toJunk',array('id'=>$v['id'],'type'=>0));?>">还原</a>]
                        [<a href="<?php echo U(GROUP_NAME.'/Blog/delete',array('id'=>$v['id']));?>">彻底删除</a>]<?php endif; ?>
                </td>
            </tr><?php endforeach; endif; ?>

    </table>
    <?php if(ACTION_NAME == 'junk'): ?>[<a href="<?php echo U(GROUP_NAME.'/Blog/deleteAll');?>" style="color: red;margin: 10px;">清空回收站</a>]<?php endif; ?>
</body>
</html>