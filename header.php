<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
        
    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('src/css/style.css'); ?>">
    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/css/mdui.min.css">
    <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/js/mdui.min.js"></script>
    
    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<!-- Body-->
<body class="mdui-drawer-body-left mdui-theme-primary-indigo mdui-theme-accent-pink mdui-color-grey-100">
    
    <!--[if lt IE 8]>
        <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
    <![endif]-->
<header>
    <div class="mdui-drawer mdui-color-grey-50" style="background: linear-gradient(135deg,#ECEFF1 0,#FAFAFA 60%);" id="main-drawer">
      <div class="mdui-list DreamCat-List-01" mdui-collapse="{accordion: true}" style="margin-bottom: 50%;">
            
      <div class="mdui-card DreamCat-List-02" style="overflow: inherit;">
        <div class="DreamCat-menu-bg" style="background: url(<?php $this->options->themeUrl('src/img/brand.jpg'); ?>);">
            <img class="DreamCat-List-headimg mdui-shadow-6" src="//q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->author->mail();?>&spec=640">
              <div class="mdui-card-media-covered">
                <div class="mdui-card-primary">
                  <div class="DreamCat-menu-author font-weight: 400; mdui-valign"><?php $this->author(); ?></div>
                </div>
              </div>
        </div>
      </div>
        <!-- 首页 -->
            <a href="/">
              <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">near_me</i>
                <div class="mdui-list-item-content">首  页</div>
              </li>
            </a>
        <!-- 用户 -->    
            <div class="mdui-collapse-item mdui-collapse-item-dense">
              <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">account_box</i>
                <div class="mdui-list-item-content">用  户</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
              </div>
            <?php if ($this->user->hasLogin()):?>
              <div class="mdui-collapse-item-body mdui-list">
                <a href="/admin/login.php">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">https</i>
                        <div class="mdui-list-item-content">后台</div>
                  </li>
                </a>
                <!--<a href="ClassSchedule.php">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">group_add</i>
                        <div class="mdui-list-item-content">退出</div>
                    </li>
                </a>-->
              </div>
            </div>
            <?php else:?>
              <div class="mdui-collapse-item-body mdui-list">
                <a href="/admin/login.php">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">https</i>
                        <div class="mdui-list-item-content">登陆</div>
                  </li>
                </a>
                <a href="/admin/register.php">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">group_add</i>
                        <div class="mdui-list-item-content">注册</div>
                    </li>
                </a>
              </div>
            </div>
            <?php endif; ?>
        <!-- 归档 --> 
            <div class="mdui-collapse-item  mdui-collapse-item-dense">
                    <div class="mdui-collapse-item-header mdui-list-item">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">inbox</i>
                        <div class="mdui-list-item-content mdui-text-color-theme-text">归 档</div>
                        <i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
                    </div>
                <div class="mdui-collapse-item-body" style="">
                    <ul class="mdui-list mdui-list-dense">
                    <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li class="mdui-list-item mdui-ripple" ><a href="{permalink}" class="mdui-list-item-content mdui-text-color-theme-text">{date}</a></li>'); ?>
                    </ul>
                </div>
            </div>
        <!-- 分类 -->
            <div class="mdui-collapse-item  mdui-collapse-item-dense">
                    <div class="mdui-collapse-item-header mdui-list-item">
                            <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">view_week</i>
                            <div class="mdui-list-item-content mdui-text-color-theme-text">分 类</div>
                            <i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
                    </div>
                    <div class="mdui-collapse-item-body" style="">
                        <ul class="mdui-list mdui-list-dense" for="show-category-button">
                            <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
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
        <!-- RSS -->
            <a href="<?php $this->options->feedUrl(); ?>">
              <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">rss_feed</i>
                <div class="mdui-list-item-content">RSS</div>
              </li>
            </a>

          <div class="mdui-divider"></div>

        <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
            <a>
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">description</i>
                <span class="mdui-list-item-content mdui-text-color-theme-text">文章</span>
                <div class="mdui-chip">
                    <span class="mdui-chip-title"><?php $stat->publishedPostsNum() ?></span>
                </div>
            </li>
            </a>
            <a>
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">textsms</i>
                <span class="mdui-list-item-content mdui-text-color-theme-text">评论</span>
                <div class="mdui-chip">
                  <span class="mdui-chip-title"><?php $stat->publishedCommentsNum() ?></span>
                </div>
            </li>
            </a>

            <div class="mdui-divider"></div>

            <a>
    		  <li class="mdui-list-item mdui-ripple" mdui-dialog="{target:'#About_DreamCat'}">
				<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">info_outline</i>
				<div class="mdui-list-item-content">DreamCat</div>
			  </li>
			</a>
        </div>
</header>
<div class="mdui-container-fluid" style="padding-left: 0px; padding-right: 0px;" >
    <div class="mdui-appbar mdui-shadow-0">
      <div class="mdui-toolbar mdui-color-indigo">
        <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
        <a href="/" class="mdui-typo-headline mdui-hidden-xs"><?php #$this->options->title(); ?></a>
              <a href="" class="mdui-typo-title"><?php #$this->archiveTitle(); ?></a>
            <div class="mdui-toolbar-spacer"></div>
                <a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>
      </div>
    </div>
</div>
<div class="mdui-container-fluid" style="padding-left: 0px; padding-right: 0px;">
<div id="body">
    <div class="container">
        <div class="row">

    
    
