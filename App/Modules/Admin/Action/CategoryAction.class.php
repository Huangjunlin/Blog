<?php

/**
 * Class CategoryAction
 * 分类控制器
 */
class CategoryAction extends CommonAction {

    /**
     * 分类列表视图
     */
    public function index(){
        import('Class.Category',APP_PATH);
        $cate = M('cate')->order('sort ASC')->select();
        $cate =Category::unlimitedForLevel($cate,'&nbsp;&nbsp;---');
//        $cate =Category::unlimitedForlayout($cate);
//        $cate = Category::getParents($cate,6);
//        $cate = Category::getChildId($cate,2);
//        $cate = Category::getChilds($cate,2);
//        p($cate);
//        die();
        //分配列表
        $this->assign('cate',$cate)->display();
    }

    /**
     * 添加分类视图
     */
    public function addCate(){
        $this->pid = I('pid',0,'intval');
        $this->display();
    }

    /**
     * 添加分类表单处理
     */
    public function runAddCate(){
        if(M('cate')->add($_POST)){
            $this->success('添加成功',U(GROUP_NAME.'/Category/index'));
        }else{
            $this->error('添加失败');
        }
    }

    /**
     * 排序处理
     */
    public function sortCate(){
        $db = M('cate');
        foreach($_POST as $id=>$sort ){
            $db->where(array('id'=>$id))->setField('sort',$sort);
        }
        $this->redirect(GROUP_NAME.'/Category/index');
    }
} 