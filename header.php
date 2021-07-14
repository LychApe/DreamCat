<?php
/**
 * DreamCat   是一个极简自适应博客主题,年轻人追梦的必备良品!
 *
 * @package DreamCat
 * @author LychApe
 * @version 1.9-20210201
 * @link https://github.com/LychApe/DreamCat
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

?>
<!DOCTYPE HTML>
<html class="no-js" lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ),'',' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/mdui/1.0.1/css/mdui.min.css">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('src/css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php $this->options->themeUrl('src/css/md2.css'); ?>" />
    <script src="https://cdn.bootcss.com/mdui/1.0.1/js/mdui.min.js"></script>
    <script src="https://at.alicdn.com/t/font_2359325_loysvemas8m.js"></script>
    <script src="https://at.alicdn.com/t/font_2359325_loysvemas8m.js"></script>
    <script src='https://cdnjs.loli.net/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.min.js'></script>
    <!--[if lt IE 9]>
    <script src="https://cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php $this->header(); // 通过自有函数输出HTML头部信息 ?>
    <style>
        @font-face {
          font-family: SourceHanSansHWSC-VF;
          src: url(<?php $this->options->themeUrl('src/SourceHanSansHWSC-VF.otf.woff2'); ?>);
        }
        body {
          font-family: SourceHanSansHWSC-VF;
        }
        .DreamCat-content-header {
            min-height: 50px;
            margin-left: -240px;
            padding: 10px 16px 48px 256px;
            color: #fff;
            background-color: #3f51b5;
            text-shadow: 0 1px 1px rgba(0,0,0,0.2);
        }
        .DreamCat-inCo{
            padding-top: 20px;
            padding-bottom: 60px;
            background-color: #3f51b5;
        }
        .DreamCat-footer {
            padding: 10px 0;
            background: rgba(255,255,255,.6);
            box-shadow: 1px 0px 9px 1px rgba(0,0,0,.1);
        }
        .DreamCat-infooter {
            text-align: center;
            margin: 0 auto;
            font-size: 12px;
            color: #999;
        }
        .moe-margin-card-top {
            margin-top: 30px;
        }
        .moe-page-div {
            margin-top: 30px;
            max-width: 250px;
            margin-left: auto;
            position: relative;
            margin-right: auto;
            margin-bottom: 80px;
        }
        .moe-page-div .moe-number {
            left: 37%;
            position: absolute;
        }
        .moe-page-div .moe-next {
            right: 0;
            position: absolute;
        }
        .detail-info {
            overflow: hidden;
            padding: 10px 20px;
            margin: 0;
            border-top: 1px dashed #e0e0e0;
            color: #626262;
            font-size: 14px;
            line-height: 19px;
            background-color: #f6f6f6;
        }
        .di-color div {
            width: 20%;
            float: left;
            height: 2px;
        }
        .di-color .di-color-a {
            background-color: #f92672;
        }
        .di-color .di-color-b {
            background-color: #fd971f;
        }
        .di-color .di-color-c {
            background-color: #8ACF00;
        }
        .di-color .di-color-d {
            background-color: #0092FF;
        }
        .di-color .di-color-e {
            background-color: #ae74ac;
        }
        .moe-nav {
            height: 96px;
            color: #fff!important;
            margin-top: 18px;
            background: rgba(0,0,0,.3);
        }
        .moe-c-d {
            display: none;
        }
        .moe-nav a {
            color: #fff!important;
        }
        .moe-nav-left {
            text-align: left;
        }
        .moe-nav-text {
            width: 100%;
            height: 100%;
            font-size: 20px;
            font-weight: 500;
            line-height: 24px;
            padding-top: 24px;
            display: inline-block;
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }
        .moe-nav a {
            color: #fff!important;
        }
        .moe-nav-right {
            text-align: right;
        }
        .comment-section {
            width: 145px;
            top: 20%;
            transform: translateY(-10%);
        }
        .lis {
            margin-top: 40px;
        }
        .spot {
            width: 20px;
            height: 20px;
            position: absolute;
            left: -60px;
            transform: translateX(-50%);
            background-color: #666666;
            border: 4px solid #ffffff;
            border-radius: 18px;
        }
        .g-lin {
            width: 500px;
            height: 4px;
            background-color: #666666;
            position: relative;
            top: 12px;
            z-index: -1;
            margin-left: -400px;
        }
        .dc_icon {
            width: 3em;
            height: 2em;
            vertical-align: 11em;
            fill: currentColor;
            overflow: hidden;
        }
        @media screen and (max-width: 760px) {
            .content-header {
                margin: 0;
                min-height: auto;
                padding: 72px 16px 20px;
            }
        }
        @media screen and (max-width: 760px){
            .DreamCat-content-header {
                min-height: auto;
            }
        }
        #main {
            overflow: hidden;
            /* margin: 25px auto; */
        }
        #line {
            width: 4px;
            height: 100%;
            background-color: #666666;
            position: absolute;
            left: -60px;
            transform: translateX(-50%);
        }
        #coos{
            margin: 0;
            padding: 0;
            /*font-family: "å¾®è½¯é›…é»‘"; /*你说可以不用*/
            box-sizing: border-box;
            font-size: 16px;
            transition: all .3s ease-out;
        }
    </style>
