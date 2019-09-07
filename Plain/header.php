<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="<?php $this->options->charset(); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="renderer" content="webkit" />

    <title><?php $this->archiveTitle(array(
                'category'  =>  _t('分类 %s 下的文章'),
                'search'    =>  _t('包含关键字 %s 的文章'),
                'tag'       =>  _t('标签 %s 下的文章'),
                'author'    =>  _t('%s 发布的文章')
            ), '', ' - '); ?><?php $this->options->title(); ?>
    </title>

    <?php $this->header('generator=&pingback=&xmlrpc=&wlw='); ?>
    <link rel="icon" href="<?php $this->options->fav() || $this->options->themeUrl('favicon.ico'); ?>" />
    <link rel="manifest" href="<?php $this->options->manifest('manifest.json') || $this->options->themeUrl('manifest.json') ?>" />


    <!--  IOS does not support Web App Manifest   -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="apple-mobile-web-app-title" content="OZOO">
    <meta name="theme-color" content="<?php $this->options->themeColor() || _e('#FFFFFF') ?>">
    <link rel="apple-touch-icon" sizes="32x32 58x58 72x72 96x96 114x114" href="<?php $this->options->themeUrl('images/icon/ios-icon.jpg'); ?>">
    <!-- <link rel="apple-touch-startup-image" sizes="2048x1496" href="icon-2048x1496.png" media="screen and (min-device-width:481px) and (max-device-width:1024px) and (orientation:landscape) and (-webkit-min-device-pixel-ratio: 2)">
    <link rel="apple-touch-startup-image" sizes="1536x2008" href="icon-1536x2008.png" media="screen and (min-device-width:481px) and (max-device-width:1024px) and (orientation:portrait) and (-webkit-min-device-pixel-ratio: 2)"> -->


    <meta name="format-detection" content="telephone=no">


    <!-- Disable Baidu transformation -->
    <meta http-equiv="Cache-Control" content="no-transform " />
    <meta http-equiv="Cache-Control" content="no-siteapp" />


    <!-- Disable Baidu snapshot -->
    <meta name="Baiduspider" content="noarchive">


    <!-- OGP https://www.ogp.me/ -->
    <?php if ($this->is('post') || $this->is('page')) : ?>
        <meta property="og:url" content="<?php $this->permalink() ?>" />
        <meta property="og:type" content="blog" />
        <meta property="og:title" content="<?php $this->title() ?>" />
        <meta property="og:author" content="<?php $this->author(); ?>" />
        <meta property="og:site_name" content="<?php $this->options->title() ?>" />
        <meta property="og:description" content=" <?php $this->description() ?>" />
        <meta property="og:locale:alternate" content="zh_CN" />
    <?php endif; ?>


    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('style/plain.css'); ?>" />

    <!--  <link rel="preload" href="<?php $this->options->backGroundImage(); ?>" as="image"> -->
    <link rel="preload" href="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js" as="script">
    <link rel="preload" href="<?php $this->options->themeUrl('js/plain.js'); ?>" as="script">


    <!-- Google analytics -->
    <?php _e($this->options->GoogleAnalytics) ?>


    <!-- Used CDN -->
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>


    <!-- Custom Style -->
    <style>
        #root::before {
            background-image: url(<?php $this->options->backGroundImage(); ?>)
        }
    </style>

</head>

<body>
    <div id="root">
        <div id='pjax'>

            <!-- Home does not need them -->
            <?php if (!$this->is('index')) : ?>
                <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('style/github-markdown.css'); ?>" />
                <?php if (in_array('Prism', $this->options->effect)) : ?>
                    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('prism/prism.css'); ?>" />
                <?php endif; ?>
            <?php endif; ?>

            <header id="header">
                <?php if ($this->is('post')) : ?>
                    <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a><?php _e(' /'); ?>
                    <h2 class="post-title"><?php $this->title() ?></h2>
                <?php else : ?>
                    <h1><a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
                    <p class="description"><?php $this->options->description() ?></p>
                    <nav id="nav-menu" role="navigation">
                        <a <?php if ($this->is('index')) : ?> class="current" <?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php $this->options->home(); ?></a>
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while ($pages->next()) : ?>
                            <a <?php if ($this->is('page', $pages->slug)) : ?> class="current" <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                        <?php endwhile; ?>
                    </nav>
                <?php endif; ?>
                <div class="link">
                    <?php if ($this->options->twitterLink) : ?>
                        <a target="_blank" href="<?php $this->options->twitterLink(); ?>"><img alt="twitter-ico" src="<?php $this->options->themeUrl('./images/twitter.png'); ?>"></a>
                    <?php endif; ?>
                    <?php if ($this->options->GitHubLink) : ?>
                        <a target="_blank" href="<?php $this->options->GitHubLink(); ?>"><img alt="GitHub-ico" src="<?php $this->options->themeUrl('./images/github.png'); ?>"></a>
                    <?php endif; ?>
                    <?php if ($this->options->rssLink) : ?>
                        <a target="_blank" href="<?php $this->options->rssLink(); ?>"><img alt="rss-ico" src="<?php $this->options->themeUrl('./images/rss.png'); ?>"></a>
                    <?php endif; ?>
                </div>
            </header>