<?php
class IndexAction extends Action {

    public function index(){
    	//如果没有缓存数据，则去数据库中查
    	if(!$topCate = S('index_cate')){
    		import('Class.Category',APP_PATH);
	    	$topCate = M('cate')->where(array('pid'=>0))->order('sort')->select();
	    	$cate = M('cate')->order('sort')->select();
	    	$db = M('blog');
	    	$field = array('id','title','time');
	    	foreach ($topCate as $k => $v) {
	    		$cids = Category::getChildId($cate,$v['id']);
	    		$cids[] = $v['id'];
	    		$where = array('cid'=>array('IN',$cids));
	    		$topCate[$k]['blogs'] = $db->field($field)->where($where)->order('time DESC')->select();
	    		
	    	}
    	}
    	//添加缓存
    	S('index_cate',$topCate,1);
    	$this->cates=$topCate;
    	 // p($this->cates);
        $this->display();
    }


}