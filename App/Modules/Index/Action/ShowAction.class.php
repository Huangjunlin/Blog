<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 14-3-7
 * Time: 下午4:42
 */
class ShowAction extends Action{

    public function index(){
     	$id = $_GET['id'];
     	
     	$where = array('id'=>$id);
     	$field = array('id','title','time','content','cid');
     	$this-> blog = M('blog')->field($field)->where($where)->find();

     	$cid = $this->blog['cid'];
     	import('Class.Category',APP_PATH);
     	$cate = M('cate')->order('sort')->select();
     	$this->parent = Category::getParents($cate,$cid);

     	
        $this->display();
    }

    public function clickNum(){
    	$id = (int)$_GET['id'];
    	$where = array('id'=>$id);
     	$click = M('blog')->where($where)->getField('click');
    	//点击次数自增
     	M('blog')->where(array('id'=>$id))->setInc('click');
     	echo 'document.write('.$click.')';
    }
}