<?php
/**
 * 极简主题，专注创作。
 * 
 * @package Plain
 * @author  ShiYi,ikirby
 * 
 * @version 1.2
 * @link https://www.runtua.cn
 * @UIlink https://ikirby.me/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
 <div id="main" role="main">
 <div class="content">
	 <article class="post">
	 <ul class="post-list">
	<?php while($this->next()): ?>
			<section class="post-item">
				<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
				<span class="post-meta">
				/
				<time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time>
				</span>
			</section>
	<?php endwhile; ?>
	</ul>
	</sec>
	<?php $this->pageNav('&laquo; ', ' &raquo;'); ?>
</div>
</div>
<?php $this->need('footer.php'); ?>

