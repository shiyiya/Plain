<?php
/**
 * 极简主题，专注创作。
 * 
 * @package Plain
 * @author  ShiYi,ikirby
 * 
 * @version 1.0
 * @link https://www.runtua.cn
 * @UIlink https://ikirby.me/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
 <div id="main" role="main">
 <div class="content">
	 <article class="post">
	 <ul>
	<?php while($this->next()): ?>
			<li class="post-item">
				<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
				<span class="post-meta">
				/
				<time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time>
				</span>
			</li>
	<?php endwhile; ?>
	</ul>
	</article>
	<?php $this->pageNav('&laquo; 上一页', '下一页 &raquo;'); ?>
</div>
</div>
<?php $this->need('footer.php'); ?>

