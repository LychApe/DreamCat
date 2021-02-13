<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-container-fluid">
    <div class="mdui-color-theme mdui-row DreamCat-content-header">
        <div class="mdui-container fade-scale in">
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<div class="mdui-typo-display-3">
				<div class="mdui-center">
		        	<span>
						404 <span class="mdui-404">这个页面不见了?</span>
					</span>
		        </div>
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<div class="mdui-row mdui-center">
				<a href="<?php $this->options->siteUrl(); ?>">
					<button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple">返回首页</button>
				</a>
				<a onclick="javascript :history.back(-1);">
					<button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple">返回上一页</button>
				</a>
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
