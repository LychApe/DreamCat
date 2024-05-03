<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<style>
    a {
        text-decoration: none;
        color: black;
    }
</style>
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
                        <img src="https://q1.qlogo.cn/g?b=qq&nk=10001&s=640" class="card-img-top" style="width: 100%"
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
                <?php
                $pages = null;
                $pages = $this->widget('Widget_Contents_Page_List')->to($pages);
                ?>
                <?php if (!empty($pages->title)): ?>
                    <br/>
                    <div class="mdui-card DreamCat-card-1" style="margin-right: 30px">
                        <div class="mdui-card-content">
                            <?php while ($pages->next()): ?>
                                <li class="mdui-list-item mdui-ripple Dreamcat-search-bar" style="
                            margin: 0px 0px 15px;">
                                    <a href="<?php $pages->permalink(); ?>"
                                       class="mdui-list-item-content mdui-text-color-theme-text"
                                       title="<?php $pages->title(); ?>">
                                        <?php $pages->title(); ?>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=28')->to($tags); ?>
                <?php if (!empty($tags->name)): ?>
                    <br/>
                    <div class="mdui-card DreamCat-card-1" style="margin-right: 30px">
                        <div class="mdui-card-content">
                            <?php while ($tags->next()): ?>
                                <a href="<?php $tags->permalink(); ?>"
                                   class="size-<?php $tags->split(5, 10, 20, 30); ?>"><?php $tags->name(); ?></a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <br/>
                <div class="mdui-card DreamCat-card-1" style="margin-right: 30px">
                    <div class="mdui-card-content">
                        <div class="Dreamcat-search-bar" style="margin: 0px 0px 15px;">
                            <div style="text-align: center; margin: 15px;"> 文 章 : <?php $stat = null;
                                Typecho_Widget::widget('Widget_Stat')->to($stat);
                                $stat->publishedPostsNum() ?>
                            </div>
                        </div>
                        <div class="Dreamcat-search-bar" style="">
                            <div style="text-align: center; margin: 15px;"> 评 论
                                : <?php $stat->publishedCommentsNum() ?></div>
                        </div>
                    </div>
                </div>
                <br/>
            </div>
            <div class="mdui-col-xs-12 mdui-col-sm-9">
                <?php while ($this->next()): ?>
                    <style>
                        a {
                            text-decoration: none;
                            color: black;
                        }
                    </style>
                    <?php if ($this->options->DC_ArticleListModeRadio == "ImgMode"): ?>
                        <article class="post" itemscope itemtype="https://schema.org/BlogPosting">
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
                    <?php else: ?>
                        <article class="post" itemscope itemtype="https://schema.org/BlogPosting">
                            <div class="mdui-card DreamCat-card-1 DreamCat-card-ts-1">
                                <a itemprop="url" href="<?php $this->permalink() ?>">
                                    <div class="mdui-card-primary">
                                        <div class="mdui-card-primary-title">
                                            <?php $this->title() ?>
                                        </div>
                                        <div class="mdui-card-primary-subtitle">
                                            <?php
                                            if (
                                                is_array($this->options->DC_GlobalApp)
                                                &&
                                                in_array('DCShowPublicationTime', $this->options->DC_GlobalApp)
                                            ): ?>
                                                <small>
                                                    发表时间:
                                                    <time datetime="<?php $this->date('c'); ?>"
                                                          itemprop="datePublished"><?php $this->date(); ?>
                                                    </time>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mdui-card-content"><?php $this->excerpt(150, '......'); ?></div>
                                    </div>
                                </a>
                                <div class="mdui-chip" style="margin: 0px 15px 20px;">
                                    <span class="mdui-chip-icon">
                                        <i class="mdui-icon material-icons">&#xe149;</i>
                                    </span>
                                    <span class="mdui-chip-title">
                                        <?php echo $this->category(','); ?>
                                    </span>
                                </div>
                                <div class="mdui-chip">
                                    <span class="mdui-chip-icon">
                                        <i class="mdui-icon material-icons">&#xe226;</i>
                                    </span>
                                    <span class="mdui-chip-title"><?php $this->tags(' , ', true, '没有标签'); ?></span>
                                </div>
                            </div>
                            <br/>
                        </article>
                    <?php endif; ?>
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