</head>
<body class="mdui-drawer-body-left mdui-theme-primary-indigo mdui-theme-accent-pink mdui-color-grey-100">
<!--[if lt IE 8]>
<div class="browsehappy" role="dialog">'当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a></div>
<![endif]-->
<header>
    <div class="mc-drawer mdui-drawer mdui-color-grey-50" style="background: linear-gradient(135deg,#ECEFF1 0,#FAFAFA 60%);" id="main-drawer">
        <div class="mdui-list DreamCat-List-01" mdui-collapse="{accordion: true}" style="margin-bottom: 50%;">
            <div class="mdui-card DreamCat-List-02" style="overflow: inherit;">
                <div class="DreamCat-menu-bg" style="background: url(<?php $this->options->themeUrl('src/img/brand.jpg'); ?>);">
                    <?php if(!empty($this->options->logoUrl)): ?><img class="DreamCat-List-headimg mdui-shadow-6" src="<?php $this->options->logoUrl() ?>">
                    <?php else: ?><img class="DreamCat-List-headimg mdui-shadow-6" src="<?php $this->options->themeUrl('src/img/default-avatar.png'); ?>">
                    <?php endif; ?>
                    <div class="mdui-card-media-covered">
                        <div class="mdui-card-primary">
                            <div class="mdui-valig">
                                <div class="DreamCat-menu-author nmdui-center" style="font-weight: 400;text-align: center;">
                                    <?php $this->options->title(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 首页 -->
            <a href="/">
                <li class="mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">near_me</i>
                    <div class="mdui-list-item-content">首&nbsp;&nbsp;页</div>
                </li>
            </a>
            <!-- 归档 -->
            <div class="mdui-collapse-item mdui-collapse-item-dense">
                <div class="mdui-collapse-item-header mdui-list-item">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">inbox</i>
                    <div class="mdui-list-item-content mdui-text-color-theme-text">归&nbsp;&nbsp;档</div>
                    <i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
                </div>
                <div class="mdui-collapse-item-body" style="">
                    <ul class="mdui-list mdui-list-dense">
                        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li class="mdui-list-item mdui-ripple" ><a href="{permalink}" class="mdui-list-item-content mdui-text-color-theme-text">{date}</a></li>'); ?>
                    </ul>
                </div>
            </div>
            <!-- 分类 -->
            <div class="mdui-collapse-item mdui-collapse-item-dense">
                <div class="mdui-collapse-item-header mdui-list-item">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">view_week</i>
                    <div class="mdui-list-item-content mdui-text-color-theme-text">分&nbsp;&nbsp;类</div>
                    <i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
                </div>
                <div class="mdui-collapse-item-body" style="">
                    <ul class="mdui-list mdui-list-dense" for="show-category-button">
                        <?php $category=NULL;$this->widget('Widget_Metas_Category_List')->to($category); ?>
                        <?php while ($category->next()): ?>
                            <li class="mdui-list-item mdui-ripple">
                                <a href="<?php $category->permalink(); ?>" class="mdui-list-item-content mdui-text-color-theme-text" title="<?php $category->name(); ?>">
                                    <?php $category->name(); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <!-- 页面 -->
            <div class="mdui-collapse-item mdui-collapse-item-dense">
                <div class="mdui-collapse-item-header mdui-list-item">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">layers</i>
                    <div class="mdui-list-item-content mdui-text-color-theme-text">页&nbsp;&nbsp;面</div>
                    <i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
                </div>
                <div class="mdui-collapse-item-body" style="">
                    <ul class="mdui-list mdui-list-dense" for="show-category-button">
                        <?php $pages=NULL;$this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while ($pages->next()): ?>
                            <li class="mdui-list-item mdui-ripple">
                                <a href="<?php $pages->permalink(); ?>" class="mdui-list-item-content mdui-text-color-theme-text" title="<?php $pages->title(); ?>">
                                    <?php $pages->title(); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <!-- RSS -->
            <a href="<?php $this->options->feedUrl(); ?>">
                <li class="mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">rss_feed</i>
                    <div class="mdui-list-item-content">R&nbsp;S&nbsp;S</div>
                </li>
            </a>
            <div class="mdui-divider"></div>
            <div>
                <a>
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">description</i>
                        <span class="mdui-list-item-content mdui-text-color-theme-text">文&nbsp;&nbsp;章</span>
                        <div class="mdui-chip">
                            <span class="mdui-chip-title"><?php $stat=NULL;Typecho_Widget::widget('Widget_Stat')->to($stat);$stat->publishedPostsNum() ?></span>
                        </div>
                    </li>
                </a>
            </div>
            <div>
                <a>
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">textsms</i>
                        <span class="mdui-list-item-content mdui-text-color-theme-text">评&nbsp;&nbsp;论</span>
                        <div class="mdui-chip">
                            <span class="mdui-chip-title"><?php $stat->publishedCommentsNum() ?></span>
                        </div>
                    </li>
                </a>
            </div>
            <div class="mdui-divider"></div>
            <div>
                <a>
                    <li class="mdui-list-item mdui-ripple" mdui-dialog="{target:'#About_DreamCat'}">
                        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">info_outline</i>
                        <div class="mdui-list-item-content">DreamCat</div>
                    </li>
                </a>
            </div>
            <div class="copyright"></div>
        </div>
    </div>
</header>
<div class="mdui-container-fluid" style="padding-left: 0px; padding-right: 0px;" >
    <div class="mdui-appbar mdui-shadow-0">
        <div class="mdui-toolbar mdui-color-indigo">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
            <a href="/" class="mdui-typo-headline mdui-hidden-xs"><?php #$this->options->title(); ?></a>
            <a href="" class="mdui-typo-title"><?php #$this->archiveTitle(); ?></a>
            <div class="mdui-toolbar-spacer"></div>
            <a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon">
                <i class="mdui-icon material-icons">refresh</i>
            </a>
        </div>
    </div>
</div>