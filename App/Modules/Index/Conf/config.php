<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 14-3-8
 * Time: 下午2:23
 */
return array(

    //@代表当前项目路径
    'APP_AUTOLOAD_PATH'=>'@.TagLib',
    //定义自己标签库的名称,Cx代表TP的核心标签库，一定要加上
    'TAGLIB_BUILD_IN'=>'Cx,Bl',

    //开启静态缓存
    'HTML_CACHE_ON'=>ture,
    'HTML_CACHE_RULES'=>array(
    		//定义需要缓存的页面, 0：时间为永久
    		'Show:index'=>array('{:module}_{:action}_{id}',0),
    	),

    //动态缓存方式
    //'DATA_CACHE_TYPE'=>'Memcache',//需要装上memcached软件
    //'MEMCACHE_HOST'=>'127.0.0.1',
    //'MEMCACHE_PORT'=>11211,
);