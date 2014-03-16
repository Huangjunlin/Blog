<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="__PUBLIC__Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__Js/index.js"></script>
<link rel="stylesheet" href="__PUBLIC__Css/public.css" />
<link rel="stylesheet" href="__PUBLIC__Css/index.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<base target="iframe"/>
<head>
	<title>后台管理</title>
</head>
<body>
	<div id="top">
		<p>欢迎进入后台管理</p>
		<div class="exit">
			<a href="<?php echo U(GROUP_NAME.'/Index/loginOut');?>" target="_self">退出</a>

		</div>
	</div>
	<div id="left">
		<dl>
			<dt>博文管理</dt>
			<dd><a href="<?php echo U(GROUP_NAME.'/Blog/index');?>">博文列表</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME.'/Blog/addBlog');?>">添加博文</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME.'/Blog/junk');?>">回收站</a></dd>
		</dl>
		<dl>
			<dt>属性管理</dt>
			<dd><a href="<?php echo U(GROUP_NAME.'/Attribute/index');?>">属性列表</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME.'/Attribute/addAttr');?>">添加属性</a></dd>
		</dl>
		<dl>
			<dt>分类管理</dt>
			<dd><a href="<?php echo U(GROUP_NAME.'/Category/index');?>">分类列表</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME.'/Category/addCate');?>">添加分类</a></dd>
		</dl>
	</div>
	<div id="right">
		<iframe name="iframe" src="<?php echo U(GROUP_NAME.'/Blog/index');?>"></iframe>
	</div>

</body>
</html>