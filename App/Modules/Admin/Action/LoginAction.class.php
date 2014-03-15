<?php
/**
 * User: Huang
 * Date: 14-2-28
 * Time: 下午1:49
 * 登录控制器
 */
class LoginAction extends Action{

    //登录页面
    public function index(){
        $this->display('login');
    }


    public function login(){
        //p($_POST);
        //echo $_SESSION['verify'].'<br/>';
        //echo I('post.code','','md5');
        //判读是否以post提交的方式登入，防止以地址栏非法登入
        if(!IS_POST){
            _404("页面不存在",U('index'));
        }
        //检查验证码是否正确，区分大小写
        if(I('post.code','','md5')!=$_SESSION['verify']){
            $this->error('验证码错误');
        }
        //取得用户名密码
        $username = I('username');
        $pwd = I('password','','md5');

        $user = M('user')->where(array('username'=>$username))->find();
        if(!$user || $pwd!=$user['password']){
            $this->error('密码错误');
        }

        $data = array(
            'id'=>$user['id'],
            'logintime'=>time(),
            'loginip'=>get_client_ip(),
        );
       // p($data);
        //将信息存入数据库，可以记录时间
        M('user')->save($data);
        //写入session
        session('uid',$user['id']);
        session('username',$user['username']);
        session('logintime',date('Y-m-d H:i:s',$user['logintime']));
        session('loginip',$user['loginip']);
        //p($_SESSION);
        //页面重定向
        $this->redirect(GROUP_NAME.'/Index/index');
    }

    //显示验证码
    public function verify(){
        //引入验证码类
        import('ORG.Util.Image');
        Image::buildImageVerify(4,3,'png',80,35);
    }
}