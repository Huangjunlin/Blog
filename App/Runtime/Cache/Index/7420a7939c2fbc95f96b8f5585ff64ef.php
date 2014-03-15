<?php if (!defined('THINK_PATH')) exit();?>    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="keywords" content="个人博客" />
    <meta name="description" content="个人博客" />
    <meta name="author" content="junlinhuang" />
    <meta name="copyright" content="JUNLINHUANG" />
    <link rel="shortcut icon" href="__PUBLIC__/Images/logo.ico" type="image/x-icon"/>
    <title>My Blog</title>
    <link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
    <script type="text/JavaScript" src='__PUBLIC__/Js/jquery-1.7.2.min.js'></script>
    <script type="text/JavaScript" src='__PUBLIC__/Js/common.js'></script>
    <link rel="stylesheet" href="__PUBLIC__/Css/list.css" />
    </head>
<body>
<!--头部-->
<div class='top-search-wrap'>
    <div class='top-search'>
        <a href="http://www.dianzihuo.com" target='_blank' id='logo'>
                <img src="__PUBLIC__/Images/logo.png"/>

        </a>
        <!-- <p style="color: white; margin-top: 20px;">我不是大牛，但总将会成为大牛!</p> -->
   
    </div>
</div>
<!--
<?php import('Class.Category',APP_PATH); $cate = M('cate')->order('sort')->select(); $cate = Category::unlimitedForlayout($cate); ?>-->
<div class='top-nav-wrap'>
    <ul class='nav-lv1'>
        <li class='nav-lv1-li'>
            <a href="__GROUP__" class='top-cate'>博客首页</a>
        </li>

        <?php
 $_nav_cate =M('cate')->order("sort ASC")->limit()->select(); import('Class.Category',APP_PATH); $_nav_cate = Category::unlimitedForlayout($_nav_cate); foreach($_nav_cate as $_nav_cate_v): extract($_nav_cate_v); $url = U('/c_'.$id); ?><li class='nav-lv1-li'>
                <a href="<?php echo ($url); ?>" class='top-cate'><?php echo ($name); ?></a>
                <?php if(child): ?><ul>
                        <?php if(is_array($child)): foreach($child as $key=>$val): ?><li><a href="<?php echo U('/c_'.$val['id']);?>"><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; ?>
                    </ul><?php endif; ?>
            </li><?php endforeach; ?>

        <!--<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><li class='nav-lv1-li'>
                <a href="" class='top-cate'><?php echo ($v["name"]); ?></a>
                <?php if($v['child']): ?><ul>
                        <?php if(is_array($v["child"])): foreach($v["child"] as $key=>$val): ?><li><a href=""><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; ?>
                    </ul><?php endif; ?>
            </li><?php endforeach; endif; ?>-->
    </ul>
</div>
<!--主体-->
	<div class='main'>
		<div class='main-left'>
			<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><dl>
				<dt><?php echo ($v["name"]); ?></dt>
				<dd class='channel'><?php echo ($v["title"]); ?></dd>
				<dd class='info'>
					<span class='time'><?php echo (date('Y年m月d日 H:i:s',$v["time"])); ?></span>
					<span class='click'>点击：<?php echo ($v["click"]); ?></span>
				</dd>
				<dd class='content'><?php echo ($v["summary"]); ?></dd>
				<dd class='read'>
					<a href="<?php echo U('/'.$v['id']);?>" target='_blank'>阅读全文>></a>
				</dd>
			</dl><?php endforeach; endif; ?>
			<p><?php echo ($page); ?></p>
		</div>
	    <!--主体右侧-->
<div class='main-right'>

    <?php echo W('Hot');?>

    <?php echo W('New');?>
    
</div>
	</div>
        <!--底部-->
<div class='bottom'>
    <div>This is MyBlog ! Welcome To Here. Thank You</div>
</div>
</body>
</html>