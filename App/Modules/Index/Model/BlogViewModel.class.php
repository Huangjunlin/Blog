<?php 
/**
 * 视图模型
 */
class BlogViewModel extends ViewModel{
	
	protected $viewFields = array(
		'blog' => array(
				'id', 'title', 'time', 'click', 'summary',
				'_type' => 'LEFT'//关联下面一个表，指定关联方式
			), 
		'cate'=> array(
				'name','_on'=>'blog.cid=cate.id',//关联条件
			),

		);	

	public function getAll($where,$limit){
		return $this->where($where)->limit($limit)->order('time DESC')->select();
	}
}
?>