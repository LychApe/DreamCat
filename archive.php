<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $this->need('tpl/PageHearder.php'); ?>

<div class="mdui-container">
    <div class="mdui-row-xs-3">
        <?php while ($this->next()): ?>
        <div class="mdui-col">
            <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                <a itemprop="url" href="<?php $this->permalink() ?>">
                    <div class="mdui-card DreamCat-card-1 DreamCat-card-ts-1">
                        <div class="mdui-card-media">
                            <div>
                                <img class="DreamCat-card-post-wzimg DreamCat-card-post-wzimg-ts"
                                    src="https://api.ixiaowai.cn/api/api.php?lx=dongman?<?php $this->title() ?>" alt="">
                            </div>
                            <div class="mdui-card-media-covered">
                                <div class="mdui-card-primary">
                                    <div class="mdui-card-primary-title"><?php $this->title() ?>
                                        <br>
                                        <?php if (is_array($this->options->DC_GlobalApp) && in_array('DCShowPublicationTime', $this->options->DC_GlobalApp)): ?>
                                        <small>发表时间:<time datetime="<?php $this->date('c'); ?>"
                                                itemprop="datePublished"><?php $this->date(); ?></time></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <br />
            </article>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<div class="DreamCat-margin-card-top"></div>
<div class="DreamCat-page-div DreamCat-card-a">
    <?php $this->pageLink(
				'<button class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 DreamCat-prev"><i class="mdui-icon material-icons">navigate_before</i></button>',
				'prev'
		); ?>
    <button class="mdui-btn DreamCat-number" disabled="">
        <span class="">
            <?php if ($this->_currentPage > 1) echo $this->_currentPage; else echo 1; ?>/
            <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>
        </span>
    </button>
    <?php $this->pageLink(
				'<button class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 DreamCat-next"><i class="mdui-icon material-icons">navigate_next</i></button>',
				'next'
		); ?>
</div>

<?php $this->need('footer.php'); ?>