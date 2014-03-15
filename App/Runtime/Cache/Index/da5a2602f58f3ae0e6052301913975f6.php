<?php if (!defined('THINK_PATH')) exit();?><dl>
    <dt>热门博文</dt>
    <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><dd>
            <a href="<?php echo U('/'.$v['id']);?>" target="_blank"><?php echo ($v["title"]); ?></a>
            <span>(<?php echo ($v["click"]); ?>)</span>
        </dd><?php endforeach; endif; ?>
   <!-- <dd>
        <a href="">对象的产生与生命周期</a>
        <span>(1024)</span>
    </dd>-->
</dl>