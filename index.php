<?php
/**
 * 
 * 
 * @package Plain
 * @author  ShiYi
 * 
 * @version last
 * @link https://www.runtua.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
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
<?php $this->need('footer.php'); ?>

