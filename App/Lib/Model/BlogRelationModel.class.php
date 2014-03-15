<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 14-3-6
 * Time: 下午4:04
 * 关联模型
 */
class BlogRelationModel extends RelationModel{
    protected $tableName = 'blog';
    protected $_link = array(
        'attr' =>array(
            'mapping_type'=>MANY_TO_MANY,//多对多的关系
            'mapping_name'=>'attr',
            'foreign_key'=>'bid',
            'relation_foreign_key'=>'aid',
            'relation_table'=>'bl_blog_attr',
        ),
        'cate'=>array(
            //'mapping_type'=>HAS_MANY,//一对多
            'mapping_type'=>BELONGS_TO,//多对一
            'foreign_key'=>'cid',
            'mapping_fields'=>'name',
            'as_fields'=>'name:cate',
        )
    );

    /**
     * 取得博文列表
     * @param int $type:看是否删除，0为没删，1为删
     */
    public function getBlog($type=0){
        $field = array('del');//不读取del字段
        $where = array('del'=>$type);
        return $this->field($field,true)->where($where)->relation(true)->select();
    }
}