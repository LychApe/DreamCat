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
            <h1 class="title">HanFen's Blog</h1>
            <h5 class="subtitle">DreamCat is Very Good !</h5>
        </div>
    </div>
    
    <div class="mdui-row">
      <div class="mdui-col-xs-6 comment-section">
        <div class="cui-card-link-avatar comment-section cui-animate-hover-up">
        	<img src="https://q1.qlogo.cn/g?b=qq&nk=1091044631&s=640" class="cui-card-link-avatar-image" />
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









<div class="col-mb-12 col-8" id="main" role="main">
	<?php while($this->next()): ?>
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
			<h2 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
			<ul class="post-meta">
				<li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
				<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
				<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
				<li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
			</ul>
            <div class="post-content" itemprop="articleBody">
    			<?php $this->content('- 阅读剩余部分 -'); ?>
            </div>
        </article>
	<?php endwhile; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->


<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
