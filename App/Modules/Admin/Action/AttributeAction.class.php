<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 14-3-4
 * Time: 下午1:50
 * 属性处理类
 */
class AttributeAction extends CommonAction{

    //属性列表
    public function index(){
        $this->attr=M('attr')->select();
        $this->display();
    }

    //添加属性视图
    public function addAttr(){
        $this->display();
    }

    //添加属性表单处理
    public function runAddAttr(){
        //p($_POST);
        if(M('attr')->add($_POST)){
            $this->success('添加成功',U(GROUP_NAME.'/Attribute/index'));
        }else{
            $this->error('添加失败');
        }

    }

}