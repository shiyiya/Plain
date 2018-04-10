<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" role="main">
    <article class="post">
        <h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <ul class="post-meta">
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
            <li>浏览量：<?php if(isset($this->fields->viewsNum)){ $this->fields->viewsNum(); } ?></li>
        </ul>
        <div class="post-content">
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="tags"><?php _e(''); ?><?php $this->tags(', ', true, ''); ?></p>
    </article>
    <ul class="post-near">
        <li class="left">上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li class="right">下一篇: <?php $this->theNext('%s','没有了'); ?></li>
        <li class="clearfix"></li>
    </ul>
    <?php $this->need('comments.php'); ?>

    
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
