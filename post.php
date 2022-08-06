<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 
$this->need('header.php'); 
?>
<div class="mdui-container-fluid" style="transform: translateY(100%)">
    <div class="mdui-appbar mdui-shadow-0" style="height: 0;">
        <div class="mdui-toolbar">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
                mdui-drawer="{target: '#main-drawer', swipe: true}">
                <i class="mdui-icon material-icons" style="color: #f1f3f4">menu</i>
            </span>
            <div class="mdui-toolbar-spacer"></div>
            <button mdui-dialog="{target: '#search-1'}" class="mdui-btn mdui-btn-icon">
                <i class="mdui-icon material-icons" style="color: #f1f3f4">search</i>
            </button>
            <a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon">
                <i class="mdui-icon material-icons" style="color: #f1f3f4">refresh</i>
            </a>
        </div>
        <div class="mdui-container">
            <div class="mdui-container">
                <h1 class="title" style="color: #ffffffe3;"><?php $this->title() ?></h1>
                <h4 class="subtitle" style="color: #ffffffe3;">作者: <?php $this->author(); ?></h4>
                <h4 class="subtitle" style="color: #ffffffe3;">时间: <time datetime="<?php $this->date('c'); ?>"
                        itemprop="datePublished"><?php $this->date(); ?></time></h4>
            </div>
        </div>
    </div>
</div>
<div class="mdui-container-fluid Dreamcat-appimgbar" style="height: 450px;zoom: 0.65; background-image: url(<?php  
    $User_ImageUrl_TF = $this->fields->User_ImageUrl_TF;
    if(!empty($User_ImageUrl_TF)){
        echo $User_ImageUrl_TF;
    }else{
      echo 'https://tva3.sinaimg.cn/large/87c01ec7gy1frmmnrncphj21hc0u07wj.jpg';
    }?>);">
</div>



<div class="mdui-container">
    <div class="mdui-container">
        <div class="mdui-card DreamCat-card-1" style="margin-top: -90px;">
            <div class="mdui-card-content">

                <div class="mdui-typo page-content">
                    <?php $this->content(); ?>
                </div>
                <br />
                <div class="mdui-row-xs-2">
                    <div class="mdui-col">
                        <div class="Dreamcat-post-btn">
                            <button mdui-menu="{target: '#Dreamcat-post-btn',align: 'center'}"
                                mdui-tooltip="{content: '赞赏'}"
                                class="mdui-btn mdui-btn-icon mdui-color-grey-200 mdui-ripple">
                                <i class="mdui-icon material-icons">&#xe3e7;</i>
                            </button>
                            <div class="mdui-menu mdui-menu-open" id="Dreamcat-post-btn"
                                style="box-shadow: rgb(245 245 245 / 65%) 6px 15px 20px 18px; transform-origin: 50% 0px; position: absolute; top: 9843px; left: 619px; border-radius: 0.75rem;">
                                <img alt="赞赏" src="<?php $this->options->DC_AdmireQCode(); ?>"
                                    style="object-fit: cover;height: 100%;width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="mdui-col">
                        <div class="Dreamcat-post-btn">
                            <button mdui-menu="{target: '#DreamCat-post-share',align: 'center'}"
                                mdui-tooltip="{content: '分享'}"
                                class="mdui-btn mdui-btn-icon mdui-color-grey-200 mdui-ripple">
                                <i class="mdui-icon material-icons">&#xe80d;</i>
                            </button>
                            <ul class="mdui-menu" id="DreamCat-post-share"
                                style="box-shadow: rgb(245 245 245 / 65%) 6px 15px 20px 18px; transform-origin: 50% 0px; position: absolute; top: 9843px; left: 481px; border-radius: 0.75rem;">
                                <li class="mdui-menu-item">
                                    <a href="https://connect.qq.com/widget/shareqq/index.html?site=<?php $this->options->title(); ?>&title=<?php $this->title() ?>&summary=<?php $this->summary(); ?>&url=<?php $this->permalink() ?>"
                                        class="mdui-ripple">分享到 QQ</a>
                                </li>
                                <li class="mdui-menu-item">
                                    <a href="https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&content=utf-8"
                                        class="mdui-ripple">分享到 QQ空间</a>
                                </li>
                                <li class="mdui-menu-item">
                                    <a href="https://service.weibo.com/share/share.php?appkey=&title=<?php $this->title() ?>&url=<?php $this->permalink() ?>"
                                        class="mdui-ripple">分享到 微博</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mdui-card Dreamcat-post-copyright mdui-color-grey-50">
                <svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="128" height="128">
                    <path
                        d="M512 106.7a405.3 405.3 0 110 810.6 405.3 405.3 0 010-810.6zm0 85.3a320 320 0 100 640 320 320 0 000-640zm42.7 277.3V704h-85.4V469.3h85.4zM512 298.7a47 47 0 110 93.8 47 47 0 010-93.8z">
                    </path>
                </svg>
                <div class="mdui-card-actions mdui-typo">
                    #本文链接：<a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a><br>
                    #本文采用 <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" target="_blank"
                        rel="noopener">CC BY-NC-SA 4.0</a> 协议进行许可
                    <br />
                    #如无特别声明，该文章均为 <a href="<?php $this->options->siteUrl(); ?>"><?php $this->author(); ?></a> 原创,转载请遵循
                    署名-非商业性使用 4.0 国际(CC BY-NC 4.0)协议,即转载请注明文章来源。
                    <br />
                    #最后编辑时间为: <?php echo date('Y 年 m 月 d 日', $this->modified); ?>
                </div>
            </div>
            <div class="mdui-card-actions mdui-color-grey-100">
                <div class="mdui-chip">
                    <span class="mdui-chip-icon">
                        <i class="mdui-icon material-icons">&#xe149;</i>
                    </span>
                    <span class="mdui-chip-title"><?php $this->category(','); ?></span>
                </div>
                <div class="mdui-chip">
                    <span class="mdui-chip-icon">
                        <i class="mdui-icon material-icons">&#xe226;</i>
                    </span>
                    <span class="mdui-chip-title"><?php $this->tags(', ', true, 'none'); ?></span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="mdui-container">
        <?php $this->need('comments.php'); ?>
    </div>
</div>

<?php if (Typecho_Widget::widget('Widget_Stat')->publishedPostsNum > 1):?>

<br />
<br />
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

.doc-footer-nav-left,
.doc-footer-nav-right {
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