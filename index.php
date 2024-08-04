<?php
/**
 * DreamCat   是一个极简自适应博客主题,年轻人追梦的必备良品!
 *
 * @package DreamCat 3.0
 * @author LychApe
 * @version 3.0.240224
 * @link https://github.com/LychApe/DreamCat
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>


<div class="mdui-container-fluid" >
	<div class="mdui-row DreamCat-content-header" >
		<div class="mdui-container" >
			<h1 class="dreamcat-title title" >
                <?php $this->options->DC_WebName(); ?>
			</h1 >
			<h5 class="dreamcat-subtitle subtitle" >
                <?php $this->options->DC_WebSlogan(); ?>
			</h5 >
		</div >
	</div >
</div >

<div class="mdui-hidden-sm-down dreamcat-img-header-wrapper" >
	<div class='dreamcat-img-header dreamcat-img-header-index dreamcat-img-header-md' ></div >
</div >
<div class="mdui-hidden-md-up dreamcat-img-header-wrapper" >
	<div class='dreamcat-img-header dreamcat-img-header-index dreamcat-img-header-sm' ></div >
</div >

<?php $this->need("component/toolbar.php") ?>

<div class="mdui-container" >
	<div class="mdui-container" >
		<div class="mdui-row" >
			<div class="mdui-col-xs-6 mdui-col-sm-3 mdui-hidden-sm-down" >
                <?php $this->need('component/sidebar.php'); ?>
			</div>
			<div class="mdui-col-xs-12 mdui-col-sm-9" >
                <?php $this->need("component/article-list.php") ?>
			</div>
		</div >
	</div >
</div >

<?php $this->need('footer.php'); ?>
