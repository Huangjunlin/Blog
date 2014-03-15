<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 14-3-3
 * Time: 下午5:52
 * 处理添加子分类后的目录问题
 */
class Category{

    /**
     * @param $cate
     * @param $pid
     * @param int $level ：等级
     * @param string $html ：用于在子分类前面添加---，方便好看
     * 写成静态，方便调用
     * @return array
     * 组合一微数组
     */
    static public function unlimitedForLevel($cate,$html='---',$pid=0,$level=0){
        $arr = array();
        foreach($cate as $v){
            if($v['pid']==$pid){
                $v['level']=$level+1;
                $v['html']=str_repeat($html,$level);
                $arr[]=$v;
                $arr=array_merge($arr,self::unlimitedForLevel($cate,$html,$v['id'],$level+1));
            }
        }
        return $arr;
    }

    /**
     * @param $cate
     * @param string $name
     * @param int $pid
     * @return array
     * 获取子分类
     * 组合多微数组
     */
    static public function unlimitedForlayout($cate,$name='child',$pid=0){
        $arr = array();
        foreach($cate as $v){
            if($v['pid'] == $pid){
                $v[$name] = self::unlimitedForlayout($cate,$name,$v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }

    /**
     * @param $cate
     * @param $id
     * @return array
     * 根据子id获取父类
     */
    static public function getParents($cate,$id){
        $arr = array();
        foreach($cate as $v){
            if($v['id'] == $id){
                $arr[] = $v;
                $arr = array_merge($arr,self::getParents($cate,$v['pid']));
            }
        }
        return $arr;
    }

    /**
     * @param $cate
     * @param $pid
     * @return array
     * 根据父分类ID获取子分类的所有ID
     */
    static public function getChildId($cate,$pid){
        $arr = array();
        foreach($cate as $v){
            if($v['pid'] == $pid){
                $arr[]=$v['id'];
                $arr = array_merge($arr,self::getChildId($cate,$v['id']));
            }
        }
        return $arr;
    }

    /**
     * @param $cate
     * @param $pid
     * @return array
     * 根据父类ID获取全部子分类的信息
     */
    static public function getChilds($cate,$pid){
        $arr = array();
        foreach($cate as $v){
            if($v['pid'] == $pid){
                $arr[] = $v;
                $arr = array_merge($arr,self::getChilds($cate,$v['id']));
            }
        }
        return $arr;
    }
}