<?php

/**
 * 思于心现于形，极简主题，专注于创作。
 *
 * @package Plain
 * @author  ShiYi,ikirby
 *
 * @version 1.2.4
 * @link https://www.runtua.cn/
 * @link https://ikirby.me/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<style>
	#pjax {
		margin: 120px auto;
	}
</style>

<div id="main" role="main">
	<div class="content">
		<article class="post">
			<ul class="post-list">
				<?php while ($this->next()) : ?>
					<section class="post-item">
						<a href="<?php $this->permalink(); ?>" title="<?php $this->title(); ?>">
							<?php $this->title() ?>
						</a>
						<span class="post-meta">
							<?php _e('/'); ?>
							<time datetime="<?php $this->date('c'); ?>">
								<?php $this->date(); ?>
							</time>
						</span>
					</section>
				<?php endwhile; ?>
			</ul>
		</article>
		<?php $this->pageNav('&laquo; ', ' &raquo;'); ?>
	</div>
</div>
<?php $this->need('footer.php'); ?>