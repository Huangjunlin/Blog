<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 14-3-7
 * Time: 下午4:42
 */
class ListAction extends Action{

    public function index(){
        import('Class.Category',APP_PATH);
        import('ORG.Util.Page');
        $id = (int)$_GET['id'];
        $cate = M('cate')->order('sort')->select();
        $cids = Category::getChildId($cate,$id);
        $cids[] = $id;
        $where = array('cid'=>array('IN',$cids));
        //查询总共有多少条
        $count = M('blog')->where($where)->count();
        //每页显示多少条
        $page = new Page($count,10);
        $limit = $page->firstRow.','.$page->listRows;
        $this->blog = D('BlogView')->getAll($where,$limit);
        $this->page = $page->show();
        $this->display();
    }
}