<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 
/**
 * Recent归档
 * 
 * @package custom
 */
$this->need('header.php'); ?>

<div id="main" role="main">
    <article class="post">
        <h1 class="post-title" style="display:inline-block">
            <a href="<?php $this->permalink() ?>">
                <?php $this->title() ?>
            </a>
        </h1>
        <?php if ($this->user->hasLogin()):?>
        <a target="_blank" href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid;?>">编辑</a>
        <?php endif;?>
        <ul class="all-post">
            <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
            <li class="post-item">
                <?php _e('文章总数：'); $stat->publishedPostsNum(); _e('篇');?>
            </li>
            <li class="post-item">
                <?php _e('分类总数：'); $stat->categoriesNum(); _e('个'); ?>
            </li>
            <li class="post-item">
                <?php _e('评论总数：'); $stat->publishedCommentsNum(); _e('条'); ?>
            </li>
            <li class="post-item">
                <?php _e('页面总数：'); $stat->publishedPagesNum(); _e('个'); ?>
            </li>
        </ul>
        <div class="post-content markdown-body">
            <?php $this->widget('Widget_Contents_Post_Recent','pageSize=10000')->parse('<li class="post-item">{year}-{month}-{day}:<a href="{permalink}">{title}</a></li>'); ?>
        </div>
    </article>
</div>

<?php $this->need('footer.php'); ?>