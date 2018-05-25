<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" role="main">
    <article class="post">
        <ul class="post-meta">
            <li><?php _e(''); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
            <li><?php _e(' • '); ?><?php $this->category('&'); ?></li>
            <li><?php _e(' • PV：'); ?><?php if(isset($this->fields->viewsNum)){ $this->fields->viewsNum(); } ?></li>
            <li><?php _e(' • Edited：'); ?><time datetime="<?php $this->date('c'); ?>"><?php echo date('Y-m-d  H:i:s' , $this->modified); ?></time></li>
        </ul>
        <div class="post-content">
            <?php  $this->content(); ?>
        </div>
        <?php if($this->tags): ?>
            <p itemprop="keywords" class="tags"><?php _e(''); ?><?php $this->tags(' , ', true, ''); ?></p>
        <?php endif; ?>
    </article>
    <ul class="post-near">
        <li class="left">« <?php $this->thePrev('%s','没有了'); ?></li>
        <li class="right"><?php $this->theNext('%s','没有了'); ?> »</li>
        <li class="clearfix"></li>
    </ul>
    <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
