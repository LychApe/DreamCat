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
    <script src="https://cdn.bootcss.com/mdui/0.4.2/js/mdui.min.js"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/mdui/0.4.2/css/mdui.min.css">
    <link rel="stylesheet" href="https://cui.dcloud.store/css/cui.css">
    <!-- <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>"> -->
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body class="mdui-drawer-body-left mdui-appbar-with-toolbar  mdui-theme-primary-indigo mdui-theme-accent-pink">

<header class="mdui-appbar mdui-shadow-0 mdui-appbar-fixed">
  <div class="mdui-toolbar mdui-color-theme">
    <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
    <a href="/" class="mdui-typo-headline mdui-hidden-xs"><?php $this->options->title(); ?></a>
          <a href="" class="mdui-typo-title"><?php $this->archiveTitle(); ?></a>
        <div class="mdui-toolbar-spacer"></div>
      <div class="mdui-textfield mdui-textfield-expandable mdui-float-right">
        <button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></button>
        <input class="mdui-textfield-input" type="text" placeholder="Search"/>
        <button class="mdui-textfield-close mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">close</i></button>
      </div>
    </div>
  </div>
</header>

<style>
.DreamCat-List-01 {
    padding: 0px 0!important;
    margin: 0;
    list-style: none;
    background-color: transparent;
}
.DreamCat-List-02 {
    border-radius: 0px
}
.moe-menu-bg {
    width: 100%;
    height: 200px;
    position: relative!important;
    background-size: cover!important;
    background-position: 50% 50%!important;
    background-repeat: no-repeat!important;
}
.DreamCat-List-headimg {
    width: 60px;
    height: 60px;
    margin-top: 35px;
    margin-left: 20px;
    border-radius: 50%;
    border: 2px solid #e8e6e6;
    background-size: cover!important;
    background-position: center center!important;
}
.DreamCat-menu-author {
    left: 0;
    bottom: 0;
    color: #fff;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    position: absolute;
    box-sizing: border-box;
    margin-bottom: 55px;
}
</style>
    <div class="mdui-drawer mdui-color-grey-50" id="main-drawer">
      <div class="mdui-list DreamCat-List-01" mdui-collapse="{accordion: true}" style="margin-bottom: 50%;">
            
      <div class="mdui-card DreamCat-List-02">
        <div class="moe-menu-bg" style="background: url(https://www.imys.net/img/brand.jpg);">
            <img class="DreamCat-List-headimg mdui-shadow-6" src="https://q1.qlogo.cn/g?b=qq&nk=1091044631&s=640">
            <span class="DreamCat-menu-author"><?php $this->author(); ?></span>
              <div class="mdui-card-media-covered">
                <div class="mdui-card-primary">
                  <div class="mdui-card-primary-subtitle"><?php $this->options->description(); ?></div>
                </div>
              </div>
        </div>
      </div>
     
        
            <a href="/">
              <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">near_me</i>
                <div class="mdui-list-item-content">首  页</div>
              </li>
            </a>
            
            
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
                <a href="ClassSchedule.php">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">group_add</i>
                        <div class="mdui-list-item-content">退出</div>
                    </li>
                </a>
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
                <a href="ClassSchedule.php">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">group_add</i>
                        <div class="mdui-list-item-content">注册</div>
                    </li>
                </a>
              </div>
            </div>
            <?php endif; ?>
        
        
        
            <div class="mdui-collapse-item mdui-collapse-item-open">
                <div class="mdui-collapse-item-header mdui-list-item">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">inbox</i>
                        <div class="mdui-list-item-content mdui-text-color-theme-text">归 档</div>
                        <i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
                </div>

                <div class="mdui-collapse-item-body" style="height: auto;">
                    <ul class="mdui-list mdui-list-dense">
                        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
                        ->parse('<li class="mdui-list-item mdui-ripple"><a href="{permalink}">{date}</a></li>'); ?>
                    </ul>
                </div>
            </div>
        
  
        <div class="mdui-collapse-item">
                <div class="mdui-collapse-item-header mdui-list-item">
                        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">view_week</i>
                        <div class="mdui-list-item-content mdui-text-color-theme-text">分 类</div>
                        <i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
                </div>

                <div class="mdui-collapse-item-body" style="">
                    <ul class="mdui-list mdui-list-dense">
                        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
                    </ul>
                </div>
            </div>
        
          <div class="mdui-divider"></div>
          
            <a>
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">description</i>
                <span class="mdui-list-item-content mdui-text-color-theme-text">文章</span>
                <div class="cui-bubble cui-bubble-num cui-error">1</div>
            </li>
            </a>
        
            <a>
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">textsms</i>
                <span class="mdui-list-item-content mdui-text-color-theme-text">评论</span>
                <div class="cui-bubble cui-bubble-num cui-error">
                    <?php 
                    echo("99+");
                    //echo mysqli_num_rows( $ALLNUM );
                    ?>
                </div>
            </li>
            </a>
        
        </div>
      </div>

<div id="body">
    <div class="container">
        <div class="row">

    
    
