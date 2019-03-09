<?php
/**
 * DreamCat  是一个极简自适应博客主题,年轻人追梦的必备良品!
 * 
 * @DreamCat Theme 
 * @author FnTieStudio
 * @version 1.0
 * @link https://hanfen.fntie.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<!--Start-->
<style>
.DreamCat-inCo{
  padding-top: 20px;
  padding-bottom: 60px;
  background-color: #3f51b5;
}
.Back-E2{
 border-radius: 18px;
}
.comment-section {
 width: 145px;
 top: 20%;
 transform: translateY(-25%);
}
.SetButton{
 transform: translateY(-47.2%);
 width: 95px;
}
.DreamCat-content-header {
    min-height: 50px;
    margin-left: -240px;
    padding: 10px 16px 48px 256px;
    color: #fff;
    background: #3f51b5;
    text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
@media screen and (max-width: 760px)
.content-header {
    margin: 0;
    min-height: auto;
    padding: 72px 16px 20px;
}
.fade-scale.in {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
}

.ooxxcontainer {
    width: 960px;
    margin: 0 auto;
}
</style>

<div class="mdui-container-fluid">
    <div class="mdui-row DreamCat-content-header">
        <div class="mdui-container fade-scale in">
            <h1 class="title"><?php $this->options->title(); ?></h1>
            <h5 class="subtitle"><?php $this->options->description(); ?></h5>
        </div>
    </div>
    
    <div class="mdui-row">
      <div class="mdui-col-xs-6 comment-section">
        <div class="cui-card-link-avatar comment-section cui-animate-hover-up">
        	<img src="//q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->author->mail();?>&spec=640" class="cui-card-link-avatar-image" />
        	<div class="cui-card-link-avatar-text">
        		<div class="cui-card-link-avatar-title"><?php $this->author(); ?></div>
        		<div class="cui-card-link-avatar-subtitle">Root</div>
        	</div>
        </div>
      </div>
      <?php if ($this->user->hasLogin()):?>
      <div class="mdui-col-xs-6 mdui-float-right SetButton">
        <button class="mdui-fab mdui-color-theme-accent mdui-ripple"><i class="mdui-icon material-icons">&#xe8b8;</i></button>
      </div>
      <?php endif; ?>
    </div>

</div>
<!--End-->
<br/>







<style>
.moe-post-wzimg {
    width: 100%;
    height: 200px;
    overflow: hidden;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50% 50%;
}
</style>











<br/>
<div class="mdui-container mdui-center">
<?php while($this->next()): ?>
<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
  <div class="mdui-row">
    <div class="mdui-col-md-1 mdui-col-lg-1"></div>
    <div class="mdui-col-md-10 mdui-col-lg-10">
      <div class="mdui-card" id="main" role="main" style="border-radius:9px;">
        <div class="mdui-card-media">
            
<img class="moe-post-wzimg" src="<?php echo thumb($this->cid); ?>"/>
          <div class="mdui-card-media-covered">
          <div class="mdui-card-primary">
            <div class="mdui-card-primary-title"><?php $this->title() ?></div>
          </div>
        </div>
        </div>

        <div class="mdui-divider"></div>
        <div class="mdui-card-header">
            <div class="mdui-row">
                <div class="mdui-col-xs-6">   
                 
                  <span itemprop="image">
                      
                            <!--<img class="mdui-card-header-avatar" 
                            src="https://cn.gravatar.com/avatar/"/>-->
                            
                        <img class="mdui-card-header-avatar" 
                            src="//q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->author->mail();?>&spec=100"/>

                  </span>
                  <div class="mdui-card-header-title"><?php $this->author(); ?></div>
                  <div class="mdui-card-header-subtitle"><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></div>
                </div>
                <div class="mdui-col-xs-6">   
            <a href="<?php $this->permalink() ?>" class="mdui-btn mdui-btn-icon mdui-color-theme-accent mdui-ripple mdui-float-right"><i class="mdui-icon material-icons">keyboard_arrow_right</i></a>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="mdui-col-md-1 mdui-col-lg-1"></div>
  </div>
<br/>
</article>
<?php endwhile; ?>
</div>
<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>



<br/>
<?php $this->need('footer.php'); ?>
