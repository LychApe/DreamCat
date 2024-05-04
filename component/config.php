<?php
use Typecho\Widget\Helper\Form\Element\Checkbox;
use Typecho\Widget\Helper\Form\Element\Text;
function themeConfig($form): void
{
    $DC_HeadImageUrl = new Text(
        'DC_HeadImageUrl',
        null,
        null,
        _t('博客头像地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站前台显示头像，留空则显示默认头像')
    );
    $form->addInput($DC_HeadImageUrl);

    $DC_FooterLogoUrl = new Text(
        'DC_FooterLogoUrl',
        null,
        null,
        _t('底部Logo地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站底部显示Logo，留空则不显示')
    );
    $form->addInput($DC_FooterLogoUrl);

    $DC_WebFavicon = new Text(
        'DC_WebFavicon',
        null,
        null,
        _t('网站Favicon地址'),
        _t('网站Favicon将显示在网页标签的头部,留空则不显示')
    );
    $form->addInput($DC_WebFavicon);

    $DC_WebName = new Text(
        'DC_WebName',
        null,
        null,
        _t('网站标题'),
        _t('在这里填入一个网站标题, 以在网站前台显示网站标题，留空则不显示')
    );
    $form->addInput($DC_WebName);

    $DC_WebSlogan = new Text(
        'DC_WebSlogan',
        null,
        null,
        _t('网站标语'),
        _t('在这里填入一个首页标语, 以在网站前台显示首页标语，留空则不显示')
    );
    $form->addInput($DC_WebSlogan);

    $description = new Text(
        'description',
        null,
        null,
        _t('网站SEO描述'),
        _t('网站描述将显示在网页代码的头部,留空则不显示')
    );
    $form->addInput($description);

    $keywords = new Text(
        'keywords',
        null,
        null,
        _t('网站SEO关键字'),
        _t('请以半角逗号 "," 分割多个关键字,留空则不显示')
    );
    $form->addInput($keywords);

    $icpba = new Text(
        'icpba',
        null,
        null,
        _t('网站ICP备案号'),
        _t('留空则不显示')
    );
    $form->addInput($icpba);

    $DC_LoginIconRadio = new Typecho_Widget_Helper_Form_Element_Radio('DC_LoginIconRadio', array(
        'TureMode' => '显示登录按钮',
        'FalseMode' => '不显示登录按钮',
    ), 'FalseMode', _t('侧栏登录按钮开关'));
    $form->addInput($DC_LoginIconRadio);

    $DC_CommentsRadio = new Typecho_Widget_Helper_Form_Element_Radio('DC_CommentsRadio', array(
        'TureMode' => '开启评论区',
        'FalseMode' => '关闭评论区',
    ), 'TureMode', _t('网站评论区开关'));
    $form->addInput($DC_CommentsRadio);

    $DC_NavigationBarModeRadio = new Typecho_Widget_Helper_Form_Element_Radio('DC_NavigationBarModeRadio', array(
        'ColurMode' => '单色背景模式',
        'ImgMode' => '图片背景模式',
    ), 'ColurMode', _t('导航栏模式'));
    $form->addInput($DC_NavigationBarModeRadio);

    $DC_AppImgBarColor = new Text(
        'DC_AppImgBarColor',
        null,
        null,
        _t('导航栏颜色值'),
        _t('选择单色背景模式在这里填入颜色值, 留空则默认')
    );
    $form->addInput($DC_AppImgBarColor);

    $DC_AppImgBarUrl = new Text(
        'DC_AppImgBarUrl',
        null,
        null,
        _t('导航栏图片地址'),
        _t('选择图片背景模式在这里填入一个图片 URL 地址,留空则显示默认')
    );
    $form->addInput($DC_AppImgBarUrl);

    $DC_AppImgBarHeight = new Text(
        'DC_AppImgBarHeight',
        null,
        null,
        _t('导航栏高度(PC)'),
        _t('在这里填入导航栏高度, 以在网站导航栏显示，留空则显示默认')
    );
    $form->addInput($DC_AppImgBarHeight);

    $DC_AppImgBarHeight_PE = new Text(
        'DC_AppImgBarHeight_PE',
        null,
        null,
        _t('导航栏高度(PE)'),
        _t('在这里填入导航栏高度, 以在网站导航栏显示，留空则显示默认')
    );
    $form->addInput($DC_AppImgBarHeight_PE);

    $DC_ArticleListModeRadio = new Typecho_Widget_Helper_Form_Element_Radio('DC_ArticleListModeRadio', array(
        'ImgMode' => '图片模式',
        'TextMode' => '文字模式',
    ), 'ImgMode', _t('文章列表模式'));
    $form->addInput($DC_ArticleListModeRadio);

    $DC_ProfileCardName = new Text(
        'DC_ProfileCardName',
        null,
        null,
        _t('个人资料卡片名字'),
        _t('个人资料卡片名字将显示在个人资料卡片,留空则不显示')
    );
    $form->addInput($DC_ProfileCardName);

    $DC_ProfileCardIntroduction = new Text(
        'DC_ProfileCardIntroduction',
        null,
        null,
        _t('个人资料卡片介绍'),
        _t('个人资料卡片介绍将显示在个人资料卡片,留空则不显示')
    );
    $form->addInput($DC_ProfileCardIntroduction);

    $DC_ProfileCardModule = new Checkbox(
        'DC_ProfileCardModule',
        [
            'DCShowPage' => _t('独立页面模块'),
            'DCShowTags' => _t('标签模块'),
            'DCShowInfo' => _t('信息统计模块'),
            'DCShowCategory' => _t('分类模块'),
        ],
        ['DCShowPage', 'DCShowTags', 'DCShowInfo', 'DCShowCategory'],
        _t('个人资料卡片栏模块')
    );
    $form->addInput($DC_ProfileCardModule->multiMode());

    $DC_AdmireQCode = new Text(
        'DC_AdmireQCode',
        null,
        null,
        _t('博客赞赏二维码地址'),
        _t('在这里填入赞赏二维码地址,留空则不显示')
    );
    $form->addInput($DC_AdmireQCode);


    $DC_GlobalApp = new Checkbox(
        'DC_GlobalApp',
        [
            'DCShowClickEffect' => _t('点击特效'),
            'DCShowPublicationTime' => _t('首页文章显示发表时间'),
            'DCShowRSS' => _t('侧边栏RSS'),
        ],
        ['DCShowClickEffect', 'DCShowPublicationTime', 'DCShowRSS'],
        _t('全局应用')
    );
    $form->addInput($DC_GlobalApp->multiMode());

    $DC_WebCdnRadio = new Typecho_Widget_Helper_Form_Element_Radio('DC_WebCdnRadio', array(
        'LocalMode' => '本地资源模式',
        'FuseAccelerationMode' => '融合CDN加速模式',
        'CustomMode' => '自定义CDN加速模式'
    ), 'FuseAccelerationMode', _t('自定义CDN设置'));
    $form->addInput($DC_WebCdnRadio);
    $DC_CustomCdnUrl_User = new Text(
        'DC_CustomCdnUrl_User',
        null,
        null,
        _t('CDN静态资源链接'),
        _t('选择自定义CDN加速模式即可填写CDN静态资源链接')
    );
    $form->addInput($DC_CustomCdnUrl_User);

    $DC_CustomFontRadio = new Typecho_Widget_Helper_Form_Element_Radio('DC_CustomFontRadio', array(
        'Ol_JetBrainsMono' => 'JetBrainsMono字体(在线)',
        'Ol_SmileySans' => 'SmileySans字体(在线)',
        'Ol_HarmonyOS_Sans' => 'HarmonyOS_Sans字体(在线)',
        'CustomModeLocal' => '本地字体',
        'CustomModeUser' => '自定义字体'
    ), 'CustomModeLocal', _t('自定义字体模式'));
    $form->addInput($DC_CustomFontRadio);
    $DC_CustomFont_User = new Text(
        'DC_CustomFont_User',
        null,
        null,
        _t('自定义字体'),
        _t('选择自定义字体即可填写字体资源链接')
    );
    $form->addInput($DC_CustomFont_User);

    $DC_CustomRandomPictures = new Text(
        'DC_CustomRandomPictures',
        null,
        null,
        _t('自定义随机图片API'),
        _t('填入一个自定义随机图片接链或留空')
    );
    $form->addInput($DC_CustomRandomPictures);

    $DC_WebCustomStyle = new Typecho_Widget_Helper_Form_Element_Textarea('DC_WebCustomStyle', NULL, NULL, _t('自定义全局Style'));
    $form->addInput($DC_WebCustomStyle);
    $DC_WebCustomJavascript = new Typecho_Widget_Helper_Form_Element_Textarea('DC_WebCustomJavascript', NULL, NULL, _t('自定义全局Javascript'));
    $form->addInput($DC_WebCustomJavascript);
    $DC_WebCustomFooter = new Typecho_Widget_Helper_Form_Element_Textarea('DC_WebCustomFooter', NULL, NULL, _t('自定义页脚内容'));
    $form->addInput($DC_WebCustomFooter);

    $DC_WebCustomFooterModeRadio = new Typecho_Widget_Helper_Form_Element_Radio('DC_WebCustomFooterModeRadio', array(
        'LRMode' => '左右模式',
        'CMode' => '居中模式',
    ), 'LRMode', _t('自定义页脚模式'));
    $form->addInput($DC_WebCustomFooterModeRadio);

    $DC_A_qq = new Text(
        'DC_A_qq', null, null, _t('QQ二维码图片地址'), _t('填写您的QQ二维码图片地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_qq);
    $DC_A_wx = new Text(
        'DC_A_wx', null, null, _t('微信二维码图片地址'), _t('填写您的微信二维码图片地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_wx);
    $DC_A_zfb = new Text(
        'DC_A_zfb', null, null, _t('支付宝二维码图片地址'), _t('填写您的支付宝二维码图片地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_zfb);
    $DC_A_wb = new Text(
        'DC_A_wb', null, null, _t('微博地址'), _t('填写您的微博地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_wb);
    $DC_A_github = new Text(
        'DC_A_github', null, null, _t('Github地址'), _t('填写您的Github地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_github);
    $DC_A_linkedin = new Text(
        'DC_A_linkedin', null, null, _t('Linkedin地址'), _t('填写您的Linkedin地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_linkedin);
    $DC_A_telegram = new Text(
        'DC_A_telegram', null, null, _t('Telegram地址'), _t('填写您的Telegram地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_telegram);
    $DC_A_bilibili = new Text(
        'DC_A_bilibili', null, null, _t('BiliBili地址'), _t('填写您的BiliBili地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_bilibili);
    ?>

    <!-- 配置中心=>CSS [Start] -->
    <link rel="dns-prefetch" href="//cdn.fallsoft.cn">
    <link rel="stylesheet"
          href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/mdui.min.css', 'mdui.min.css'); ?>" >
    <link rel="stylesheet"
          href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/md2.css', 'md2.css'); ?>" >
    <link rel="stylesheet"
          href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/dreamcat.css', 'dreamcat.css'); ?>" >
    <!-- 配置中心=>CSS [End] -->

    <div class="mdui-card" style="margin-top: 2rem; margin-bottom: 1rem;">
        <!-- 配置中心=>头部 [Start]-->
        <div class="mdui-card-primary" >
            <div class="mdui-card-primary-title" >DreamCat 主题配置中心</div >
            <div class="mdui-card-primary-subtitle" >Version: <?php echo(themeVersion()); ?></div >
        </div >
        <!-- 配置中心=>头部 [End]-->

        <!-- 配置中心=>导航 [Start]-->
        <div class="mdui-tab mdui-tab-centered" mdui-tab >
            <a href="#example3-tab1" class="mdui-ripple" >模板信息</a >
        </div >
        <!-- 配置中心导航 [End]-->

        <!-- 配置中心=>模板信息 [Start]-->
        <div id="example3-tab1" class="mdui-p-a-2" >
            <div class="mdui-card-content" >
                <div class="mdui-row-xs-2" >
                    <div class="mdui-col" >
                        <div class="mdui-card button-ts dreamcat-config-card"  >
                            <div class="mdui-card-header" >
                                <img class="mdui-card-header-avatar"
                                     src="https://i.loli.net/2020/01/19/gHs2Kb39YixpyE4.png"
                                     alt="" />
                                <div class="mdui-card-header-title" >DreamCat</div >
                                <div class="mdui-card-header-subtitle" ><?php echo(themeVersion()); ?></div >
                            </div >
                        </div >
                    </div >
                    <div class="mdui-col" >
                        <div class="mdui-card button-ts dreamcat-config-card" mdui-dialog="{target: '#developerDialog'}" >
                            <div class="mdui-card-header" >
                                <img class="mdui-card-header-avatar"
                                     src="https://i.loli.net/2020/01/19/gHs2Kb39YixpyE4.png"
                                     alt="" />
                                <div class="mdui-card-header-title" >点击查看开发者</div >
                                <div class="mdui-card-header-subtitle" >简单不先于复杂,而是在复杂之后</div >
                            </div >
                        </div >
                    </div >
                </div >
                <br />

                <div class="mdui-card dreamcat-config-card" >
                    <div class="mdui-card-content" >
                        <img alt="GitHub "
                             src="https://img.shields.io/github/stars/LychApe/DreamCat?style=for-the-badge"
                             alt="" >
                        <img alt="GitHub all releases"
                             src="https://img.shields.io/github/downloads/LychApe/DreamCat/total?style=for-the-badge"
                             alt="" >
                        <img alt="GitHub last commit"
                             src="https://img.shields.io/github/last-commit/LychApe/DreamCat?style=for-the-badge"
                             alt="" >
                        <img alt="GitHub code size in bytes"
                             src="https://img.shields.io/github/languages/code-size/LychApe/DreamCat?style=for-the-badge"
                             alt="" >
                    </div >
                </div >
                <br />

                <div class="mdui-card dreamcat-config-card" >
                    <div class="mdui-card-content" >
                        最新版本：<a href="https://github.com/LychApe/DreamCat/" ><img
                                alt="GitHub release (latest by date)"
                                src="https://img.shields.io/github/v/release/LychApe/DreamCat?style=flat-square" ></a >
                        <div class="mdui-float-right" >当前版本：<?php echo(themeVersion()); ?></div >
                    </div >
                </div >
                <br />

                <div class="mdui-card dreamcat-config-card" >
                    <div class="mdui-card-content" >
                        <div class="mdui-typo" >
                            <p >QQ交流群: 1034830519</p >
                            <p >最后，祝您使用愉快 :)</p >
                        </div >
                    </div >
                </div >
            </div >
        </div >
        <!-- 配置中心=>模板信息 [End]-->

        <!-- 配置中心=>弹窗:开发者列表 [Start]-->
        <div class="mdui-card-content" >
            <div class="mdui-dialog" id="developerDialog" >
                <div class="mdui-dialog-title" >开发者列表</div >
                <div class="mdui-dialog-content" >
                    <div class="mdui-row-xs-2" >
                        <?php
                        // refactor below to php rendering
                        $developerList = [
                            [
                                'name' => 'HanFengA7',
                                'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=1091044631@qq.com&spec=640',
                                'subtitle' => '所幸抬头仰望,总有星辰相伴!',
                            ],[
                                'name' => 'CornWorld',
                                'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=2135620856@qq.com&spec=640',
                                'subtitle' => '"希望人没事"',
                            ],[
                                'name' => 'TeddyNight',
                                'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=2206645368@qq.com&spec=640',
                                'subtitle' => '自由和未来不可以被妥协',
                            ],[
                                'name' => 'Dev-Leo',
                                'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=1906944165@qq.com&spec=640',
                                'subtitle' => '不忘初心,牢记使命！',
                            ],[
                                'name' => 'WhiteBearcn',
                                'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=1846405136@qq.com&spec=640',
                                'subtitle' => '',
                            ],[
                                'name' => '学神之女',
                                'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=2477819731@qq.com&spec=640',
                                'subtitle' => '举头望涵涵，低头思第一。',
                            ]
                        ];
                        foreach ($developerList as $developer) {
                            echo <<<HTML
                            <div class='mdui-col' >
                                <div class='mdui-card dreamcat-config-card button-ts' >
                                    <div class='mdui-card-header' >
                                        <img class='mdui-card-header-avatar'
                                             src='{$developer['avatar']}' alt="{$developer['name']}'s avatar" />
                                        <div class='mdui-card-header-title' >{$developer['name']}</div >
                                        <div class='mdui-card-header-subtitle' >{$developer['subtitle']}</div >
                                    </div >
                                </div >
                                <br />
                            </div >
                        HTML;
                        }
                        ?>
                    </div >
                    <br />
                    此外，我们还收到了来自全球各地开发者通过 GitHub 提交的众多贡献。
                </div >
                <div class="mdui-dialog-actions" >
                    <button class="mdui-btn mdui-ripple" mdui-dialog-confirm >确认</button >
                </div >
            </div >
        </div >
        <!-- 配置中心=>弹窗:开发者列表 [End]-->
        <!-- 配置中心=>JS [Start] -->
        <script
            src="<?php CustomCDN_FAM('DreamCat_StaticResources/js/', '', 'js/mdui.min.js', 'mdui.min.js'); ?>" >
        </script >
        <script
            src="<?php CustomCDN_FAM('DreamCat_StaticResources/js/', '', 'js/dreamcat.js', 'dreamcat.js'); ?>" >
        </script >
        <!-- 配置中心=>JS [End] -->
    </div >
<?php
    backupHandler();
}?>