<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-container-fluid mdui-appbar mdui-shadow-0">
    <div class="mdui-row DreamCat-content-header mdui-color-indigo">
        <div class="mdui-container fade-scale in">
            <h1 class="title"><?php $this->options->title(); ?></h1>
            <h5 class="subtitle">
                <?php $this->archiveTitle(array(
                    'category' => _t('分类 %s 下的文章'),
                    'search' => _t('包含关键字 %s 的文章'),
                    'tag' => _t('标签 %s 下的文章'),
                    'author' => _t('%s 发布的文章')
                ), '', ''); ?>
            </h5>
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

<div class="mdui-container mdui-center">
    <?php if ($this->have()): ?>
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
    <?php else: ?>
        <article class="post">
            <h2 class="post-title">没有找到内容</h2>
        </article>
    <?php endif; ?>


    <style>
        .moe-margin-card-top {
            margin-top: 30px;
        }

        .moe-page-div {
            margin-top: 30px;
            max-width: 250px;
            margin-left: auto;
            position: relative;
            margin-right: auto;
            margin-bottom: 80px;
        }

        .moe-page-div .moe-number {
            left: 37%;
            position: absolute;
        }

        .moe-page-div .moe-next {
            right: 0;
            position: absolute;
        }
    </style>
    <div class="moe-margin-card-top"></div>
    <div class="moe-page-div moe-card-a">
        <?php $this->pageLink(
            '<button class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 moe-prev"><i class="mdui-icon material-icons">navigate_before</i></button>',
            'prev'
        ); ?>
        <button class="mdui-btn moe-number" disabled><span
                class=""><?php if ($this->_currentPage > 1) echo $this->_currentPage; else echo 1; ?> / <?php echo ceil(
                    $this->getTotal() / $this->parameter->pageSize
                ); ?></span>
        </button>
        <?php $this->pageLink(
            '<button class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 moe-next"><i class="mdui-icon material-icons">navigate_next</i></button>',
            'next'
        ); ?>
    </div>
</div>

<!-- end #main -->
<?php $this->need('footer.php'); ?>
