<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="<?php $this->options->charset(); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Cache-Control" content="no-transform " />
    <meta http-equiv="Cache-Control" content="no-siteapp" /> 
    <meta name="Baiduspider" content="noarchive">
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="keywords" content="<?php $this->keywords() ?>" />
    <?php $this->header('keywords=&generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&atom='); ?>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php $this->title() ?>" />
    <meta property="og:url" content="<?php $this->permalink() ?>" />
    <meta property="og:site_name" content="<?php $this->options->title() ?>" />
    <meta property="og:description" content=" <?php $this->description() ?>" />
	<link rel="icon" href="<?php if($this->options->fav()): $this->options->fav(); else: $this->options->themeUrl('./favicon.ico');endif; ?>"/>
    <link rel="manifest" href="<?php $this->options->themeUrl('manifest.json'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('style/style.min.css'); ?>" />
	<?php if(in_array('Prism', $this->options->effect)): ?>
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('prism/prism.min.css'); ?>" />
	<?php endif; ?>
	<script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>
</head>
<body>
<div id="root">
    <div id='pjax'>
    <header id="header">
    <?php if($this->is('post')) :?>
        <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a><?php _e(' /'); ?>
        <h2 class="post-title"><?php $this->title() ?></h2>
    <?php else:?>
        <h1><a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
        <p class="description"><?php $this->options->description() ?></p>
        <nav id="nav-menu" role="navigation">
            <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('Home'); ?></a>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
        <?php endwhile; ?>
    <?php endif; ?>
        </nav>
        <div class="link">
            <?php if ($this->options->twitterLink): ?>
                <a target="_blank" href="<?php $this->options->twitterLink(); ?>"><img alt="twitter-ico" src="<?php $this->options->themeUrl('./images/twitter.png'); ?>"></a>
            <?php endif; ?>
            <?php if ($this->options->GitHubLink): ?>
                <a target="_blank" href="<?php $this->options->GitHubLink(); ?>"><img alt="GitHub-ico" src="<?php $this->options->themeUrl('./images/github.png'); ?>"></a>
            <?php endif; ?>
            <?php if ($this->options->rssLink): ?>
                <a target="_blank" href="<?php $this->options->rssLink(); ?>"><img alt="rss-ico" src="<?php $this->options->themeUrl('./images/rss.png'); ?>"></a>
            <?php endif; ?>
        </div>
    </header>
