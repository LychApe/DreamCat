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
.SetButton{
 transform: translateY(-47.2%);
 width: 95px;
}
.DreamCat-content-header {
	min-height: 50px;
	margin-left: -240px;
	padding: 10px 16px 48px 256px;
	color: #fff;
	background-color: #3f51b5;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}

.fade-scale.in {
	opacity: 1;
	-webkit-transform: none;
	transform: none;
}
</style>
<div class="mdui-container-fluid">
	<div class="mdui-row DreamCat-content-header">
		<div class="mdui-container fade-scale in">
			<h1 class="title"><?php $this->options->title(); ?></h1>
			<h4 class="subtitle"><?php $this->archiveTitle(array(
			'category'  =>  _t('分类 %s 下的文章'),
			'search'	=>  _t('包含关键字 %s 的文章'),
			'tag'	   =>  _t('标签 %s 下的文章'),
			'author'	=>  _t('%s 发布的文章')
		), '', ''); ?></h4>
		</div>
	</div>
	
	<div class="mdui-row">
	  <div class="mdui-col-xs-6 mdui-float-right SetButton">
		<button class="mdui-shadow-0 mdui-fab mdui-color-theme-accent mdui-ripple" mdui-dialog="{target: '#search-1'}" style="background-color: #3f51b5!important;"><i class="mdui-icon material-icons">search</i></button>
	  </div>
	  
 
<div class="mdui-container">
  <div class="mdui-dialog" id="search-1">
	<div class="mdui-dialog-content">
	
		<form method="post" action="">
			<div class="mdui-textfield">
			<input class="mdui-textfield-input" type="text" name="s" placeholder="Search"/>
			</div>
		</form>
	  </div>
	</div>
  </div>
</div>
	
</div>
		<?php if ($this->have()): ?>
		<?php while($this->next()): ?>
		
<style>
#main {
	overflow: hidden;
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
	box-sizing: border-box;
	font-size: 16px;
	transition: all .3s ease-out;
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
</style>

<div class="mdui-container mdui-center">

<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
  <div class="mdui-row">
	<div id="main">
	<div class="mdui-col-md-1 mdui-col-lg-1">
	</div>
	
	<div class="mdui-col-md-10 mdui-col-lg-10">
<div id="line"></div>
<div id="coos">
<div class="lis">
<div class="spot"></div>
<div class="g-lin mdui-hidden-xs"></div>
	  <div class="mdui-card mdui-hoverable" id="main" role="main" style="border-radius:9px; transform: translateY(-15%);" >
		<div class="mdui-card-media">
			
<img class="moe-post-wzimg"src="<?php echo thumb($this); ?>"/>
		  <div class="mdui-card-media-covered">
		  <div class="mdui-card-primary">
			<div class="mdui-card-primary-title"><?php $this->title(); ?></div>
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
							src="<?php $this->options->logoUrl() ?>"/>
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
</div>
</div>
	<div class="mdui-col-md-1 mdui-col-lg-1"></div>
  </div>
</article>
</div>
</div>
		<?php endwhile; ?>
		<?php else: ?>
			<article class="post">
				<h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
			</article>
			
		<?php endif; ?>



<style>
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
</style>
<div class="moe-margin-card-top"></div>
	<div class="moe-page-div moe-card-a">
	 <?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 moe-prev"><i class="mdui-icon material-icons">navigate_before</i></button>','prev'); ?>
	 <button class="mdui-btn moe-number" disabled><span class=""><?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?> / <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></span></button>
	 <?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 moe-next"><i class="mdui-icon material-icons">navigate_next</i></button>','next'); ?>
</div>

	<!-- end #main -->
	<?php $this->need('footer.php'); ?>
