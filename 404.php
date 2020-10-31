<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<style>
.indo-404 {
	text-align:center
}
.DreamCat-content-header {
    min-height: 50px;
    margin-left: -240px;
    padding: 10px 16px 48px 256px;
    color: #fff;
    background-color: #3f51b5;
    text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
</style>
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
				<div class="indo-404">
		        <span>404<span class="mdui-404"><?php _e('<br>这个页面不见了?');?></span></span>
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
			<div class="mdui-row indo-404">
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
    



    </div><!-- end #content-->
	<?php $this->need('footer.php'); ?>
