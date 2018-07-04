<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 
/**
 * About 关于
 * 
 * @package custom
 */
$this->need('header.php'); ?>

<div id="main" role="main">
    <article class="post typo">
        <h1 class="post-title" ><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <p>
        <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
        我发表了<?php $stat->publishedPostsNum() ?>篇文章，有<?php $stat->publishedCommentsNum() ?>条评论。
        </p>
        <div class="post-content">
            <?php  $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div>

<?php $this->need('footer.php'); ?>
