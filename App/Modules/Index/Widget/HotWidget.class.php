<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 14-3-8
 * Time: 下午10:59
 * 使用weiget工具完成自定义标签
 */
class HotWidget extends Widget{

    /**
     * 渲染输出 render方法是Widget唯一的接口
     * 使用字符串返回 不能有任何输出
     * @access public
     * @param mixed $data 要渲染的数据
     * @return string
     */
    public function render($data){
        //只要显示某些字段
        $field = array('id','title','click');
        $data['blog'] = M('blog')->field($field)->order('click DESC')->limit(5)->select();
        return $this->renderFile('',$data);

    }
}