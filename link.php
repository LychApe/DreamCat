<?php
	/**
	 * 友链模板
	 *
	 * @package custom
	 */
	if (!defined('__TYPECHO_ROOT_DIR__')) exit;
	$this->need('header.php');
?>
<style>
.mdui-theme-accent-pink .mdui-typo a {
    color: #212121;
}

.mdui-typo a {
    display: inline;
}
</style>
<div class="mdui-container-fluid" style="transform: translateY(100%)">
    <div class="mdui-appbar mdui-shadow-0" style="height: 0;">
        <div class="mdui-toolbar">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
                mdui-drawer="{target: '#main-drawer', swipe: true}">
                <i class="mdui-icon material-icons" style="color: #f1f3f4">menu</i>
            </span>
            <div class="mdui-toolbar-spacer"></div>
            <button mdui-dialog="{target: '#search-1'}" class="mdui-btn mdui-btn-icon mdui-hidden-md-up">
                <i class="mdui-icon material-icons" style="color: #f1f3f4">search</i>
            </button>
            <a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon">
                <i class="mdui-icon material-icons" style="color: #f1f3f4">refresh</i>
            </a>
        </div>
        <div class="mdui-container">
            <div class="mdui-valign">
                <h1 class="title mdui-center" style="color: #ffffffe3;"><?php $this->title() ?></h1>
            </div>
        </div>
    </div>
</div>
<div class="mdui-container-fluid Dreamcat-appimgbar" style="height: 1024px;zoom: 0.5; background-image: url(<?php  
    $User_ImageUrl_TF = $this->fields->User_ImageUrl_TF;
    if(!empty($User_ImageUrl_TF)){
        echo $User_ImageUrl_TF;
    }else{
      echo(CustomCDN_url('img/post_bj.jpg'));
    }?>);">
</div>

<div style="margin-top: -250px;">
    <div class="mdui-container">
        <div class="mdui-card DreamCat-card-1">
            <div class="mdui-card-content">
                <div class="mdui-typo mdui-container">
                    <br />
                    <div class="mdui-row-sm-1 mdui-row-md-3 mdui-row-lg-4 mdui-row-xl-5">
                        <?php $this->content(); ?>
                    </div>
                    <br />
                </div>
            </div>
        </div>
        <br />
        <?php $this->need('comments.php'); ?>
    </div>
</div>

<br />
<?php if (Typecho_Widget::widget('Widget_Stat')->publishedPostsNum > 1):?>
</div>
<div class="doc-footer-nav mdui-color-grey-50">
    <div class="mdui-container">
        <div class="mdui-row">
            <?php thePrev($this); ?>
            <?php theNext($this); ?>
        </div>
    </div>
</div>
<?php else: ?>
<?php endif; ?>
<?php $this->need('footer.php'); ?>