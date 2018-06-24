<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" role="main">
    <article class="post">
        <ul class="post-meta">
            <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
           <!--  <li><?php _e(' • '); ?><?php $this->category('&'); ?></li> -->
            <li><?php _e(' • PV：'); ?><?php if(isset($this->fields->viewsNum)){ $this->fields->viewsNum(); } ?></li>
            <li><?php _e(' • Edited：'); ?><time datetime="<?php $this->date('c'); ?>"><?php echo date('Y-m-d' , $this->modified); ?></time></li>
        </ul>
        <div class="post-content">
            <?php  $this->content(); ?>
        </div>
        <?php if($this->tags): ?>
            <div itemprop="keywords" class="tags"><?php _e(''); ?><?php $this->tags(' , ', true, ''); ?></>
        <?php endif; ?>
    </article>
    <ul class="post-near clearfix">
        <li class="previous">« <?php $this->thePrev('%s','没有了'); ?></li>
        <li class="next"><?php $this->theNext('%s','没有了'); ?> »</li>
    </ul>
    <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
