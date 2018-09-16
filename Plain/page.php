<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

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
        <div class="post-content markdown-body">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div>

<?php $this->need('footer.php'); ?>