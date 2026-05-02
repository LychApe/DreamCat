<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
$dreamcatPrimaryColor = 'indigo';
$dreamcatAccentColor = 'pink';
$dreamcatPrimaryHex = dreamcatThemeColorHex('primary', $dreamcatPrimaryColor);
$dreamcatAccentHex = dreamcatThemeColorHex('accent', $dreamcatAccentColor);
?>
<!DOCTYPE HTML>
<html >
<!--
+--------------------------------------------------
| ____  ____  ____    __    __  __  ___    __   ____ 
|(  _ \(  _ \( ___)  /__\  (  \/  )/ __)  /__\ (_  _)
| )(_) ))   / )__)  /(__)\  )    (( (__  /(__)\  )(  
|(____/(_)\_)(____)(__)(__)(_/\/\_)\___)(__)(__)(__) 
|                                                    
+--------------------------------------------------
| Design: HanFengA7
| Edition：X3.0
+--------------------------------------------------
-->

<head >
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="x-dns-prefetch-control" content="on" >
	<meta charset="<?php $this->options->charset(); ?>" >
	<meta name="renderer" content="webkit" >
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" >
	<script>
		(function () {
			try {
				var theme = JSON.parse(localStorage.getItem('dreamcat-theme-settings')) || {};
				var root = document.documentElement;
				var primaryColors = {amber: '#FFC107', blue: '#2196F3', 'blue-grey': '#607D8B', brown: '#795548', cyan: '#00BCD4', 'deep-orange': '#FF5722', 'deep-purple': '#673AB7', green: '#4CAF50', grey: '#9E9E9E', indigo: '#3F51B5', 'light-blue': '#03A9F4', 'light-green': '#8BC34A', lime: '#CDDC39', orange: '#FF9800', pink: '#E91E63', purple: '#9C27B0', red: '#F44336', teal: '#009688', yellow: '#FFEB3B'};
				var accentColors = {amber: '#FFC400', blue: '#448AFF', cyan: '#18FFFF', 'deep-orange': '#FF6E40', 'deep-purple': '#7C4DFF', green: '#69F0AE', indigo: '#536DFE', 'light-blue': '#40C4FF', 'light-green': '#B2FF59', lime: '#EEFF41', orange: '#FFAB40', pink: '#FF4081', purple: '#E040FB', red: '#FF5252', teal: '#64FFDA', yellow: '#FFFF00'};
				if (theme.primary && primaryColors[theme.primary]) root.style.setProperty('--dreamcat-theme-primary', primaryColors[theme.primary]);
				if (theme.accent && accentColors[theme.accent]) root.style.setProperty('--dreamcat-theme-accent', accentColors[theme.accent]);
			} catch (e) {}
		})();
	</script>
	<title >
        <?php $this->archiveTitle([
            'category' => _t('分类：%s'),
            'search' => _t('搜索结果：%s'),
            'tag' => _t('标签：%s'),
            'author' => _t('作者：%s'),
            'date' => _t('归档：%s')
        ], '', ' - ') . $this->options->DC_WebName(); ?>
	</title >
	<!-- 使用url函数转换相关路径 -->
	<link rel="shortcut icon" href="<?php echo($this->options->DC_WebFavicon()); ?>" type="image/x-icon" />
	<link rel="stylesheet"
	      href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/mdui.min.css', 'mdui.min.css'); ?>" >
	<link rel="stylesheet"
	      href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/md2.css', 'md2.css'); ?>" >
	<link rel="stylesheet"
	      href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/dreamcat.css', 'dreamcat.css'); ?>" >
	<link rel="stylesheet"
	      href="<?php CustomCDN_FAM('DreamCat_StaticResources/icons/iconfont/', '', 'icons/iconfont/iconfont.css', 'iconfont.css'); ?>" >
	<link rel="stylesheet"
	      href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/atom-one-light.min.css', 'atom-one-light.min.css'); ?>" >
	<!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header('commentReply='); ?>

	<style >
		:root {
			--dreamcat-theme-primary: <?php echo $dreamcatPrimaryHex; ?>;
			--dreamcat-theme-accent: <?php echo $dreamcatAccentHex; ?>;
			--dreamcat-body-bg: #fcfcfc;
			--dreamcat-surface-bg: #ffffff;
			--dreamcat-surface-muted: #f5f5f5;
			--dreamcat-soft-bg: #eef2f5;
			--dreamcat-text-primary: #212121;
			--dreamcat-text-secondary: rgba(0, 0, 0, .62);
			--dreamcat-border-color: #eeeeee;
		}

		.dreamcat-night-mode {
			--dreamcat-body-bg: #121212;
			--dreamcat-surface-bg: #1e1e1e;
			--dreamcat-surface-muted: #242424;
			--dreamcat-soft-bg: #242a32;
			--dreamcat-text-primary: rgba(255, 255, 255, .88);
			--dreamcat-text-secondary: rgba(255, 255, 255, .64);
			--dreamcat-border-color: rgba(255, 255, 255, .12);
		}

		@media (prefers-color-scheme: dark) {
			.dreamcat-night-mode-auto {
				--dreamcat-body-bg: #121212;
				--dreamcat-surface-bg: #1e1e1e;
				--dreamcat-surface-muted: #242424;
				--dreamcat-soft-bg: #242a32;
				--dreamcat-text-primary: rgba(255, 255, 255, .88);
				--dreamcat-text-secondary: rgba(255, 255, 255, .64);
				--dreamcat-border-color: rgba(255, 255, 255, .12);
			}
		}

		@font-face {
			font-family: CustomFont;
			src: url(<?php CustomFont_url();?>);
		}

		body {
			font-family: CustomFont, serif;
			background-color: var(--dreamcat-body-bg);
			color: var(--dreamcat-text-primary);
		}

		.dreamcat-img-header {
			background-size: cover;
			width: 100%;
			top: 0;
			position: absolute;
			z-index: -1;
		}

		.dreamcat-img-header-wrapper {
			margin-bottom: 8rem;
		}

		.mdui-container-fluid + .dreamcat-img-header-wrapper,
		.mdui-container-fluid + .dreamcat-img-header-wrapper + .dreamcat-img-header-wrapper {
			height: 0;
			margin-bottom: 0;
			overflow: hidden;
		}

		.dreamcat-img-header-index {
		<?php
            $mod=$this->options->DC_NavigationBarModeRadio;
		    if (!empty($mod) && $mod == 'ImgMode') {
		        $url=$this->options->DC_AppImgBarUrl;
		        if (empty($url)) {
		            $url=defaultBackgroundImage();
		        }
		        echo "background-image: url($url)!important;\n";
		    } else {
		        $color=$this->options->DC_AppImgBarColor;
		        if(empty($color)){
		            $color=$dreamcatPrimaryHex;
		        }
		        echo "background-color: $color!important;\n";
		    }

        ?>
		}

		.dreamcat-img-header-post {
			height: 512px;
			background-image: url(
		<?php
	        $post_img = $this->fields->User_ImageUrl_TF;
	        if (!empty($post_img)) {
				echo $post_img;
	        } else {
				// output part inside the function
	            CustomCDN_FAM('DreamCat_StaticResources/img/', '', 'img/post_bj.jpg', 'post_bj.jpg');
	        }
        ?>
			);
		}

		<?php
        $sm_height=$this->options->DC_AppImgBarHeight_PE;
        if (empty($sm_height)) {
            $sm_height=400;
        }
	    $md_height=$this->options->DC_NavigationBarHeight;
	    if (empty($md_height)) {
	        $md_height=300;
	    }

        echo <<<EOF
		.dreamcat-img-header-md { height:${md_height}px; }
		.dreamcat-img-header-sm { height:${sm_height}px; }

EOF;
        ?>

		<?php $this->options->DC_WebCustomStyle();?>
	</style >
</head >

<body class="mdui-drawer-body mdui-theme-primary-<?php echo $dreamcatPrimaryColor; ?> mdui-theme-accent-<?php echo $dreamcatAccentColor; ?>" >
<script>
	(function () {
		try {
			var theme = JSON.parse(localStorage.getItem('dreamcat-theme-settings')) || {};
			var body = document.body;
			var primaryColors = {amber: 1, blue: 1, 'blue-grey': 1, brown: 1, cyan: 1, 'deep-orange': 1, 'deep-purple': 1, green: 1, grey: 1, indigo: 1, 'light-blue': 1, 'light-green': 1, lime: 1, orange: 1, pink: 1, purple: 1, red: 1, teal: 1, yellow: 1};
			var accentColors = {amber: 1, blue: 1, cyan: 1, 'deep-orange': 1, 'deep-purple': 1, green: 1, indigo: 1, 'light-blue': 1, 'light-green': 1, lime: 1, orange: 1, pink: 1, purple: 1, red: 1, teal: 1, yellow: 1};
			var replaceClass = function (prefix, value) {
				body.className = body.className.split(/\s+/).filter(function (className) {
					return className && className.indexOf(prefix) !== 0;
				}).concat(prefix + value).join(' ');
			};
			if (theme.primary && primaryColors[theme.primary]) replaceClass('mdui-theme-primary-', theme.primary);
			if (theme.accent && accentColors[theme.accent]) replaceClass('mdui-theme-accent-', theme.accent);
			if (theme.mode === 'DarkMode') body.classList.add('mdui-theme-layout-dark', 'dreamcat-night-mode');
			if (theme.mode === 'AutoMode') body.classList.add('mdui-theme-layout-auto', 'dreamcat-night-mode-auto');
		} catch (e) {}
	})();
</script>

<header >
	<div class="mc-drawer mdui-drawer mdui-drawer-close dreamcat-drawer" id="main-drawer" >
		<div class="mdui-list dreamcat-drawer-list" mdui-collapse="{accordion: true}" >
			<!-- 首页 -->
			<a href="<?php $this->options->siteUrl() ?>" >
				<li class="mdui-list-item mdui-ripple" >
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text" >near_me</i >
					<div class="mdui-list-item-content" >首页</div >
				</li >
			</a >
			<!-- 归档 -->
			<div class="mdui-collapse-item mdui-collapse-item-dense" >
				<div class="mdui-collapse-item-header mdui-list-item" >
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text" >inbox</i >
					<div class="mdui-list-item-content mdui-text-color-theme-text" >归档</div >
					<i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text" >keyboard_arrow_down</i >
				</div >
				<div class="mdui-collapse-item-body" >
					<ul class="mdui-list mdui-list-dense" >
                        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse(
                            '<li class="mdui-list-item mdui-ripple" ><a href="{permalink}" class="mdui-list-item-content mdui-text-color-theme-text">{date}</a></li>'
                        ); ?>
					</ul >
				</div >
			</div >
			<!-- 分类 -->
			<div class="mdui-collapse-item mdui-collapse-item-dense" >
				<div class="mdui-collapse-item-header mdui-list-item" >
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text" >view_week</i >
					<div class="mdui-list-item-content mdui-text-color-theme-text" >分类</div >
					<i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text" >keyboard_arrow_down</i >
				</div >
				<div class="mdui-collapse-item-body" >
					<ul class="mdui-list mdui-list-dense" for="show-category-button" >
                        <?php $category = null;
                        $this->widget('Widget_Metas_Category_List')->to($category); ?>
                        <?php while ($category->next()): ?>
							<li class="mdui-list-item mdui-ripple" >
								<a href="<?php $category->permalink(); ?>"
								   class="mdui-list-item-content mdui-text-color-theme-text"
								   title="<?php $category->name(); ?>" >
                                    <?php $category->name(); ?>
								</a >
							</li >

                        <?php endwhile; ?>
					</ul >
				</div >
			</div >
			<!-- 页面 -->
			<div class="mdui-collapse-item mdui-collapse-item-dense" >
				<div class="mdui-collapse-item-header mdui-list-item" >
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text" >layers</i >
					<div class="mdui-list-item-content mdui-text-color-theme-text" >页面</div >
					<i
							class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text" >keyboard_arrow_down</i >
				</div >
				<div class="mdui-collapse-item-body" >
					<ul class="mdui-list mdui-list-dense" for="show-category-button" >
                        <?php
                        $pages = $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while ($pages->next()): ?>
							<li class="mdui-list-item mdui-ripple" >
								<a href="<?php $pages->permalink(); ?>"
								   class="mdui-list-item-content mdui-text-color-theme-text"
								   title="<?php $pages->title(); ?>" >
                                    <?php $pages->title(); ?>
								</a >
							</li >
                        <?php endwhile; ?>
					</ul >
				</div >
			</div >
			<!-- Login -->
            <?php if (!empty($this->options->DC_LoginIconRadio == 'TureMode')): ?>
                <?php if ($this->user->hasLogin()): ?>
					<a href="<?php echo $this->options->siteUrl ?>./admin" >
						<li class="mdui-list-item mdui-ripple" >
							<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text" >account_box</i >
							<div class="mdui-list-item-content" >后台</div >
						</li >
					</a >
                <?php else: ?>
					<a href="<?php echo $this->options->siteUrl ?>./admin" >
						<li class="mdui-list-item mdui-ripple" >
							<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text" >&#xe853;</i >
							<div class="mdui-list-item-content" >登录</div >
						</li >
					</a >
                <?php endif; ?>
            <?php endif; ?>
			<!-- RSS -->
            <?php if (is_array($this->options->DC_GlobalApp) && in_array('DCShowRSS', $this->options->DC_GlobalApp)): ?>
				<a href="<?php $this->options->feedUrl(); ?>" >
					<li class="mdui-list-item mdui-ripple" >
						<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text" >rss_feed</i >
						<div class="mdui-list-item-content" >RSS</div >
					</li >
				</a >
            <?php endif; ?>
			<div class="mdui-divider" ></div >
			<div >
				<a >
					<li class="mdui-list-item" >
						<i
								class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text" >description</i >
						<span class="mdui-list-item-content mdui-text-color-theme-text" >文章</span >
						<div class="mdui-chip" >
                            <span class="mdui-chip-title" ><?php $stat = null;
                                Typecho_Widget::widget('Widget_Stat')->to($stat);
                                $stat->publishedPostsNum() ?></span >
						</div >
					</li >
				</a >
			</div >
			<div >
				<a >
					<li class="mdui-list-item" >
						<i
								class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text" >textsms</i >
						<span class="mdui-list-item-content mdui-text-color-theme-text" >评论</span >
						<div class="mdui-chip" >
							<span class="mdui-chip-title" ><?php $stat->publishedCommentsNum() ?></span >
						</div >
					</li >
				</a >
			</div >
		</div >
		<div class="copyright" >
			<p >Theme: <a mdui-dialog="{target:'#About_DreamCat'}" >DreamCat</a ></p >
		</div >
	</div >
</header >


<div class="mdui-dialog" id="About_DreamCat" >
	<div class="mdui-dialog-title" >关于 DreamCat</div >
	<div class="mdui-dialog-content" style="height: 219px;" >
		<blockquote >
			<div class="mdui-typo" >
				<p >主题名称：<a href="https://dreamcat.lychape.cn" target="_blank" >DreamCat</a > | 版本：<a
							href="https://github.com/LychApe/DreamCat"
							target="_blank" ><?php echo(themeVersion()); ?></a ></p >
				<p >主题开发：<a href="https://github.com/HanFengA7" target="_blank" >HanFengA7</a > | <a
							href="https://github.com/CornWorld" target="_blank" >CornWorld</a >
				</p >
				<p >Designed by <a href="https://www.hanfenga7.cn/" style="text-decoration: none" >HanFengA7</a > Power
				    by
					<a href="https://typecho.org/" style="text-decoration: none" >Typecho</a >
				</p >
				<p >Copyright © 2015-<?php echo date('Y'); ?> by <a href="https://lychape.cn"
				                                                    target="_blank" >LychApe</a > All rights reserved!
				</p >
			</div >
		</blockquote >
		<div class="mdui-dialog-actions" >
			<button class="mdui-btn mdui-ripple" mdui-dialog-close >知 道 啦 !</button >
		</div >
	</div >
</div >

<div class="mdui-container" >
	<div class="mdui-dialog" id="search-1" >
		<div class="mdui-dialog-content" >
			<form method="post" action="" >
				<div class="mdui-textfield" >
					<label >
						<input class="mdui-textfield-input" type="text" name="s" placeholder="输入关键词进行搜索" />
					</label >
				</div >
			</form >
		</div >
	</div >
</div >

<div class="mdui-appbar mdui-shadow-0 " >
	<div class="mdui-toolbar" >
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
                  mdui-drawer="{target: '#main-drawer', swipe: true}" >
                <i class="mdui-icon material-icons dreamcat-icon-white" >menu</i >
            </span >
		<div class="mdui-toolbar-spacer" ></div >
		<button mdui-dialog="{target: '#search-1'}" class="mdui-btn mdui-btn-icon mdui-hidden-md-up" >
			<i class="mdui-icon material-icons dreamcat-icon-white" >search</i >
		</button >
		<button mdui-dialog="{target: '#dreamcat-theme-dialog'}" class="mdui-btn mdui-btn-icon" title="外观设置" >
			<i class="mdui-icon material-icons dreamcat-icon-white" >palette</i >
		</button >
		<a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon" >
			<i class="mdui-icon material-icons dreamcat-icon-white" >refresh</i >
		</a >
	</div >
</div >

<div class="mdui-dialog dreamcat-theme-dialog" id="dreamcat-theme-dialog" >
	<div class="mdui-dialog-title" >外观设置</div >
	<div class="mdui-dialog-content" >
		<div class="dreamcat-theme-panel" >
			<div class="dreamcat-theme-section" >
				<div class="dreamcat-theme-section-title" >主题色</div >
				<div class="dreamcat-theme-options" >
                    <?php foreach (dreamcatThemePrimaryColorOptions() as $color => $label): ?>
						<button type="button" class="dreamcat-theme-option" data-dreamcat-theme-primary="<?php echo $color; ?>" style="--dreamcat-option-color: <?php echo dreamcatThemeColorHex('primary', $color); ?>;" >
							<span class="dreamcat-theme-dot" ></span >
							<span ><?php echo $label; ?></span >
						</button >
                    <?php endforeach; ?>
				</div >
			</div >

			<div class="dreamcat-theme-section" >
				<div class="dreamcat-theme-section-title" >强调色</div >
				<div class="dreamcat-theme-options" >
                    <?php foreach (dreamcatThemeAccentColorOptions() as $color => $label): ?>
						<button type="button" class="dreamcat-theme-option" data-dreamcat-theme-accent="<?php echo $color; ?>" style="--dreamcat-option-color: <?php echo dreamcatThemeColorHex('accent', $color); ?>;" >
							<span class="dreamcat-theme-dot" ></span >
							<span ><?php echo $label; ?></span >
						</button >
                    <?php endforeach; ?>
				</div >
			</div >

			<div class="dreamcat-theme-section" >
				<div class="dreamcat-theme-section-title" >夜间模式</div >
				<div class="dreamcat-theme-options dreamcat-theme-options-compact" >
                    <?php foreach (dreamcatNightModeOptions() as $mode => $label): ?>
						<button type="button" class="dreamcat-theme-option" data-dreamcat-theme-mode="<?php echo $mode; ?>" ><?php echo $label; ?></button >
                    <?php endforeach; ?>
				</div >
			</div >
		</div >
	</div >
	<div class="mdui-dialog-actions" >
		<button class="mdui-btn mdui-ripple" id="dreamcat-theme-reset" type="button" >恢复默认</button >
		<button class="mdui-btn mdui-ripple" mdui-dialog-confirm >完成</button >
	</div >
</div >
