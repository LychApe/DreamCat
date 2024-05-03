<?php
/**
 * 友链模板
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="mdui-container" >
	<div class="mdui-valign" >
		<h1 class="title dreamcat-title mdui-center" ><?php $this->title() ?></h1 >
	</div >
</div >

<div class="mdui-hidden-sm-down dreamcat-img-header-wrapper" >
	<div class='dreamcat-img-header dreamcat-img-header-post' ></div >
</div >

<div class="mdui-container" >
	<div class="mdui-card DreamCat-card-1" >
		<div class="mdui-card-content" >
			<div class="mdui-typo mdui-container dreamcat-content" >
				<div class="mdui-row-sm-1 mdui-row-md-3 mdui-row-lg-4 mdui-row-xl-5" >
                    <?php $this->content(); ?>
				</div >
			</div >
		</div >
	</div >
</div >


<?php $this->need('comments.php'); ?>

<?php if (Typecho_Widget::widget('Widget_Stat')->publishedPostsNum > 1): ?>
	<div class="doc-footer-nav mdui-color-grey-50" >
		<div class="mdui-container" >
			<div class="mdui-row" >
                <?php thePrev($this); ?>
                <?php theNext($this); ?>
			</div >
		</div >
	</div >
<?php else: ?>
<?php endif; ?>
<?php $this->need('footer.php'); ?>
