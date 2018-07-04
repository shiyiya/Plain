<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 
/**
 * Recent归档
 * 
 * @package custom
 */
$this->need('header.php'); ?>

<div id="main" role="main">
    <article class="post typo">
        <h1 class="post-title" ><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <ul class="all-post">
        <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
        <li>文章总数：<?php $stat->publishedPostsNum() ?>篇</li>
        <li>分类总数：<?php $stat->categoriesNum() ?>个</li>
        <li>评论总数：<?php $stat->publishedCommentsNum() ?>条</li>
        <li>页面总数：<?php $stat->publishedPagesNum() ?>个</li>
        </ul>
        <div class="post-content">
            <?php $this->widget('Widget_Contents_Post_Recent','pageSize=10000')->parse('<li class="post-item">{year}-{month}-{day}:<a href="{permalink}">{title}</a></li>'); ?>
        </div>
    </article>
</div>

<?php $this->need('footer.php'); ?>
