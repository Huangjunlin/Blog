<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 14-3-9
 * Time: 上午12:34
 */
class NewWidget extends Widget{


    /**
     * 渲染输出 render方法是Widget唯一的接口
     * 使用字符串返回 不能有任何输出
     * @access public
     * @param mixed $data 要渲染的数据
     * @return string
     */
    public function render($data){
        $field = array('id','title','click');
        $data['blog'] = M('blog')->field($field)->order('time DESC')->limit(5)->select();
        return $this->renderFile('',$data);
    }
}