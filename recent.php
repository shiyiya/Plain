<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 
/**
 * recent
 * 
 * @package custom
 */
$this->need('header.php'); ?>

<div id="main" role="main">
    <article class="post">
        <h1 class="post-title" ><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <div class="post-content">
            <?php $this->widget('Widget_Contents_Post_Recent','pageSize=10000')->parse('<li>{year}-{month}-{day}:<a href="{permalink}">{title}</a></li>'); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
