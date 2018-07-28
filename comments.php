<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>">
        <span class="comment-author">
            <cite class="fn">
                <?php $comments->author(); ?>:</cite>
        </span>
        <?php $comments->content(); ?>
        <span class="comment-meta">
            <a href="<?php $comments->permalink(); ?>">
                <?php $comments->date('Y-m-d H:i'); ?>
            </a>
            <span class="comment-reply">
                <?php $comments->reply(); ?>
            </span>
        </span>
    </div>
    <?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
    <?php } ?>
</li>
<?php } ?>

<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <h3>
        <?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?>
    </h3>
    <?php $comments->listComments(); ?>
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    <?php endif; ?>
    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
        </div>
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <div class="center">
                <?php if($this->user->hasLogin()): ?>
                <p>
                    <?php _e('欢迎回来: '); ?>
                    <a href="<?php $this->options->profileUrl(); ?>">
                        <?php $this->user->screenName(); ?>
                    </a>.
                    <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">
                        <?php _e('退出'); ?> &raquo;</a>
                </p>
                <?php else: ?>
                <p>
                    <input type="text" name="author" placeholder="name" id="author" class="text" autocomplete value="<?php $this->remember('author'); ?>"
                        required />
                    <input type="email" name="mail" placeholder="e-mail" id="mail" class="text" autocomplete value="<?php $this->remember('mail'); ?>"
                        <?php if ($this->options->commentsRequireMail): ?> required
                    <?php endif; ?> />
                    <input type="url" name="url" placeholder="website" id="url" class="text" autocomplete placeholder="<?php _e('http://'); ?>"
                        value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL): ?> required
                    <?php endif; ?> />
                </p>
                <?php endif; ?>
                <p>
                    <textarea placeholder="Write here···( Support part of markdown syntax. )" rows="8" cols="50" name="text" id="textarea" class="textarea" required><?php $this->remember('text'); ?></textarea>
                </p>
                <p>
                    <input type="submit" class="submit" value="提交" />
                </p>
            </div>
        </form>
    </div>
    <?php else: ?>
    <h3>
        <?php _e('这里好像不能评论···'); ?>
    </h3>
    <?php endif; ?>
</div>