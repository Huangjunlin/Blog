<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 14-3-8
 * Time: 下午2:09
 * 自定义标签库
 */
class TagLibBl extends TagLib{

    //自定义标签属性
    protected $tags = array(
        //attr相当于<foreach name=''>的name
        //close=>1时为闭合标签(块标签)<a></a>  close=>0时，为非闭合标签<image/>
        'nav' => array('attr'=>'limit,order','close'=>1),
    );

    /**
     * @param $attr
     * @param $content标签里面的内容，如<nav limit='' order=''><a></a><span></span></nav>里面的<a></a><span></span>
     */
    public function _nav($attr,$content){
        //echo $attr; //打印出字符串 limit="10" order="2"
        //将字符串转换成数组
        $attr = $this->parseXmlAttr($attr);
        $str = <<<str
<?php
    \$_nav_cate =M('cate')->order("{$attr['order']}")->limit({$attr['limit']})->select();
    import('Class.Category',APP_PATH);
    \$_nav_cate = Category::unlimitedForlayout(\$_nav_cate);
    foreach(\$_nav_cate as \$_nav_cate_v):
    //extract — 从数组中将变量导入到当前的符号表
    extract(\$_nav_cate_v);
    //使用TP路由的URL模式
    \$url = U('/c_'.\$id);
?>
str;
        $str.=$content;
        $str.='<?php endforeach; ?>';
        return $str;

    }
}