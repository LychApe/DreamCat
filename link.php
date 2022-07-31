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
<div class="mdui-container-fluid Dreamcat-appimgbar" style="height: 285px; background-image: url(https://s1.328888.xyz/2022/07/20/lirAS.jpg);">
<div class="mdui-appbar mdui-shadow-0">
<div class="mdui-toolbar">
        <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white " mdui-drawer="{target: '#main-drawer', swipe: true}">
            <i class="mdui-icon material-icons" style="color: #f1f3f4;">menu</i>
        </span>
    <div class="mdui-toolbar-spacer"></div>
        <a href="javascript:;" class="mdui-btn mdui-btn-icon mdui-hidden-md-up">
          <i class="mdui-icon material-icons" style="color: #f1f3f4;">search</i>
        </a>
        <a href="javascript:;" class="mdui-btn mdui-btn-icon">
          <i class="mdui-icon material-icons" style="color: #f1f3f4;">refresh</i>
        </a>
</div>
        <div class="mdui-container">
            <div class="mdui-valign">
    		<h1 class="title mdui-center" style="color: #ffffffe3;"><?php $this->title() ?></h1>
    		</div>
        </div>
</div>
</div>



<div class="mdui-container">
<div class="mdui-container">
    <div class="mdui-card DreamCat-card-1" style="margin-top: -6.5%;">
        <div class="mdui-card-content">
            
				<div class="mdui-typo mdui-container">
					<br/>
					<div class="mdui-row-sm-1 mdui-row-md-3 mdui-row-lg-4 mdui-row-xl-5">
						<?php $this->content(); ?>
					</div>
					<br/>
				</div>
         <br/>


            
        </div>

    </div>
</div>
<br/>
<div class="mdui-container">
<?php $this->need('comments.php'); ?>
</div>
</div>

<?php
	if (Typecho_Widget::widget('Widget_Stat')->publishedPostsNum > 1):
		?>
		
		<br/>
		<br/>
		</div>
		<style>
			.doc-footer-nav-left {
				text-align: left;
			}

			.doc-footer-nav-right {
				text-align: right;
			}

			.doc-footer-nav {
				height: 96px;
			}

			.doc-footer-nav-left .doc-footer-nav-chapter {
				margin-left: 34px;
			}

			.doc-footer-nav-text .doc-footer-nav-direction {
				font-size: 15px;
				line-height: 18px;
				margin-bottom: 1px;
				opacity: 0.55;
			}

			.doc-footer-nav-text {
				box-sizing: border-box;
				display: inline-block;
				font-size: 20px;
				font-weight: 500;
				-webkit-font-smoothing: antialiased;
				height: 100%;
				line-height: 24px;
				padding-top: 24px;
				width: 100%;
			}

			.doc-footer-nav-left, .doc-footer-nav-right {
				height: 96px;
			}

			.doc-footer-nav-left .mdui-icon {
				float: left;
				margin-right: 10px;
			}

			.doc-footer-nav-right .mdui-icon {
				float: right;
				margin-left: 10px;
			}

			.doc-footer-nav-text .mdui-icon {
				padding-top: 23px;
				width: 24px;
			}
		</style>
		<div class="doc-footer-nav mdui-color-grey-50">
			<div class="mdui-container">
				<div class="mdui-row">
					<?php thePrev($this); ?>
					<?php theNext($this); ?>
				</div>
			</div>
		</div>
	<?php else: ?>
	
	<?php endif; ?>


<?php $this->need('footer.php'); ?>