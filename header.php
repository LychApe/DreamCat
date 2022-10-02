<?php
	/**
	 * DreamCat   是一个极简自适应博客主题,年轻人追梦的必备良品!
	 *
	 * @package DreamCat
	 * @author LychApe
	 * @version 2.8.221001(LTS)
	 * @link https://github.com/LychApe/DreamCat
	 */
	
	if (!defined('__TYPECHO_ROOT_DIR__')) exit;
	#ini_set("error_reporting","E_ALL & ~E_NOTICE");
	#header("Content-Security-Policy: upgrade-insecure-requests");
?>
<!DOCTYPE HTML>
<html class="no-js" lang="zh">
<head>
<title><?php $this->archiveTitle(array(
								'category' => _t('分类 %s 下的文章'),
								'search' => _t('包含关键字 %s 的文章'),
								'tag' => _t('标签 %s 下的文章'),
								'author' => _t('%s 发布的文章')
						), '', ' - '); ?><?php $this->options->title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta charset="<?php $this->options->charset(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="force-rendering" content="webkit"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="x-dns-prefetch-control" content="on">
<?php $this->header('commentReply='); ?>
<?php if (Helper::options()->CustomCdn != 'LocalMode' or ''): ?>
<link rel="dns-prefetch" href="//npm.sourcegcdn.com"/>
<?php endif; ?>
<link rel="shortcut icon" href="<?php $this->options->Favicon(); ?>" type="image/x-icon" />
<link rel="stylesheet preload" href="<?php CustomCDN_FAM('mdui@1.0.2/dist/','mdui/1.0.2/','css/mdui.min.css','css/mdui.min.css'); ?>" as="style">
<link rel="stylesheet preload" href="<?php CustomCDN_url('css/style.css'); ?>" as="style"/>
<link rel="stylesheet preload" href="<?php CustomCDN_url('css/md2.css'); ?>" as="style"/>
<link rel="stylesheet" href="//cdnjs.sourcegcdn.com/ajax/libs/highlight.js/11.6.0/styles/atom-one-light.min.css">
<script rel="preload" src="<?php CustomCDN_FAM('mdui@1.0.2/dist/','mdui/1.0.2/','js/mdui.min.js','js/mdui.min.js'); ?>" is="script"></script>
<script rel="preload" src="<?php CustomCDN_FAM('smooth-scroll@16.1.2/dist/','smooth-scroll/16.1.2','js/smooth-scroll.min.js','smooth-scroll.min.js'); ?>" is="script"></script>
<script rel="preload" src="<?php CustomCDN_url('js/alifont_2359325_loysvemas8m.js'); ?>" is="script"></script>
<script src="<?php CustomCDN_url('js/preloadjs.min.js'); ?>"></script>
<!--[if IE]><script src="<?php CustomCDN_url('js/html5.min.js'); ?>"></script><![endif]-->
<style>
@font-face {
	font-family: CustomFont;
	src: url(<?php CustomFont_url(); ?>);
}
body {
	font-family: CustomFont, serif;
}
<?php $this->options->CustomizeGlobalCss(); ?>
</style>
</head>


<body class="mdui-drawer-body-left mdui-theme-primary-indigo mdui-theme-accent-pink mdui-color-grey-100">
<script src="<?php echo($this->options->rootUrl . '/usr/themes/DreamCat/DreamCat_StaticResources/js/fly-engine.js');?>" type="module"></script>


