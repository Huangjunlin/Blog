<?php
return array(
	//'配置项'=>'配置值'
    //将__Public__映射到后台的模版目录
    'TMPL_PARSE_STRING'=>array(
        '__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'/Tpl/Public/',
    ),

    //加载自定义配置
    'LOAD_EXT_CONFIG'=>'verify',

    //修改伪静态后缀名，可以将地址显示为任意,asp,htm,ios....
    'URL_HTML_SUFFIX'=>'',
);
?>