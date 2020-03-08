<?php
/**
 * DreamCat  是一个极简自适应博客主题,年轻人追梦的必备良品!
 * 
 * @package DreamCat
 * @author LeaKei
 * @version 0.1
 * @link httpS://leakei.com
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
</style>
<div class="mdui-container-fluid">
    <div class="mdui-row DreamCat-content-header mdui-shadow-18">
        <div class="mdui-container fade-scale in">
            <h1 class="title"><?php $this->options->title(); ?></h1>
            <h5 class="subtitle"><?php $this->options->description(); ?></h5>
        </div>
    </div>
    
    <div class="mdui-row">
      <div class="mdui-col-xs-6 mdui-float-right SetButton">
        <button class="mdui-fab mdui-color-theme-accent mdui-ripple" style="background-color: #3e7ced!important;"><i class="mdui-icon material-icons">search</i></button>
      </div>
    </div>
</div>

  <div class="mdui-container">
    <div class="mdui-row">
      <div class="mdui-col-xs-12 mdui-col-sm-8">
          
      <div class="mdui-card DreamCat-top-card mdui-shadow-18" style="border-radius:18px;">
        <div class="mdui-card-media">
          <img class="DreamCat-main-pic" src="//img14.360buyimg.com/img/jfs/t1/60307/19/4269/282412/5d2629faE5c3b1ef5/02d26b22dfe459d0.jpg"/>
          <div class="mdui-card-media-covered">
            <div class="mdui-card-primary">
              <div class="mdui-card-primary-title">Life is not fair, be used to it !</div>
            </div>
          </div>
        </div>
      </div>
      </div>
      
      <div class="mdui-hidden-xs mdui-col-sm-4">
      
  <div class="mdui-row">
		<div class="mdui-card DreamCat-top-card mdui-shadow-20" style="border-radius:18px;">
		        <div class="mdui-card-media">
		          <img class="DreamCat-main-pic" src="https://huanblog.com/usr/themes/dobyi/images/navigation-bg.jpg" style="
		    height: 100px;
		    position: relative;
		    background-size: cover;
		    background-position: center;
		    border-radius: var(--jinsom-border-radius) var(--jinsom-border-radius) 0 0;">
		        </div>
		
		<img class="DreamCat-List-headimg mdui-shadow-6" src="//q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->author->mail();?>&spec=640" style="
		    margin-top: -50px;
		    position: relative;
		    left: 7%;
		    /* margin-right: -20px; */">
		
		<div class="number" style="
		    color: #999;
		    font-size: 15px;
		    display: flex;
		    justify-content: center;
		    margin: 8%;">
		<span><?php $this->options->description(); ?></span>
		</div>
		      </div>
  </div>
      
      </div>
      
    </div>
  </div>
 
<br/>
<br/>


<style>
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
    /* float: right; */
    /* right: 0px; */
    margin-left: -400px;
}
</style>

<div class="mdui-container mdui-center">
<?php while($this->next()): ?>

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
</div>
</div>
    <div class="mdui-col-md-1 mdui-col-lg-1"></div>
  </div>
</article>
<?php endwhile; ?>
</div>
</div>
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
<?php #$this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
