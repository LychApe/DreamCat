<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

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
 transform: translateY(-10%);
}
.SetButton{
 transform: translateY(-47.2%);
 width: 95px;
}
.DreamCat-content-header {
    min-height: 143px;
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
.DreamCat-content-header {
    min-height: auto;
}
}
.fade-scale.in {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
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
.img{
    width: 100%;
}
</style>
<style>
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
</style>

<div class="mdui-container-fluid">
    <div class="mdui-row DreamCat-content-header"></div>
    <div class="mdui-container">
      <div class="mdui-row">
          <div class="mdui-card" style="margin-top: -15%; border-radius:9px;">
            <div class="mdui-card-header mdui-color-grey-50">
              <img class="mdui-card-header-avatar" src="<?php $this->options->logoUrl() ?>"/>
              <div class="mdui-card-header-title"><?php $this->author(); ?></div>
              <div class="mdui-card-header-subtitle"><?php $this->options->description(); ?></div>
            </div>
            <div class="di-color cl"><div class="di-color-a"></div><div class="di-color-b"></div><div class="di-color-c"></div><div class="di-color-d"></div><div class="di-color-e"></div></div>
            <div class="mdui-card-primary">
              <div class="mdui-card-primary-title mdui-text-center" style="font-weight: 400;"><?php $this->title() ?></div>
              <div class="mdui-card-primary-subtitle mdui-text-center">
                  
<div class="mdui-chip">
  <span class="mdui-chip-icon mdui-color-blue"><i class="mdui-icon material-icons">access_time</i></span>
  <span class="mdui-chip-title"> <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?> </span>
</div>
<div class="mdui-chip">
  <span class="mdui-chip-icon mdui-color-blue"><i class="mdui-icon material-icons">brush</i></span>
  <span class="mdui-chip-title"> <?php echo art_count($this->cid); ?>个字 </span>
</div>
<div class="mdui-chip">
  <span class="mdui-chip-icon mdui-color-blue"><i class="mdui-icon material-icons">whatshot</i></span>
  <span class="mdui-chip-title"> <?php _e(getViewsStr($this));?></span>
</div>

              </div>
            </div>
            <div style="border-top: 1px dashed #e0e0e0; font-size: 14px;"></div>
            <div class="mdui-card-content">
                <div class="mdui-typo">
                    <?php $this->content(); ?>
                </div>
            </div>
                <p class="detail-info mdui-typo">#如无特别声明，该文章均为 <a href="<?php $this->options->siteUrl(); ?>"><?php $this->author(); ?></a> 原创，转载请遵循 署名-非商业性使用 4.0 国际（CC BY-NC 4.0） 协议，即转载请注明文章来源。
                <br/>#最后编辑时间为: <?php echo date('Y 年 m 月 d 日' , $this->modified); ?></p>
          </div>
      
    

<br/>
<?php $this->need('comments.php'); ?>
<br/>
</div>
</div>
</div>
<br/>
<style>
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
</style>
</div>
<div class="moe-nav">
   <div class="mdui-divider moe-c-d"></div>
    <div class="mdui-container">
     <div class="mdui-row">
     <?php thePrev($this); ?>
     <?php theNext($this); ?>
     </div>
    </div>
</div>


    <!-- end #main-->

<?php #$this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
