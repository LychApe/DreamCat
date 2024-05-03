<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-container" >
	<div class="mdui-container mdui-valign" >
		<h1 class="title mdui-center dreamcat-title" ><?php $this->title() ?></h1 >
	</div >
</div >

<div class="mdui-hidden-sm-down dreamcat-img-header-wrapper" >
	<div class='dreamcat-img-header dreamcat-img-header-post' ></div >
</div >

<div class="mdui-container dreamcat-content-wrapper" >
	<div class="mdui-card DreamCat-card-1" >
		<div class="mdui-card-content" >
			<div class="mdui-typo dreamcat-content page-content" >
                <?php $this->content(); ?>
			</div >
			<div class="mdui-row-xs-<?php echo empty($this->options->DC_AdmireQCode) ? 1 : 2; ?> " >
                <?php $this->need("component/donate.php"); ?>
                <?php $this->need("component/share.php") ?>
			</div >
		</div >

        <?php $this->need("component/copyright.php") ?>
        <?php $this->need("component/category-bar.php") ?>
	</div >
</div >

<?php $this->need('component/comments.php'); ?>

<?php
if (Typecho_Widget::widget('Widget_Stat')->publishedPostsNum > 1):
    ?>
	<div class="doc-footer-nav mdui-color-grey-50" >
		<div class="mdui-container" >
			<div class="mdui-row" >
                <?php thePrev($this); ?>
                <?php theNext($this); ?>
			</div >
		</div >
	</div >

<?php endif; ?>


<?php $this->need('footer.php'); ?>
