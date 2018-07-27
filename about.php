<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 
/**
 * About 关于
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
        <p>
            <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
            <?php _e('我发表了'); $stat->publishedPostsNum(); _e('篇文章，有'); $stat->publishedCommentsNum(); _e('条评论。'); ?>
        </p>
        <div class="post-content markdown-body">
            <?php  $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div>

<?php $this->need('footer.php'); ?>