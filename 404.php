<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<style>
.indo-404 {
	text-align:center
}

</style>
	<div class="mdui-color-theme mdui-typo-display-3">
		<div class="indo-404"
        <span>404<span class="mdui-404"><?php _e('<br>这个页面不见了?');?></span></span>
        </div>
	</div>

<div class="mdui-divider"></div>
<div class="mdui-row mdui-color-white">
	<a href="<?php $this->options->siteUrl(); ?>"
		<button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple col-mb-13 mdui-col-md-1 mdui-col-offset-md-3">返回首页</button>
	</a>
	<a href="<?php $this->options->siteUrl(); ?>"
		<button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple col-mb-13 mdui-col-md-1 mdui-col-offset-md-3">返回上一页</button>
	</a>
</div>


    </div><!-- end #content-->
	<?php $this->need('footer.php'); ?>
