<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-container-fluid" >
	<div class="mdui-row DreamCat-content-header" >
		<div class="mdui-container" >
			<h1 class="dreamcat-title title" >
				页面未找到
			</h1 >
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

<div class="mdui-container fade-scale in">
    <div class="mdui-typo-display-3">
        <div class="mdui-center">
            <img src="<?php CustomCDN_FAM('DreamCat_StaticResources/img/', '', 'img/404.svg', '404.svg'); ?>" alt="404 image" class="mdui-img-fluid">
        </div>
    </div>
</div>

<div class="mdui-container" >
	<div class="mdui-valign" >
		<div class="mdui-row mdui-center" >
			<a href="<?php $this->options->siteUrl(); ?>" style="text-decoration: none;" >
				<button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple"
				        style="background-color: #3f51b5!important;" >返回首页
				</button >
			</a >
			<a onclick="history.back(-1);" >
				<button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple"
				        style="background-color: #3f51b5!important;" >返回上一页
				</button >
			</a >
		</div >
	</div >
</div >


<?php $this->need('footer.php'); ?>
