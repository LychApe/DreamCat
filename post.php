<?php
/**
 * DreamCat   是一个极简自适应博客主题,年轻人追梦的必备良品!
 *
 * @package DreamCat
 * @author LychApe
 * @version 1.9-20210201
 * @link https://github.com/LychApe/DreamCat
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-container-fluid">
    <div class="mdui-row DreamCat-content-header" style="min-height: 140px;"></div>
    <div class="mdui-container">
        <div class="mdui-row">
            <div class="mdui-card shadow-A1" style="margin-top: -15%; border-radius:9px;">
                <div class="mdui-card-header mdui-color-grey-50">
                    <?php if (!empty($this->options->logoUrl)): ?>
                        <img class="mdui-card-header-avatar" src="<?php $this->options->logoUrl() ?>"/>
                    <?php else: ?>
                        <img class="mdui-card-header-avatar"
                             src="<?php $this->options->themeUrl('src/img/default-avatar.png'); ?>"/>
                    <?php endif; ?>
                    <div class="mdui-card-header-title"><?php $this->author(); ?></div>
                    <div class="mdui-card-header-subtitle"><?php $this->options->description(); ?></div>
                </div>
                <div class="di-color cl">
                    <div class="di-color-a"></div>
                    <div class="di-color-b"></div>
                    <div class="di-color-c"></div>
                    <div class="di-color-d"></div>
                    <div class="di-color-e"></div>
                </div>
                <div class="mdui-card-primary">
                    <div class="mdui-card-primary-title mdui-text-center" style="font-weight: 400;">
                        <?php $this->title() ?>
                    </div>
                    <br>
                    <div class="mdui-card-primary-subtitle mdui-text-center">
                        <div class="mdui-chip">
                            <span class="mdui-chip-icon mdui-color-blue"><i
                                        class="mdui-icon material-icons">access_time</i></span>
                            <span class="mdui-chip-title"> <time datetime="<?php $this->date('c'); ?>"
                                                                 itemprop="datePublished"><?php $this->date(); ?> </span>
                        </div>
                        <div class="mdui-chip">
                            <span class="mdui-chip-icon mdui-color-blue"><i
                                        class="mdui-icon material-icons">brush</i></span>
                            <span class="mdui-chip-title"> <?php echo art_count($this->cid); ?>个字 </span>
                        </div>
                        <div class="mdui-chip">
                            <span class="mdui-chip-icon mdui-color-blue"><i
                                        class="mdui-icon material-icons">whatshot</i></span>
                            <span class="mdui-chip-title"> <?php _e(getViewsStr($this)); ?></span>
                        </div>
                        <?php if ($this->options->baidusl == 'checked'): ?>
                            <div class="mdui-chip">
                                <span class="mdui-chip-icon mdui-color-blue"><i class="mdui-icon material-icons">&#xeb3b;</i></span>
                                <span class="mdui-chip-title">百度收录：<?php echo baidu_record() ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div style="border-top: 1px dashed #e0e0e0; font-size: 14px;"></div>
                <div class="mdui-card-content">
                    <div class="mdui-typo">
                        <?php $this->content(); ?>
                    </div>
                </div>
                <p class="detail-info mdui-typo">
                    #如无特别声明，该文章均为 <a href="<?php $this->options->siteUrl(); ?>"><?php $this->author(); ?></a> 原创，转载请遵循
                    署名-非商业性使用 4.0 国际（CC BY-NC 4.0） 协议，即转载请注明文章来源。
                    <br/>
                    #最后编辑时间为: <?php echo date('Y 年 m 月 d 日', $this->modified); ?>
                </p>
            </div>

            <br/>

            <?php $this->need('comments.php'); ?>
            <br/>
        </div>
    </div>
</div>
<br/>


<?php if (M_content() > 1): ?>
    <div class="moe-nav">
        <div class="mdui-divider moe-c-d"></div>
        <div class="mdui-container">
            <div class="mdui-row">
                <?php thePrev($this); ?>
                <?php theNext($this); ?>
            </div>
        </div>
    </div>
<?php else: ?>

<?php endif; ?>


</div>

<!-- end #main-->

<?php #$this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
