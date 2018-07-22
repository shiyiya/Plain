<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
  ?>
    <div>
        <div class="error-page center">
            <h2 class="post-title">404 - <?php _e('页面没找到'); ?></h2>
            <p><?php _e('你来到了没有知识的荒原，试试搜索吧！<br/>你想查看的页面已被转移或删除了，要不你可以搜索一下...'); ?></p>
            <form method="post">
                <p><input type="text" placeholder="在这输入你先要找到关键字" name="s" autocomplete="off"/></p>
                <input type="submit" value="搜索" />
            </form>
        </div>
    </div><!-- end #content-->
	<?php $this->need('footer.php'); ?>
