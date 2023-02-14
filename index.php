<?php
/**
 * DreamCat   是一个极简自适应博客主题,年轻人追梦的必备良品!
 *
 * @package DreamCat
 * @author LychApe
 * @version 2.9.230214_LTS
 * @link https://github.com/LychApe/DreamCat
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="mdui-container-fluid" style="padding-left: 0px; padding-right: 0px;">
    <div id="body">
        <div class="container">
            <div class="row">
                <!--Start-->
                <div class="mdui-container-fluid mdui-appbar mdui-shadow-0">
                    <div class="mdui-row DreamCat-content-header mdui-color-indigo">
                        <div class="fade-scale in ">
                            <h1 class="title">
                                <?php $this->options->title(); ?></h1>
                            <h5 class="subtitle">
                                <?php $this->options->description(); ?></h5>
                        </div>
                    </div>
                    <div class="mdui-row mdui-appbar mdui-shadow-0">
                        <div class="mdui-col-xs-6 mdui-float-right"
                             style="transform: translateY(-50%);width: 95px;">
                            <div class="mdui-shadow-0 mdui-fab mdui-ripple mdui-color-indigo"
                                 mdui-dialog="{target: '#search-1'}"><i
                                    class="mdui-icon material-icons">search</i></div>
                        </div>
                    </div>
                </div>
                <div class="mdui-container">
                    <div class="mdui-row">
                        <div class="mdui-col-xs-12 mdui-col-sm-8">
                            <div class="mdui-card DreamCat-top-card shadow-A1" style="border-radius:18px;">
                                <div class="mdui-card-media">
                                    <div class="mdui-card-media">
                                        <?php if (!empty($this->options->headbj1)): ?>
                                            <img class="DreamCat-main-pic" src="<?php $this->options->headbj1() ?>"
                                                 alt=""/>
                                        <?php else: ?>
                                            <img class="DreamCat-main-pic"
                                                 src="//img14.360buyimg.com/img/jfs/t1/60307/19/4269/282412/5d2629faE5c3b1ef5/02d26b22dfe459d0.jpg"
                                                 alt=""/>
                                        <?php endif; ?>
                                        <div class="mdui-card-media-covered">
                                            <div class="mdui-card-primary">
                                                <div
                                                    class="mdui-card-primary-title"><?php $this->options->Dec() ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdui-hidden-xs mdui-col-sm-4">
                            <div class="mdui-row">
                                <div class="mdui-card DreamCat-top-card shadow-A1" style="border-radius:18px;">
                                    <div class="mdui-card-media">
                                        <?php if (!empty($this->options->headbj2)): ?><img class="DreamCat-main-pic"
                                                                                           src="<?php $this->options->headbj2() ?>"
                                                                                           style="height: 100px;position: relative;background-size: cover;background-position: center;;"
                                                                                           alt=""/>
                                        <?php else: ?><img class="DreamCat-main-pic"
                                                           src="//img14.360buyimg.com/img/jfs/t1/60307/19/4269/282412/5d2629faE5c3b1ef5/02d26b22dfe459d0.jpg"
                                                           style="height: 100px;position: relative;background-size: cover;background-position: center;border-radius: var(--jinsom-border-radius) var(--jinsom-border-radius) 0 0;"
                                                           alt=""/>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($this->options->logoUrl)): ?>
                                        <div class="Logo_centered">
                                            <img class="DreamCat-List-headimg mdui-shadow-6"
                                                 src="<?php $this->options->logoUrl() ?>"
                                                 style="margin-top: -50px;position: relative;" alt=""/>
                                        </div>
                                    <?php else: ?>
                                        <div class="Logo_centered">
                                            <img class="DreamCat-List-headimg mdui-shadow-6"
                                                 src="<?php CustomCDN_url('img/default-avatar.png'); ?>"
                                                 style="margin-top: -50px;position: relative;" alt=""/>
                                        </div>
                                    <?php endif; ?>
                                    <div class="number"
                                         style="color: #999;font-size: 15px;display: flex;justify-content: center;margin: 1%;">
                                        <?php if (!empty($this->options->Decc)): ?>
                                            <div class="mdui-chip">
                                                <span class="mdui-chip-title"><?php $this->options->Decc() ?></span>
                                            </div>

                                        <?php else: ?>
                                            <div class="mdui-chip">
                                                <span class="mdui-chip-title">博主很懒,啥都没写</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div style="text-align: center;">
                                        <?php if (!empty($this->options->github)): ?>
                                            <a href="<?php $this->options->github() ?>">
                                                <svg class="dc_icon" aria-hidden="true" style="fill: black">
                                                    <use xlink:href="#dc_icongithub"></use>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($this->options->qq)): ?>
                                            <a mdui-dialog="{target: '#qq'}">
                                                <svg class="dc_icon" aria-hidden="true">
                                                    <use xlink:href="#dc_iconQQ"></use>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($this->options->weibo)): ?>
                                            <a mdui-dialog="{target: '#weibo'}">
                                                <svg class="dc_icon" aria-hidden="true">
                                                    <use xlink:href="#dc_icon552cd5bdeaada"></use>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($this->options->zfb)): ?>
                                            <a mdui-dialog="{target: '#zfb'}">
                                                <svg class="dc_icon" aria-hidden="true">
                                                    <use xlink:href="#dc_iconzhifubao"></use>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($this->options->weixin)): ?>
                                            <a mdui-dialog="{target: '#weixin'}">
                                                <svg class="dc_icon" aria-hidden="true">
                                                    <use xlink:href="#dc_iconweixin"></use>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($this->options->linkedin)): ?>
                                            <a href="<?php $this->options->linkedin() ?>">
                                                <svg class="dc_icon" aria-hidden="true" style="fill: black">
                                                    <use xlink:href="#dc_iconlinkedin"></use>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <br/>

                <div class="mdui-container mdui-center">
                    <?php while ($this->next()): ?>
                        <?php
                        $timershaft_opt = $this->fields->timershaft_opt;
                        if ($timershaft_opt == "A" || $timershaft_opt == "B" || $timershaft_opt == "C" || $timershaft_opt == "D"):
                            ?>
                            <article class="post" itemscope="" itemtype="//schema.org/BlogPosting">
                                <div class="mdui-row">
                                    <div id="main">
                                        <div class="mdui-col-md-1 mdui-col-lg-1"></div>
                                        <div
                                            class="mdui-col-xs-12 mdui-col-sm-12 mdui-col-md-10 mdui-col-lg-10 mdui-col-xl-10">
                                            <div id="line"></div>
                                            <div id="coos">
                                                <div class="lis">
                                                    <div class="spot"></div>
                                                    <div class="g-lin mdui-hidden-sm-down"></div>
                                                    <div class="mdui-card mdui-hoverable shadow-A1" id="main"
                                                         role="main"
                                                         style="background-color: #e8e8e8; border-radius:6px; transform:translateY(-15%);">
                                                        <div class="mdui-row">
                                                            <div
                                                                class="mdui-col-xs-4 mdui-col-sm-3 mdui-col-md-3 mdui-col-lg-2 mdui-col-xl-2">
                                                                <div style="background-color: #dadada;
                                                                    border-radius: 0 0 15px 15px;
                                                                    color: grey;
                                                                    margin-left: 30px;
                                                                    padding: 1px;">
                                                                    <div
                                                                        style="text-align: center;margin-block-start: 1em;margin-block-end: 1em;">
                                                                        <?php
                                                                        if ($timershaft_opt == "A") {
                                                                            echo "<h4>说 说</h4>";
                                                                        } elseif ($timershaft_opt == "B") {
                                                                            echo "<h4>日 志</h4>";
                                                                        } elseif ($timershaft_opt == "C") {
                                                                            echo "<h4>公 告</h4>";
                                                                        } elseif ($timershaft_opt == "D") {
                                                                            echo "<h4>状 态</h4>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mdui-card-primary">
                                                            <div
                                                                class="mdui-card-primary-title">
                                                                <div style="color: #282a36">
                                                                    <?php $this->title(); ?>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="mdui-card-primary-subtitle">
                                                                <div style="color: #282a36">
                                                                    <?php $this->excerpt(520, '...'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mdui-col-md-1 mdui-col-lg-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php else: ?>
                            <article class="post" itemscope="" itemtype="//schema.org/BlogPosting">
                                <div class="mdui-row">
                                    <div id="main">
                                        <div class="mdui-col-md-1 mdui-col-lg-1"></div>
                                        <div
                                            class="mdui-col-xs-12 mdui-col-sm-12 mdui-col-md-10 mdui-col-lg-10 mdui-col-xl-10">
                                            <div id="line"></div>
                                            <div id="coos">
                                                <div class="lis">
                                                    <div class="spot"></div>
                                                    <div class="g-lin mdui-hidden-sm-down"></div>
                                                    <a href="<?php $this->permalink() ?>"
                                                       title="<?php $this->title(); ?>"
                                                       style="text-decoration: none;">
                                                        <?php if ($this->options->listtc == 'checked'): ?>
                                                            <div class="mdui-card mdui-hoverable shadow-A1" id="main"
                                                                 role="main"
                                                                 style="border-radius:9px; transform: translateY(-15%);">
                                                                <div class="mdui-card-primary">
                                                                    <div
                                                                        class="mdui-card-primary-title"><?php $this->title(); ?></div>
                                                                    <div
                                                                        class="mdui-card-primary-subtitle"><?php $this->excerpt(
                                                                            180, '...'
                                                                        ); ?></div>
                                                                </div>
                                                                <div
                                                                    style="border-top: 1px dashed #e0e0e0; font-size: 14px;"></div>
                                                                <div class="mdui-card-header">
                                                                    <?php if (!empty($this->options->logoUrl)): ?>
                                                                        <img class="mdui-card-header-avatar"
                                                                             src="<?php $this->options->logoUrl() ?>"
                                                                             alt=""/>
                                                                    <?php else: ?>
                                                                        <img class="mdui-card-header-avatar"
                                                                             src="<?php CustomCDN_url(
                                                                                 'img/default-avatar.png'
                                                                             ); ?>"
                                                                             alt=""/>
                                                                    <?php endif; ?>
                                                                    <div
                                                                        class="mdui-card-header-title"><?php $this->author(); ?></div>
                                                                    <div
                                                                        class="mdui-card-header-subtitle"><?php $this->date(); ?></div>
                                                                </div>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="mdui-card mdui-hoverable shadow-A1" id="main"
                                                                 role="main"
                                                                 style="border-radius:9px; transform: translateY(-15%);">
                                                                <div class="mdui-card-media">
                                                                    <?php $t = thumb($this);
                                                                    $postimgurl = $this->fields->postimgurl;
                                                                    ?>
                                                                    <?php if ($t[0] == 0): ?>
                                                                        <img class="moe-post-wzimg"
                                                                             style="object-fit: cover;"
                                                                             src="<?php
                                                                             if (!empty($postimgurl)) {
                                                                                 echo $postimgurl;
                                                                             } else {
                                                                                 echo $t[1];
                                                                             }
                                                                             ?>" alt=""/>
                                                                    <?php endif; ?>
                                                                    <?php if ($t[0] == 1) : ?>
                                                                        <img class="moe-post-wzimg"
                                                                             style="object-fit: cover;"
                                                                             src="<?php
                                                                             if (!empty($postimgurl)) {
                                                                                 echo $postimgurl;
                                                                             } else {
                                                                                 echo $t[1];
                                                                             }
                                                                             ?>" alt=""/>
                                                                    <?php endif; ?>
                                                                    <div class="mdui-card-media-covered">
                                                                        <div class="mdui-card-primary">
                                                                            <div class="mdui-card-primary-title">
                                                                                <?php $this->title(); ?>
                                                                                <?php if ($this->options->articletime == 'checked'): ?>
                                                                                    <br>
                                                                                    <small>发表时间:
                                                                                        <time
                                                                                            datetime="<?php $this->date(
                                                                                                'c'
                                                                                            ); ?>"
                                                                                            itemprop="datePublished">
                                                                                            <?php $this->date(); ?></time>
                                                                                    </small>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mdui-col-md-1 mdui-col-lg-1"></div>
                                    </div>
                                </div>
                            </article>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>

                <div class="moe-margin-card-top"></div>
                <div class="moe-page-div moe-card-a">
                    <?php $this->pageLink(
                        '<button class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 moe-prev"><i class="mdui-icon material-icons">navigate_before</i></button>',
                        'prev'
                    ); ?>
                    <button class="mdui-btn moe-number" disabled="">
							<span class="">
								<?php if ($this->_currentPage > 1) echo $this->_currentPage; else echo 1; ?>/
								<?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>
							</span>
                    </button>
                    <?php $this->pageLink(
                        '<button class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 moe-next"><i class="mdui-icon material-icons">navigate_next</i></button>',
                        'next'
                    ); ?>
                </div>
                <!--End-->
            </div>
        </div>
    </div>
</div>
<?php #$this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
