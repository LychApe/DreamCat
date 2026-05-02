<?php
use Typecho\Widget\Helper\Form\Element\Checkbox;
use Typecho\Widget\Helper\Form\Element\Text;
function themeConfig($form): void
{
    $addText = static function (string $name, string $label, string $description) use ($form): void {
        $form->addInput(new Text($name, null, null, _t($label), _t($description)));
    };

    $addRadio = static function (string $name, array $options, string $default, string $label) use ($form): void {
        $form->addInput(new Typecho_Widget_Helper_Form_Element_Radio($name, $options, $default, _t($label)));
    };

    $addCheckbox = static function (string $name, array $options, array $defaults, string $label) use ($form): void {
        $form->addInput((new Checkbox($name, $options, $defaults, _t($label)))->multiMode());
    };

    $addTextarea = static function (string $name, string $label) use ($form): void {
        $form->addInput(new Typecho_Widget_Helper_Form_Element_Textarea($name, null, null, _t($label)));
    };

    $addText('DC_HeadImageUrl', '博客头像地址', '在这里填入一个图片 URL 地址, 以在网站前台显示头像，留空则显示默认头像');
    $addText('DC_FooterLogoUrl', '底部Logo地址', '在这里填入一个图片 URL 地址, 以在网站底部显示Logo，留空则不显示');
    $addText('DC_WebFavicon', '网站Favicon地址', '网站Favicon将显示在网页标签的头部,留空则不显示');
    $addText('DC_WebName', '网站标题', '在这里填入一个网站标题, 以在网站前台显示网站标题，留空则不显示');
    $addText('DC_WebSlogan', '网站标语', '在这里填入一个首页标语, 以在网站前台显示首页标语，留空则不显示');
    $addText('description', '网站SEO描述', '网站描述将显示在网页代码的头部,留空则不显示');
    $addText('keywords', '网站SEO关键字', '请以半角逗号 "," 分割多个关键字,留空则不显示');
    $addText('icpba', '网站ICP备案号', '留空则不显示');

    $addRadio('DC_LoginIconRadio', [
        'TureMode' => '显示登录按钮',
        'FalseMode' => '不显示登录按钮',
    ], 'FalseMode', '侧栏登录按钮开关');

    $addRadio('DC_CommentsRadio', [
        'TureMode' => '开启评论区',
        'FalseMode' => '关闭评论区',
    ], 'TureMode', '网站评论区开关');

    $addRadio('DC_NavigationBarModeRadio', [
        'ColurMode' => '单色背景模式',
        'ImgMode' => '图片背景模式',
    ], 'ColurMode', '导航栏模式');

    $addText('DC_AppImgBarColor', '导航栏颜色值', '选择单色背景模式在这里填入颜色值, 留空则默认');
    $addText('DC_AppImgBarUrl', '导航栏图片地址', '选择图片背景模式在这里填入一个图片 URL 地址,留空则显示默认');
    $addText('DC_AppImgBarHeight', '导航栏高度(PC)', '在这里填入导航栏高度, 以在网站导航栏显示，留空则显示默认');
    $addText('DC_AppImgBarHeight_PE', '导航栏高度(PE)', '在这里填入导航栏高度, 以在网站导航栏显示，留空则显示默认');

    $addRadio('DC_ArticleListModeRadio', [
        'ImgMode' => '图片模式',
        'TextMode' => '文字模式',
    ], 'ImgMode', '文章列表模式');

    $addText('DC_ProfileCardName', '个人资料卡片名字', '个人资料卡片名字将显示在个人资料卡片,留空则不显示');
    $addText('DC_ProfileCardIntroduction', '个人资料卡片介绍', '个人资料卡片介绍将显示在个人资料卡片,留空则不显示');

    $addCheckbox('DC_ProfileCardModule', [
        'DCShowPage' => _t('独立页面模块'),
        'DCShowTags' => _t('标签模块'),
        'DCShowInfo' => _t('信息统计模块'),
        'DCShowCategory' => _t('分类模块'),
    ], ['DCShowPage', 'DCShowTags', 'DCShowInfo', 'DCShowCategory'], '个人资料卡片栏模块');

    $addText('DC_AdmireQCode', '博客赞赏二维码地址', '在这里填入赞赏二维码地址,留空则不显示');

    $addCheckbox('DC_GlobalApp', [
        'DCShowClickEffect' => _t('点击特效'),
        'DCShowPublicationTime' => _t('首页文章显示发表时间'),
        'DCShowRSS' => _t('侧边栏RSS'),
    ], ['DCShowClickEffect', 'DCShowPublicationTime', 'DCShowRSS'], '全局应用');

    $addRadio('DC_WebCdnRadio', [
        'LocalMode' => '本地资源模式',
        'CustomMode' => '自定义CDN加速模式',
    ], 'LocalMode', '自定义CDN设置');
    $addText('DC_CustomCdnUrl_User', 'CDN静态资源链接', '选择自定义CDN加速模式即可填写CDN静态资源链接');

    $addRadio('DC_CustomFontRadio', [
        'Ol_JetBrainsMono' => 'JetBrainsMono字体(在线)',
        'Ol_SmileySans' => 'SmileySans字体(在线)',
        'Ol_HarmonyOS_Sans' => 'HarmonyOS_Sans字体(在线)',
        'CustomModeLocal' => '本地字体',
        'CustomModeUser' => '自定义字体',
    ], 'CustomModeLocal', '自定义字体模式');
    $addText('DC_CustomFont_User', '自定义字体', '选择自定义字体即可填写字体资源链接');
    $addText('DC_CustomRandomPictures', '自定义随机图片API', '填入一个自定义随机图片链接或留空');

    $addTextarea('DC_WebCustomStyle', '自定义全局Style');
    $addTextarea('DC_WebCustomJavascript', '自定义全局Javascript');
    $addTextarea('DC_WebCustomFooter', '自定义页脚内容');

    $addRadio('DC_WebCustomFooterModeRadio', [
        'LRMode' => '左右模式',
        'CMode' => '居中模式',
    ], 'LRMode', '自定义页脚模式');

    $addText('DC_A_qq', 'QQ二维码图片地址', '填写您的QQ二维码图片地址,它将在首页以及其他地方显示，不填则不显示');
    $addText('DC_A_wx', '微信二维码图片地址', '填写您的微信二维码图片地址,它将在首页以及其他地方显示，不填则不显示');
    $addText('DC_A_zfb', '支付宝二维码图片地址', '填写您的支付宝二维码图片地址,它将在首页以及其他地方显示，不填则不显示');
    $addText('DC_A_wb', '微博地址', '填写您的微博地址,它将在首页以及其他地方显示，不填则不显示');
    $addText('DC_A_github', 'Github地址', '填写您的Github地址,它将在首页以及其他地方显示，不填则不显示');
    $addText('DC_A_linkedin', 'Linkedin地址', '填写您的Linkedin地址,它将在首页以及其他地方显示，不填则不显示');
    $addText('DC_A_telegram', 'Telegram地址', '填写您的Telegram地址,它将在首页以及其他地方显示，不填则不显示');
    $addText('DC_A_bilibili', 'BiliBili地址', '填写您的BiliBili地址,它将在首页以及其他地方显示，不填则不显示');

    $themeVersion = themeVersion();
    $brandAvatar = 'https://i.loli.net/2020/01/19/gHs2Kb39YixpyE4.png';
    $githubBadges = [
        ['alt' => 'GitHub stars', 'url' => 'https://img.shields.io/github/stars/LychApe/DreamCat?style=for-the-badge'],
        ['alt' => 'GitHub all releases', 'url' => 'https://img.shields.io/github/downloads/LychApe/DreamCat/total?style=for-the-badge'],
        ['alt' => 'GitHub last commit', 'url' => 'https://img.shields.io/github/last-commit/LychApe/DreamCat?style=for-the-badge'],
        ['alt' => 'GitHub code size in bytes', 'url' => 'https://img.shields.io/github/languages/code-size/LychApe/DreamCat?style=for-the-badge'],
    ];
    $developerList = [
        [
            'name' => 'HanFengA7',
            'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=1091044631@qq.com&spec=640',
            'subtitle' => '所幸抬头仰望,总有星辰相伴!',
        ],
        [
            'name' => 'CornWorld',
            'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=2135620856@qq.com&spec=640',
            'subtitle' => '"希望人没事"',
        ],
        [
            'name' => 'TeddyNight',
            'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=2206645368@qq.com&spec=640',
            'subtitle' => '自由和未来不可以被妥协',
        ],
        [
            'name' => 'Dev-Leo',
            'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=1906944165@qq.com&spec=640',
            'subtitle' => '不忘初心,牢记使命！',
        ],
        [
            'name' => 'WhiteBearcn',
            'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=1846405136@qq.com&spec=640',
            'subtitle' => '',
        ],
        [
            'name' => '学神之女',
            'avatar' => 'https://q2.qlogo.cn/headimg_dl?dst_uin=2477819731@qq.com&spec=640',
            'subtitle' => '举头望涵涵，低头思第一。',
        ],
    ];
    $escape = static function ($value): string {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    };
    ?>

    <!-- 配置中心=>CSS [Start] -->
    <link rel="dns-prefetch" href="//cdn.fallsoft.cn">
    <?php foreach (['mdui.min.css', 'md2.css', 'dreamcat.css'] as $stylesheet) : ?>
        <link rel="stylesheet" href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/' . $stylesheet, $stylesheet); ?>" >
    <?php endforeach; ?>
    <!-- 配置中心=>CSS [End] -->

    <div class="mdui-card" style="margin-top: 2rem; margin-bottom: 1rem;">
        <div class="mdui-card-primary" >
            <div class="mdui-card-primary-title" >DreamCat 主题配置中心</div >
            <div class="mdui-card-primary-subtitle" >Version: <?php echo $themeVersion; ?></div >
        </div >

        <div class="mdui-tab mdui-tab-centered" mdui-tab >
            <a href="#example3-tab1" class="mdui-ripple" >模板信息</a >
        </div >

        <div id="example3-tab1" class="mdui-p-a-2" >
            <div class="mdui-card-content" >
                <div class="mdui-row-xs-2" >
                    <div class="mdui-col" >
                        <div class="mdui-card button-ts dreamcat-config-card" >
                            <div class="mdui-card-header" >
                                <img class="mdui-card-header-avatar" src="<?php echo $escape($brandAvatar); ?>" alt="" />
                                <div class="mdui-card-header-title" >DreamCat</div >
                                <div class="mdui-card-header-subtitle" ><?php echo $themeVersion; ?></div >
                            </div >
                        </div >
                    </div >
                    <div class="mdui-col" >
                        <div class="mdui-card button-ts dreamcat-config-card" mdui-dialog="{target: '#developerDialog'}" >
                            <div class="mdui-card-header" >
                                <img class="mdui-card-header-avatar" src="<?php echo $escape($brandAvatar); ?>" alt="" />
                                <div class="mdui-card-header-title" >点击查看开发者</div >
                                <div class="mdui-card-header-subtitle" >简单不先于复杂,而是在复杂之后</div >
                            </div >
                        </div >
                    </div >
                </div >
                <br />

                <div class="mdui-card dreamcat-config-card" >
                    <div class="mdui-card-content" >
                        <?php foreach ($githubBadges as $badge) : ?>
                            <img alt="<?php echo $escape($badge['alt']); ?>" src="<?php echo $escape($badge['url']); ?>" >
                        <?php endforeach; ?>
                    </div >
                </div >
                <br />

                <div class="mdui-card dreamcat-config-card" >
                    <div class="mdui-card-content" >
                        最新版本：<a href="https://github.com/LychApe/DreamCat/" ><img alt="GitHub release (latest by date)" src="https://img.shields.io/github/v/release/LychApe/DreamCat?style=flat-square" ></a >
                        <div class="mdui-float-right" >当前版本：<?php echo $themeVersion; ?></div >
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

        <div class="mdui-card-content" >
            <div class="mdui-dialog" id="developerDialog" >
                <div class="mdui-dialog-title" >开发者列表</div >
                <div class="mdui-dialog-content" >
                    <div class="mdui-row-xs-2" >
                        <?php foreach ($developerList as $developer) : ?>
                            <div class="mdui-col" >
                                <div class="mdui-card dreamcat-config-card button-ts" >
                                    <div class="mdui-card-header" >
                                        <img class="mdui-card-header-avatar" src="<?php echo $escape($developer['avatar']); ?>" alt="<?php echo $escape($developer['name']); ?>'s avatar" />
                                        <div class="mdui-card-header-title" ><?php echo $escape($developer['name']); ?></div >
                                        <div class="mdui-card-header-subtitle" ><?php echo $escape($developer['subtitle']); ?></div >
                                    </div >
                                </div >
                                <br />
                            </div >
                        <?php endforeach; ?>
                    </div >
                    <br />
                    此外，我们还收到了来自全球各地开发者通过 GitHub 提交的众多贡献。
                </div >
                <div class="mdui-dialog-actions" >
                    <button class="mdui-btn mdui-ripple" mdui-dialog-confirm >确认</button >
                </div >
            </div >
        </div >

        <!-- 配置中心=>JS [Start] -->
        <?php foreach (['mdui.min.js', 'dreamcat.js'] as $script) : ?>
            <script src="<?php CustomCDN_FAM('DreamCat_StaticResources/js/', '', 'js/' . $script, $script); ?>" ></script >
        <?php endforeach; ?>
        <!-- 配置中心=>JS [End] -->
    </div >
<?php
    backupHandler();
}
