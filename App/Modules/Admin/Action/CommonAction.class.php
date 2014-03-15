<?php
/**
 * Created by PhpStorm.
 * User: Huang
 * Date: 14-3-1
 * Time: 下午3:21
 * 公共类，让其他继承
 * 用于防止通过url直接介入后台
 */
class CommonAction extends Action{
    //这是自动运行的方法
    public function _initialize(){
        if(!isset($_SESSION['uid']) || !isset($_SESSION['username'])){
            $this->redirect(GROUP_NAME.'/Login/index');
        }
    }
}