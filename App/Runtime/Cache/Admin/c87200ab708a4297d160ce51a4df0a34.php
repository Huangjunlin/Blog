<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Welcome To My Blog</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <link rel="stylesheet" href="__PUBLIC__Css/public.css"/>
    <script type="text/javascript">
        window.UEDITOR_HOME_URL = '__ROOT__/Data/ueditor/';

        window.onload = function(){
            window.UEDITOR_CONFIG.initialFrameWidth=1115;
            window.UEDITOR_CONFIG.initialFrameHeight=400;
            //修改图片上传地址
//            var URL ='<?php echo U(GROUP_NAME."/Blog/upload");?>';
//            var URL ='localhost/Blog/Data/ueditor/php/imageUp.php';
//           window.UEDITOR_CONFIG.imageUrl=URL;
//            window.UEDITOR_CONFIG.imagePath=URL + "php/";
            UE.getEditor('content');
        }
    </script>
    <script src="__ROOT__/Data/ueditor/ueditor.config.js"></script>
    <script src="__ROOT__/Data/ueditor/ueditor.all.min.js"></script>
</head>
<body>
    <form action="<?php echo U(GROUP_NAME.'/Blog/runAddBlog');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="2">博文发布</th>
            </tr>
            <tr>
                <td align="right">所属分类:</td>
                <td>
                    <select name="cid">
                        <option value="">===请选择分类===</option>
                        <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">博文属性:</td>
                <td>
                    <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><label style="margin-right: 10px">
                            <input type="checkbox" name="aid[]" value="<?php echo ($v["id"]); ?>" />&nbsp;<?php echo ($v["name"]); ?>
                        </label><?php endforeach; endif; ?>
                </td>
            </tr>
            <tr>
                <td align="right">点击次数</td>
                <td>
                    <input type="text" name="click"/>
                </td>
            </tr>
            <tr>
                <td align="right">标题:</td>
                <td>
                    <input type="text" name="title"/>
                </td>
            </tr>
            <tr>
            <tr>
                <td align="right">摘要:</td>
                <td>
                    <input type="text" name="summary"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea name="content" id="content"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="添加提交"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>