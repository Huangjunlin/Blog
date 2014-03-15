<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 14-3-4
 * Time: 下午3:24
 * 博文处理类
 */
class BlogAction extends CommonAction{

    //博文列表
    public function index(){
        $this->blog = D('BlogRelation')->getBlog();
        $this->display();
    }

    //添加博文
    public function addBlog(){
        //所属分类
        import('Class.Category',APP_PATH);
        $cate = M('cate')->order('sort')->select();
        $this->cate = Category::unlimitedForLevel($cate);
        //博文属性
        $this->attr = M('attr')->select();
        $this->display();
    }

    //删除到垃圾站/还原
    public function toJunk(){
        $type = (int)$_GET['type'];
        $msg = $type ? '删除' : '还原';
        $update = array(
            'id'=>(int)$_GET['id'],
            'del'=>$type,
        );
        if(M('blog')->save($update)){
            $this->success('博文已'.$msg,U(GROUP_NAME.'/Blog/index'));
        }else{
            $this->error($msg.'失败');
        }
    }

    //垃圾站
    public function junk(){
        $this->blog = D('BlogRelation')->getBlog(1);
        $this->display('index');
    }

    //彻底删除博文
    public function delete(){
        $id = $_GET['id'];
        if(M('blog')->delete($id)){
            //删除中间表
            M('blog_attr')->where(array('bid'=>$id))->delete();
            $this->success('删除成功',U(GROUP_NAME.'/Blog/junk'));
        }else{
            $this->error('删除失败');
        }
    }

    //清空回收站
    public function deleteAll(){
        $blog = D('BlogRelation')->getBlog(1);
        foreach($blog as $v){
            $id = $v['id'];
            $data = M('blog')->delete($id);
        }
        if(!empty($data)){
            $this->success('全部删除成功',U(GROUP_NAME.'/Blog/junk'));
        }else{
            $this->error('删除失败');
        }
    }

    //添加博文表单处理
    public function runAddBlog(){
        //D('BlogRelation');因框架多对多关联有问题，暂时不用吗,
        $data = array(
            'title'=>$_POST['title'],
            'content'=>$_POST['content'],
            'summary'=>$_POST['summary'],
            'time'=>time(),
            'click'=>(int)$_POST['click'],
            'cid'=>(int)$_POST['cid']
        );
        if($bid = M('blog')->add($data)){
            if(isset($_POST['aid'])){
                $sql = 'INSERT INTO `'.C('DB_PREFIX').'blog_attr`(bid,aid)VALUES';
                foreach($_POST['aid'] as $v){
                    $sql.='('.$bid.','.$v.'),';
                }
                $sql = rtrim($sql,',');
                M('bl_blog_attr')->query($sql);
            }
            $this->success('添加成功',U(GROUP_NAME.'/Blog/index'));
        }else{
            $this->error('添加失败');
        }
        //$this->display();
    }

    //修改ueditor上传路径
    public function upload(){
   /*     import('ORG.Net.UploadFile');
        $upload = new UploadFile();
        $upload->autoSub = true;
        $upload->subType='date';
        $upload->dateFormat='Ym';
        if($upload->upload('./Uploads/')){
            $info = $upload->getUploadFileInfo();
            p($info);
            echo json_encode(array(
                "url" => $this->fullName ,
                "size" => $this->fileSize ,
                "type" => $this->fileType ,
                "state" => $this->stateInfo
            ));
        }
        $title = htmlspecialchars($_POST['pictitle'],ENT_QUOTES);*/
    }

}