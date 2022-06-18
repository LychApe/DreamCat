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
	.mdui-theme-accent-pink .mdui-typo a {
		color: #212121;
	}

	.mdui-typo a {
		display: inline;
	}
</style>
<div class="mdui-container-fluid" style="padding-left: 0px; padding-right: 0px;">
	<div id="body">
		<div class="container">
			<div class="row">
				<div class="mdui-container">
					<div class="mdui-valign mdui-typo" itemprop="name headline">
						<h1 itemprop="url" href="<?php $this->permalink() ?>" class="mdui-center">
							<?php $this->title() ?>
						</h1>
					</div>
					<br/>
					<div class="mdui-typo mdui-container">
						<br/>
						<div class="mdui-col-sm-3">
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