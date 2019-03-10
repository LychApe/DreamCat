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
    min-height: 100px;
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
        <div class="mdui-col-md-2"></div>
        <div class="mdui-col-sm-6 mdui-col-md-8">
          <div class="mdui-card" style="transform: translateY(-15%);">
            <div class="mdui-card-header mdui-color-grey-50">
              <img class="mdui-card-header-avatar" src="//q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->author->mail();?>&spec=100"/>
              <div class="mdui-card-header-title"><?php $this->author(); ?></div>
              <div class="mdui-card-header-subtitle"><?php $this->options->description(); ?></div>
            </div>
            <div class="di-color cl"><div class="di-color-a"></div><div class="di-color-b"></div><div class="di-color-c"></div><div class="di-color-d"></div><div class="di-color-e"></div></div>
            <div class="mdui-card-primary">
              <div class="mdui-card-primary-title"><?php $this->title() ?></div>
              <div class="mdui-card-primary-subtitle"><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></div>
            </div>
            <div style="border-top: 1px dashed #e0e0e0; font-size: 14px;"></div>
            <div class="mdui-card-content">
                <div itemprop="articleBody">
                    <?php $this->content(); ?>
                </div>
            </div>
                <p class="detail-info"> 本文由 xxx 创作，采用 知识共享署名4.0 国际许可协议进行许可!<br>本站文章除注明转载/出处外，均为本站原创或翻译，转载前请务必署名!<br>最后编辑时间为: </p>
            <div class="mdui-card-actions">
              <button class="mdui-btn mdui-btn-icon mdui-float-right"><i class="mdui-icon material-icons">expand_more</i></button>
            </div>
          </div>
        </div>
        <div class="mdui-col-md-2"></div>
      </div>
    </div>
</div>








<!--<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <ul class="post-meta">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
        </ul>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
    </article>

    <?php $this->need('comments.php'); ?>

    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
</div>--><!-- end #main-->


<?php #$this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
