<?php
return array(
	//'配置项'=>'配置值'
    //配置分组
    'APP_GROUP_LIST'=>'Index,Admin',
    //配置默认分组
    'DEFAULT_GROUP'=>'Index',
    //指定分组的模式
    'APP_GROUP_MODE'=>'1',
    //自定分组的文件夹
    'APP_GROUP_PATH'=>'Modules',

    //数据库参数
    'DB_HOST'=>'localhost',
    'DB_USER'=>'root',
    'DB_PWD'=>'123123',
    'DB_NAME'=>'blog',
    'DB_PREFIX'=>'bl_',

    //显示调试模式
    // 'SHOW_PAGE_TRACE'=>true,

    //使用URL被重写过的模式，使其在写程序时与地址栏去掉要输入的index.php的显示方式一样,0：原始模式 2：重写过的模式
    'URL_MODEL'=>2,
    //配置URL路由
    'URL_ROUTER_ON'=>true,
    'URL_ROUTE_RULES'=>array(
        '/^c_(\d+)$/'=>'Index/List/index?id=:1',//使用正则表达式来匹配URL
        ':id\d'=>'Index/Show/index',
    ),
);
?>