<header>
	<div class="mc-drawer mdui-drawer mdui-color-grey-50"
		 style="background: linear-gradient(135deg,#ECEFF1 0,#FAFAFA 60%);" id="main-drawer">
		<div class="mdui-list DreamCat-List-01" mdui-collapse="{accordion: true}" style="margin-bottom: 50%;">
			<div class="mdui-card DreamCat-List-02" style="overflow: inherit;">
				<?php if (!empty($this->options->CustomPicture1)): ?>
				<div class="DreamCat-menu-bg" style="background: url(<?php $this->options->CustomPicture1(); ?>);">
					<?php else: ?>
					<div class="DreamCat-menu-bg" style="background: url(<?php CustomCDN_url('img/brand.jpg'); ?>);">
						<?php endif; ?>
						<?php if (!empty($this->options->logoUrl)): ?>
							<div class="Logo_centered">
								<img class="DreamCat-List-headimg mdui-shadow-6"
									 src="<?php $this->options->logoUrl() ?>" 
									 style="margin-top: 40px;">
							</div>
						<?php else: ?>
							<div class="Logo_centered">
								<img class="DreamCat-List-headimg mdui-shadow-6"
									 src="<?php CustomCDN_url('img/default-avatar.png') ?>" style="margin-top: 40px;"
									 alt="">
							</div>
						<?php endif; ?>
						<div class="mdui-card-media-covered">
							<div class="mdui-card-primary">
								<div class="mdui-valig">
									<div class="DreamCat-menu-author mdui-center"
										 style="font-weight: 400;text-align: center;">
										<?php $this->options->title(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- 首页 -->
				<a href="/">
					<li class="mdui-list-item mdui-ripple" style="margin-top: 8px;">
						<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">near_me</i>
						<div class="mdui-list-item-content">首&nbsp;&nbsp;页</div>
					</li>
				</a>
				<!-- 归档 -->
				<div class="mdui-collapse-item mdui-collapse-item-dense">
					<div class="mdui-collapse-item-header mdui-list-item">
						<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">inbox</i>
						<div class="mdui-list-item-content mdui-text-color-theme-text">归&nbsp;&nbsp;档</div>
						<i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
					</div>
					<div class="mdui-collapse-item-body" style="">
						<ul class="mdui-list mdui-list-dense">
							<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse(
									'<li class="mdui-list-item mdui-ripple" ><a href="{permalink}" class="mdui-list-item-content mdui-text-color-theme-text">{date}</a></li>'
							); ?>
						</ul>
					</div>
				</div>
				<!-- 分类 -->
				<div class="mdui-collapse-item mdui-collapse-item-dense">
					<div class="mdui-collapse-item-header mdui-list-item">
						<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">view_week</i>
						<div class="mdui-list-item-content mdui-text-color-theme-text">分&nbsp;&nbsp;类</div>
						<i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
					</div>
					<div class="mdui-collapse-item-body" style="">
						<ul class="mdui-list mdui-list-dense" for="show-category-button">
							<?php $category = null;
								$this->widget('Widget_Metas_Category_List')->to($category); ?>
							<?php while ($category->next()): ?>
							<?php $children = $category->getAllChildren($category->mid)?>
							    <?php if ($category->levels == 0 && !empty($children)):?>
                                    <ul class="mdui-list" mdui-collapse="{accordion: true}" style="max-width: 360px;">
                                          <li class="mdui-collapse-item mdui-collapse-item-dense">
                                            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                                              <div class="mdui-list-item-content"><?php $category->name();?></div>
                                              <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                                            </div>
                                            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                                            
                                    <?php 
                                    foreach ($children as $mid){
                                            $child = $category->getCategory($mid);
                                            $childCategoryHtml = '<li class="mdui-list-item mdui-ripple"><a href="'.$child['permalink'].'"class="mdui-list-item-content mdui-text-color-theme-text"title="'.$child['name'].'">'.$child['name'].'</a></li>';
                                            echo $childCategoryHtml;
                                        }
                                        
                                    ?>
                                            </li>
                                            </ul>
                                          </li>
                                    </ul>
								<?php elseif($category->levels == 0):?>
								<li class="mdui-list-item mdui-ripple">
									<a href="<?php $category->permalink(); ?>"
									   class="mdui-list-item-content mdui-text-color-theme-text"
									   title="<?php $category->name(); ?>">
                                    <?php $category->name(); ?>
									</a>
								</li>
								<?php endif?>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
				<!-- 页面 -->
				<div class="mdui-collapse-item mdui-collapse-item-dense">
					<div class="mdui-collapse-item-header mdui-list-item">
						<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">layers</i>
						<div class="mdui-list-item-content mdui-text-color-theme-text">页&nbsp;&nbsp;面</div>
						<i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text">keyboard_arrow_down</i>
					</div>
					<div class="mdui-collapse-item-body" style="">
						<ul class="mdui-list mdui-list-dense" for="show-category-button">
							<?php $pages = null;
								$this->widget('Widget_Contents_Page_List')->to($pages); ?>
							<?php while ($pages->next()): ?>
								<li class="mdui-list-item mdui-ripple">
									<a href="<?php $pages->permalink(); ?>"
									   class="mdui-list-item-content mdui-text-color-theme-text"
									   title="<?php $pages->title(); ?>">
										<?php $pages->title(); ?>
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
				<!-- RSS -->
				<a href="<?php $this->options->feedUrl(); ?>">
					<li class="mdui-list-item mdui-ripple">
						<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">rss_feed</i>
						<div class="mdui-list-item-content">R&nbsp;S&nbsp;S</div>
					</li>
				</a>
				<div class="mdui-divider"></div>
				<div>
					<a>
						<li class="mdui-list-item">
							<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">description</i>
							<span class="mdui-list-item-content mdui-text-color-theme-text">文&nbsp;&nbsp;章</span>
							<div class="mdui-chip">
								<span class="mdui-chip-title"><?php $stat = null;
										Typecho_Widget::widget('Widget_Stat')->to($stat);
										$stat->publishedPostsNum() ?></span>
							</div>
						</li>
					</a>
				</div>
				<div>
					<a>
						<li class="mdui-list-item">
							<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">textsms</i>
							<span class="mdui-list-item-content mdui-text-color-theme-text">评&nbsp;&nbsp;论</span>
							<div class="mdui-chip">
								<span class="mdui-chip-title"><?php $stat->publishedCommentsNum() ?></span>
							</div>
						</li>
					</a>
				</div>
			</div>
            <div class="copyright">
                <p>Theme: <a mdui-dialog="{target:'#About_DreamCat'}">DreamCat</a></p>
            </div>
		</div>
</header>


<div class="mdui-container-fluid" style="padding-left: 0; padding-right: 0;">
	<div class="mdui-appbar mdui-shadow-0">
		<div class="mdui-toolbar mdui-color-indigo">
			<span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
				  mdui-drawer="{target: '#main-drawer', swipe: true}"><i
						class="mdui-icon material-icons">menu</i></span>
			<a href="/" class="mdui-typo-headline mdui-hidden-xs"><?php #$this->options->title(); ?></a>
			<a href="" class="mdui-typo-title"><?php #$this->archiveTitle(); ?></a>
			<div class="mdui-toolbar-spacer"></div>
			<a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon">
				<i class="mdui-icon material-icons">refresh</i>
			</a>
		</div>
	</div>
</div>
<div class="mdui-container">
	<div class="mdui-dialog" id="search-1">
		<div class="mdui-dialog-content">
			<form method="post" action="">
				<div class="mdui-textfield">
					<label>
						<input class="mdui-textfield-input" type="text" name="s" placeholder="输入关键词进行搜索"/>
					</label>
				</div>
			</form>
		</div>
	</div>
</div>