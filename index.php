<?php
/**
 * DreamCat   是一个极简自适应博客主题,年轻人追梦的必备良品!
 *
 * @package DreamCat
 * @author LychApe
 * @version X3.0.230204 (Dev-InsiderPreview)
 * @link https://github.com/LychApe/DreamCat
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>


<!--PC HeaderUI Start-->
<div class="mdui-hidden-sm-down">
    <div class="mdui-container-fluid" style="transform: translateY(100%)">
        <div class="mdui-appbar mdui-shadow-0" style="height: 0;">
            <div class="mdui-toolbar">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
                  mdui-drawer="{target: '#main-drawer', swipe: true}">
                <i class="mdui-icon material-icons" style="color: #f1f3f4">menu</i>
            </span>
                <div class="mdui-toolbar-spacer"></div>
                <button mdui-dialog="{target: '#search-1'}" class="mdui-btn mdui-btn-icon mdui-hidden-md-up">
                    <i class="mdui-icon material-icons" style="color: #f1f3f4">search</i>
                </button>
                <a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon">
                    <i class="mdui-icon material-icons" style="color: #f1f3f4">refresh</i>
                </a>
            </div>
            <div class="mdui-row DreamCat-content-header">
                <div class="mdui-container">
                    <h1 class="title" style="color: #ffffffe3">
                        <?php $this->options->DC_WebName(); ?>
                    </h1>
                    <h5 class="subtitle" style="color: #ffffffe3">
                        <?php $this->options->DC_WebSlogan(); ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="mdui-container-fluid Dreamcat-appimgbar" style="<?php
    #导航栏高度
    if (!empty($this->options->DC_AppImgBarHeight)) {
        echo('height:' . $this->options->DC_AppImgBarHeight . 'px; padding-bottom:5%;  zoom: 0.5;');
    } else {
        echo('height:850px; padding-bottom:5%; zoom: 0.5;');
    }
    #图片模式和单色模式
    if (!empty($this->options->DC_NavigationBarModeRadio) && $this->options->DC_NavigationBarModeRadio == 'ImgMode') {
        if (!empty($this->options->DC_AppImgBarUrl)) {
            echo 'background-image: url(' . $this->options->DC_AppImgBarUrl . ')!important;';
        } else {
            echo('background-image: url(https://tva3.sinaimg.cn/large/0072Vf1pgy1foxkfdxnnqj31hc0u0h5j.jpg)!important;');
        }
    } else {
        if (!empty($this->options->DC_AppImgBarColor)) {
            echo('background-color: ' . $this->options->DC_AppImgBarColor . '!important;');
        } else {
            echo('background-color: #3f51b5!important;');
        }
    }
    ?>">
    </div>
</div>
<!--PC HeaderUI End-->

<!--PE HeaderUI Start-->
<div class="mdui-hidden-md-up">
    <div class="mdui-container-fluid" style="transform: translateY(100%)">
        <div class="mdui-appbar mdui-shadow-0" style="height: 0;">
            <div class="mdui-toolbar">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
                  mdui-drawer="{target: '#main-drawer', swipe: true}">
                <i class="mdui-icon material-icons" style="color: #f1f3f4">menu</i>
            </span>
                <div class="mdui-toolbar-spacer"></div>
                <button mdui-dialog="{target: '#search-1'}" class="mdui-btn mdui-btn-icon mdui-hidden-md-up">
                    <i class="mdui-icon material-icons" style="color: #f1f3f4">search</i>
                </button>
                <a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon">
                    <i class="mdui-icon material-icons" style="color: #f1f3f4">refresh</i>
                </a>
            </div>
            <div class="mdui-row DreamCat-content-header">
                <div class="mdui-container">
                    <h1 class="title" style="color: #ffffffe3">
                        <?php $this->options->DC_WebName(); ?>
                    </h1>
                    <h5 class="subtitle" style="color: #ffffffe3">
                        <?php $this->options->DC_WebSlogan(); ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="mdui-container-fluid Dreamcat-appimgbar" style="<?php
    #导航栏高度
    if (!empty($this->options->DC_AppImgBarHeight_PE)) {
        echo('height:' . $this->options->DC_AppImgBarHeight_PE . 'px; padding-bottom:5%;  zoom: 0.5;');
    } else {
        echo('height:512px; padding-bottom:5%; zoom: 0.5;');
    }
    #图片模式和单色模式
    if (!empty($this->options->DC_NavigationBarModeRadio) && $this->options->DC_NavigationBarModeRadio == 'ImgMode') {
        if (!empty($this->options->DC_AppImgBarUrl)) {
            echo 'background-image: url(' . $this->options->DC_AppImgBarUrl . ')!important;';
        } else {
            echo('background-image: url(https://tva3.sinaimg.cn/large/0072Vf1pgy1foxkfdxnnqj31hc0u0h5j.jpg)!important;');
        }
    } else {
        if (!empty($this->options->DC_AppImgBarColor)) {
            echo('background-color: ' . $this->options->DC_AppImgBarColor . '!important;');
        } else {
            echo('background-color: #3f51b5!important;');
        }
    }
    ?>">
    </div>
</div>
<!--PE HeaderUI End-->

<div class="mdui-container mdui-hidden-sm-down" style="transform: translateY(-50%)">
    <div class="mdui-card DreamCat-card-1">
        <div class="mdui-card-content">
            <div class="mdui-row">
                <div class="mdui-col-xs-6 mdui-col-sm-3">
                    <form method="post" action="" class="Dreamcat-search-bar mdui-hidden-sm-down mdui-float-left">
                        <button type="submit" class="submit mdui-btn mdui-btn-icon">
                            <i class="mdui-icon material-icons mdui-text-color-theme-icon">search</i></button>
                        <input
                            type="text" class="Dreamcat-search-input" name="s" placeholder="输入关键词进行搜索"/>
                    </form>
                </div>
                <div class="mdui-col-xs-6 mdui-col-sm-6">
                    <form method="get" class="Dreamcat-search-bar mdui-hidden-sm-down" style="max-width: 100%">
                        <div class="Dreamcat-search-input">
                            <div class="mdui-card-primary-subtitle mdui-valign">
                                <p id="hitokoto" class="mdui-center">
                                    <a href="#" id="hitokoto_text">:D 获取中...</a>
                                </p>
                            </div>
                        </div>
                    </form>
                    <script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
                    <script
                        src="<?php CustomCDN_FAM('DreamCat_StaticResources/js/', '', 'js/time.js', 'time.js'); ?>">
                    </script>
                </div>
                <div class="mdui-col-xs-6 mdui-col-sm-3">
                    <form method="get" class="Dreamcat-search-bar mdui-hidden-sm-down mdui-float-right">
                        <button type="submit" class="submit mdui-btn mdui-btn-icon">
                            <i class="mdui-icon material-icons mdui-text-color-theme-icon">access_time</i>
                        </button>
                        <div class="Dreamcat-search-input" style="height: 50%">
                            <div class="mdui-card-primary-subtitle">
                                <div class="showTime"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>
<div class="mdui-container">
    <div class="mdui-container">
        <div class="mdui-row">
            <div class="mdui-col-xs-6 mdui-col-sm-3 mdui-hidden-sm-down">
                <div class="mdui-card DreamCat-card-1" style="margin-right: 30px">
                    <?php if (!empty($this->options->DC_HeadImageUrl)) { ?>
                        <img src="<?php $this->options->DC_HeadImageUrl(); ?>" class="card-img-top" style="width: 100%"
                             alt="..."/>
                    <?php } else { ?>
                        <img src="http://q1.qlogo.cn/g?b=qq&nk=10001&s=640" class="card-img-top" style="width: 100%"
                             alt="..."/>
                    <?php } ?>
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title">
                            <?php
                            if (empty($this->options->DC_ProfileCardName)) {
                                echo "博主";
                            } else {
                                $this->options->DC_ProfileCardName();
                            }
                            ?>
                        </div>
                        <div class="mdui-card-primary-subtitle">
                            <?php
                            if (empty($this->options->DC_ProfileCardIntroduction)) {
                                echo "博主很懒,啥都没写";
                            } else {
                                $this->options->DC_ProfileCardIntroduction();
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    if (!empty($this->options->DC_A_zfb) || !empty($this->options->DC_A_github)
                        || !empty($this->options->DC_A_bilibili) || !empty($this->options->DC_A_linkedin)
                        || !empty($this->options->DC_A_wx) || !empty($this->options->DC_A_wb)
                        || !empty($this->options->DC_A_telegram) || !empty($this->options->DC_A_qq)):
                        ?>
                        <div style="border-top: 1px dashed #e0e0e0; font-size: 14px"></div>
                        <div class="mdui-card-content">
                            <?php if (!empty($this->options->DC_A_zfb)): ?>
                                <a mdui-dialog="{target: '#DC_A_zfb'}">
                                    <span class="icon iconfont icon-zhifubao"></span>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($this->options->DC_A_github)): ?>
                                <a href="<?php $this->options->DC_A_github() ?>"
                                   style="text-decoration: none; color: black">
                                    <span class="icon iconfont icon-github"></span>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($this->options->DC_A_bilibili)): ?>
                                <a href="<?php $this->options->DC_A_bilibili() ?>"
                                   style="text-decoration: none; color: black">
                                    <span class="icon iconfont icon-icon_bilibili-circle"></span>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($this->options->DC_A_linkedin)): ?>
                                <a href="<?php $this->options->DC_A_linkedin() ?>"
                                   style="text-decoration: none; color: black">
                                    <span class="icon iconfont icon-linkedin0"></span>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($this->options->DC_A_wx)): ?>
                                <a mdui-dialog="{target: '#DC_A_wx'}">
                                    <span class="icon iconfont icon-logo-wechat"></span>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($this->options->DC_A_wb)): ?>
                                <a href="<?php $this->options->DC_A_wb() ?>"
                                   style="text-decoration: none; color: black">
                                    <span class="icon iconfont icon-weibo"></span>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($this->options->DC_A_telegram)): ?>
                                <a href="<?php $this->options->DC_A_telegram() ?>"
                                   style="text-decoration: none; color: black">
                                    <span class="icon iconfont icon-telegram"></span>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($this->options->DC_A_qq)): ?>
                                <a mdui-dialog="{target: '#DC_A_qq'}">
                                    <span class="icon iconfont icon-QQ-circle-fill"></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <br/>
            </div>
            <div class="mdui-col-xs-12 mdui-col-sm-9">
                <?php while ($this->next()): ?>
                    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                        <a itemprop="url" href="<?php $this->permalink() ?>">
                            <div class="mdui-card DreamCat-card-1 DreamCat-card-ts-1">
                                <div class="mdui-card-media">
                                    <?php
                                    $t = thumb($this);
                                    $User_ImageUrl_TF = $this->fields->User_ImageUrl_TF;
                                    if ($t[0] == 0): ?>
                                        <img class="DreamCat-card-post-wzimg DreamCat-card-post-wzimg-ts" src="<?php
                                        if (!empty($User_ImageUrl_TF)) {
                                            echo $User_ImageUrl_TF;
                                        } else {
                                            echo $t[1];
                                        }
                                        ?>" alt=""/>
                                    <?php endif; ?>
                                    <?php if ($t[0] == 1) : ?>
                                        <img class="DreamCat-card-post-wzimg DreamCat-card-post-wzimg-ts" src="<?php
                                        if (!empty($User_ImageUrl_TF)) {
                                            echo $User_ImageUrl_TF;
                                        } else {
                                            echo $t[1];
                                        }
                                        ?>" alt=""/>
                                    <?php endif; ?>

                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">
                                                <?php $this->title() ?>
                                                <br/>
                                                <?php if (is_array($this->options->DC_GlobalApp) &&
                                                    in_array('DCShowPublicationTime',
                                                        $this->options->DC_GlobalApp)): ?>
                                                    <small>发表时间:
                                                        <time datetime="<?php $this->date('c'); ?>"
                                                              itemprop="datePublished"><?php $this->date(); ?></time>
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <br/>
                    </article>
                <?php endwhile; ?>


                <div class="DreamCat-margin-card-top"></div>
                <div class="DreamCat-page-div DreamCat-card-a">
                    <?php $this->pageLink('<button
				class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 DreamCat-prev"
			>
				<i class="mdui-icon material-icons">navigate_before</i></button
			>', 'prev'); ?>
                    <button class="mdui-btn DreamCat-number" disabled="">
                <span class="">
                    <?php if ($this->_currentPage > 1) echo $this->_currentPage; else echo
                    1; ?>/
                    <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>
                </span>
                    </button>
                    <?php $this->pageLink('<button
				class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 DreamCat-next"
			>
				<i class="mdui-icon material-icons">navigate_next</i></button
			>', 'next'); ?>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
