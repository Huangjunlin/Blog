<?php

/**
 * Class IndexAction
 *后台首页控制器
 */
class IndexAction extends CommonAction{

    //首页视图
    public function index(){
        $this->display('index');
    }

    //退出
    public function loginOut(){
        session_unset();
        session_destroy();
        $this->redirect(GROUP_NAME.'/Login/index');
    }

}