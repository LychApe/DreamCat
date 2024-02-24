<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<!--
+--------------------------------------------------
| ____  ____  ____    __    __  __  ___    __   ____ 
|(  _ \(  _ \( ___)  /__\  (  \/  )/ __)  /__\ (_  _)
| )(_) ))   / )__)  /(__)\  )    (( (__  /(__)\  )(  
|(____/(_)\_)(____)(__)(__)(_/\/\_)\___)(__)(__)(__) 
|                                                    
+--------------------------------------------------
| Design: HanFengA7
| Edition：X3.0
+--------------------------------------------------
-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->DC_WebName(); ?></title>
    <?php
    if ($this->options->DC_WebCdnRadio == 'FuseAccelerationMode') {
        echo '<link rel="dns-prefetch" href="//gh.sourcegcdn.com">';
    }
    ?>
    <!-- 使用url函数转换相关路径 -->
    <link rel="shortcut icon" href="<?php echo($this->options->DC_WebFavicon()); ?>" type="image/x-icon"/>
    <link rel="stylesheet"
          href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/mdui.min.css', 'mdui.min.css'); ?>">
    <link rel="stylesheet"
          href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/md2.css', 'md2.css'); ?>">
    <link rel="stylesheet"
          href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/dreamcat.css', 'dreamcat.css'); ?>">
    <link rel="stylesheet"
          href="<?php CustomCDN_FAM('DreamCat_StaticResources/icons/iconfont/', '', 'icons/iconfont/iconfont.css', 'iconfont.css'); ?>">
    <link rel="stylesheet"
          href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/atom-one-light.min.css', 'atom-one-light.min.css'); ?>">
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header('commentReply='); ?>
</head>

<body class="mdui-drawer-body mdui-theme-primary-indigo mdui-theme-accent-pink">
<style>
    @font-face {
        font-family: CustomFont;
        src: url(<?php CustomFont_url();?>);
    }

    body {
        font-family: CustomFont, serif;
        background-color: #fcfcfceb;
    }

    <?php $this->options->DC_WebCustomStyle();
    ?>
</style>


<header>
    <div class="mc-drawer mdui-drawer mdui-drawer-close" style="box-shadow: 0 12px 15px rgb(140 152 164 / 48%);"
         id="main-drawer">
        <div class="mdui-list DreamCat-ListM-01" mdui-collapse="{accordion: true}">

            <!-- 首页 -->
            <a href="<?php $this->options->siteUrl() ?>">
                <li class="mdui-list-item mdui-ripple" style="margin-top: 8px;">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">near_me</i>
                    <div class="mdui-list-item-content">首页</div>
                </li>
            </a>
            <!-- 归档 -->
            <div class="mdui-collapse-item mdui-collapse-item-dense">
                <div class="mdui-collapse-item-header mdui-list-item">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">inbox</i>
                    <div class="mdui-list-item-content mdui-text-color-theme-text">归档</div>
                    <i
                        class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
                </div>
                <div class="mdui-collapse-item-body" style="">
                    <ul class="mdui-list mdui-list-dense">
                        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse(
                            '<li class="mdui-list-item mdui-ripple" ><a href="{permalink}" class="mdui-list-item-content mdui-text-color-theme-text">{date}</a></li>'
                        ); ?>
                    </ul>
                </div>
            </div>
            <!-- 分类 -->
            <div class="mdui-collapse-item mdui-collapse-item-dense">
                <div class="mdui-collapse-item-header mdui-list-item">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">view_week</i>
                    <div class="mdui-list-item-content mdui-text-color-theme-text">分类</div>
                    <i
                        class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
                </div>
                <div class="mdui-collapse-item-body" style="">
                    <ul class="mdui-list mdui-list-dense" for="show-category-button">
                        <?php $category = null;
                        $this->widget('Widget_Metas_Category_List')->to($category); ?>
                        <?php while ($category->next()): ?>
                            <li class="mdui-list-item mdui-ripple">
                                <a href="<?php $category->permalink(); ?>"
                                   class="mdui-list-item-content mdui-text-color-theme-text"
                                   title="<?php $category->name(); ?>">
                                    <?php $category->name(); ?>
                                </a>
                            </li>
                            <br/>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <!-- 页面 -->
            <div class="mdui-collapse-item mdui-collapse-item-dense">
                <div class="mdui-collapse-item-header mdui-list-item">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">layers</i>
                    <div class="mdui-list-item-content mdui-text-color-theme-text">页面</div>
                    <i
                        class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
                </div>
                <div class="mdui-collapse-item-body" style="">
                    <ul class="mdui-list mdui-list-dense" for="show-category-button">
                        <?php
                        $pages = $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while ($pages->next()): ?>
                            <li class="mdui-list-item mdui-ripple">
                                <a href="<?php $pages->permalink(); ?>"
                                   class="mdui-list-item-content mdui-text-color-theme-text"
                                   title="<?php $pages->title(); ?>">
                                    <?php $pages->title(); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <!-- Login -->
            <?php if (!empty($this->options->DC_LoginIconRadio == 'TureMode')): ?>
                <?php if ($this->user->hasLogin()): ?>
                    <a href="<?php echo $this->options->siteUrl ?>./admin">
                        <li class="mdui-list-item mdui-ripple">
                            <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">account_box</i>
                            <div class="mdui-list-item-content">后台</div>
                        </li>
                    </a>
                <?php else: ?>
                    <a href="<?php echo $this->options->siteUrl ?>./admin">
                        <li class="mdui-list-item mdui-ripple">
                            <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">&#xe853;</i>
                            <div class="mdui-list-item-content">登录</div>
                        </li>
                    </a>
                <?php endif; ?>
            <?php endif;?>
            <!-- RSS -->
            <?php if (is_array($this->options->DC_GlobalApp) && in_array('DCShowRSS', $this->options->DC_GlobalApp)): ?>
                <a href="<?php $this->options->feedUrl(); ?>">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">rss_feed</i>
                        <div class="mdui-list-item-content">RSS</div>
                    </li>
                </a>
            <?php endif; ?>
            <div class="mdui-divider"></div>
            <div>
                <a>
                    <li class="mdui-list-item">
                        <i
                            class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">description</i>
                        <span class="mdui-list-item-content mdui-text-color-theme-text">文章</span>
                        <div class="mdui-chip">
                                <span class="mdui-chip-title"><?php $stat = null;
                                    Typecho_Widget::widget('Widget_Stat')->to($stat);
                                    $stat->publishedPostsNum() ?></span>
                        </div>
                    </li>
                </a>
            </div>
            <div>
                <a>
                    <li class="mdui-list-item">
                        <i
                            class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">textsms</i>
                        <span class="mdui-list-item-content mdui-text-color-theme-text">评论</span>
                        <div class="mdui-chip">
                            <span class="mdui-chip-title"><?php $stat->publishedCommentsNum() ?></span>
                        </div>
                    </li>
                </a>
            </div>
        </div>
        <div class="copyright">
            <p>Theme: <a mdui-dialog="{target:'#About_DreamCat'}">DreamCat</a></p>
        </div>
    </div>
</header>


<div class="mdui-dialog" id="About_DreamCat">
    <div class="mdui-dialog-title">关于 DreamCat</div>
    <div class="mdui-dialog-content" style="height: 219px;">
        <blockquote>
            <div class="mdui-typo">
                <p>主题名称：<a href="https://typecho.me/1516.html" target="_blank">DreamCat</a> | 版本：<a
                        href="https://github.com/LychApe/DreamCat"
                        target="_blank"><?php echo(themeVersion()); ?></a></p>
                <p>主题开发：<a href="https://github.com/HanFengA7" target="_blank">HanFengA7</a> | <a
                        href="https://github.com/CornWorld" target="_blank">CornWorld</a>
                </p>
                <p>Designed by <a href="https://www.hanfenga7.cn/" style="text-decoration: none">HanFengA7</a> Power
                    by
                    <a href="https://typecho.org/" style="text-decoration: none">Typecho</a>
                </p>
                <p>Copyright © 2015-<?php echo date('Y'); ?> by LychApe All rights reserved!</p>
            </div>
        </blockquote>
        <div class="mdui-dialog-actions">
            <button class="mdui-btn mdui-ripple" mdui-dialog-close>知 道 啦 !</button>
        </div>
    </div>
</div>

<div class="mdui-container">
    <div class="mdui-dialog" id="search-1">
        <div class="mdui-dialog-content">
            <form method="post" action="">
                <div class="mdui-textfield">
                    <label>
                        <input class="mdui-textfield-input" type="text" name="s" placeholder="输入关键词进行搜索"/>
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>
