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
            echo('height:'.$this->options->DC_AppImgBarHeight.'px; padding-bottom:30%;  zoom: 0.5;');
        }else{
            echo('height:520px; padding-bottom:30%; zoom: 0.5;');
        }
        #图片模式和单色模式
        if (!empty($this->options->DC_NavigationBarModeRadio) && $this->options->DC_NavigationBarModeRadio == 'ImgMode') {
            if (!empty($this->options->DC_AppImgBarUrl)) {
                echo 'background-image: url('.$this->options->DC_AppImgBarUrl.')!important;';
            }else{
                echo('background-image: url(https://tva3.sinaimg.cn/large/0072Vf1pgy1foxkfdxnnqj31hc0u0h5j.jpg)!important;');
            }
        }else{
            if (!empty($this->options->DC_AppImgBarColor)) {
                echo('background-color: '.$this->options->DC_AppImgBarColor.'!important;');
            }else{
                echo('background-color: #3f51b5!important;');
            }
        }
    ?>">
</div>

<div class="mdui-container mdui-hidden-sm-down" style="transform: translateY(-50%)">
    <div class="mdui-card DreamCat-card-1">
        <div class="mdui-card-content">
            <div class="mdui-row">
                <div class="mdui-col-xs-6 mdui-col-sm-3">
                    <form method="post" action="" class="Dreamcat-search-bar mdui-hidden-sm-down mdui-float-left">
                        <button type="submit" class="submit mdui-btn mdui-btn-icon">
                            <i class="mdui-icon material-icons mdui-text-color-theme-icon">search</i></button><input
                            type="text" class="Dreamcat-search-input" name="s" placeholder="输入关键词进行搜索" />
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