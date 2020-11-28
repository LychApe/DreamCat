<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<style>
.img{
    width: 100%;
}
</style>
<div class="mdui-container">

	<div class="mdui-valign mdui-typo" itemprop="name headline">
	  <h1 itemprop="url" href="<?php $this->permalink() ?>" class="mdui-center"><?php $this->title() ?></h1>
	</div>
	<br/>
	<div class="mdui-typo mdui-container">
		<?php $this->content(); ?>
	</div>
	<br/>
    <?php $this->need('comments.php'); ?>
    <br/>
    <br/>
</div>


<?php #$this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
