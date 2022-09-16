<?php
	/**
	 * 友链模板
	 *
	 * @package custom
	 */
	if (!defined('__TYPECHO_ROOT_DIR__')) exit;
	$this->need('header.php');
?>
<style>

</style>
<div class="mdui-container-fluid" style="padding-left: 0px; padding-right: 0px;">
	<div id="body">
		<div class="container">
			<div class="row">
				<div class="mdui-container">
					<div class="mdui-valign" itemprop="name headline">
						<h1 itemprop="url" href="<?php $this->permalink() ?>" class="mdui-center">
							<?php $this->title() ?>
						</h1>
					</div>
					<br/>
					<div class="page-content mdui-container">
						<br/>
						<div class="mdui-row-sm-1 mdui-row-md-3 mdui-row-lg-4 mdui-row-xl-5">
							<?php $this->content(); ?>
						</div>
						<br/>
					</div>
					<br/>
					<?php $this->need('comments.php'); ?>
					<br/>
					<br/>
				</div>
				<?php $this->need('footer.php'); ?>
			</div><!-- end .row -->
		</div>
	</div><!-- end #body -->