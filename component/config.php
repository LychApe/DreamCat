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
    $configHighlights = [
        ['label' => '当前版本', 'value' => $themeVersion, 'hint' => '本地主题版本'],
        ['label' => '资源模式', 'value' => '本地 / 自定义 CDN', 'hint' => '按当前设置自动加载'],
        ['label' => '配置备份', 'value' => '可备份恢复', 'hint' => '页面底部操作'],
    ];
    $quickLinks = [
        ['title' => '项目主页', 'description' => '查看源码、Release 和问题反馈', 'url' => 'https://github.com/LychApe/DreamCat/'],
        ['title' => '更新日志', 'description' => '了解主题版本变化和修复记录', 'url' => 'https://github.com/LychApe/DreamCat/releases'],
        ['title' => '开发者', 'description' => '查看 DreamCat 贡献者列表', 'dialog' => '#developerDialog'],
    ];
    ?>

    <!-- 配置中心=>CSS [Start] -->
    <?php foreach (['mdui.min.css', 'md2.css', 'dreamcat.css'] as $stylesheet) : ?>
        <link rel="stylesheet" href="<?php CustomCDN_FAM('DreamCat_StaticResources/css/', '', 'css/' . $stylesheet, $stylesheet); ?>" >
    <?php endforeach; ?>
    <style>
        :root {
            --dreamcat-primary: #3f51b5;
            --dreamcat-primary-soft: #eef1ff;
            --dreamcat-ink: #202432;
            --dreamcat-muted: #717888;
            --dreamcat-border: #e6e9f2;
            --dreamcat-surface: #ffffff;
            --dreamcat-page: #f6f7fb;
        }

        .dreamcat-config-shell {
            margin: 20px 0 24px;
            color: var(--dreamcat-ink);
        }

        .dreamcat-config-panel {
            overflow: hidden;
            border: 1px solid var(--dreamcat-border);
            border-radius: 18px;
            background: var(--dreamcat-page);
            box-shadow: 0 10px 30px rgba(32, 36, 50, .06);
        }

        .dreamcat-config-hero {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(260px, 320px);
            gap: 20px;
            padding: 24px;
            border-bottom: 1px solid var(--dreamcat-border);
            background: #fff;
        }

        .dreamcat-config-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0;
            background: transparent;
            color: var(--dreamcat-primary);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .04em;
        }

        .dreamcat-config-title {
            margin: 10px 0 8px;
            font-size: clamp(24px, 3vw, 32px);
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -.02em;
        }

        .dreamcat-config-subtitle {
            max-width: 720px;
            margin: 0;
            color: var(--dreamcat-muted);
            font-size: 14px;
            line-height: 1.75;
        }

        .dreamcat-config-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .dreamcat-config-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 36px;
            padding: 0 14px;
            border-radius: 10px;
            background: var(--dreamcat-primary);
            color: #fff !important;
            font-weight: 700;
            text-decoration: none !important;
            box-shadow: 0 8px 18px rgba(63, 81, 181, .18);
        }

        .dreamcat-config-button.is-secondary {
            background: #fff;
            color: var(--dreamcat-primary) !important;
            box-shadow: inset 0 0 0 1px var(--dreamcat-border);
        }

        .dreamcat-version-card,
        .dreamcat-config-card {
            border: 1px solid var(--dreamcat-border);
            border-radius: 14px;
            background: var(--dreamcat-surface);
            box-shadow: 0 6px 18px rgba(32, 36, 50, .04);
        }

        .dreamcat-version-card {
            align-self: stretch;
            padding: 18px;
        }

        .dreamcat-version-head {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .dreamcat-version-head img {
            width: 46px;
            height: 46px;
            border-radius: 12px;
        }

        .dreamcat-version-name {
            font-size: 18px;
            font-weight: 800;
        }

        .dreamcat-version-meta {
            color: var(--dreamcat-muted);
            font-size: 13px;
        }

        .dreamcat-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 14px;
        }

        .dreamcat-badges img {
            max-width: 100%;
        }

        .dreamcat-config-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            padding: 18px 24px 0;
        }

        .dreamcat-config-card {
            padding: 16px;
        }

        .dreamcat-config-card-label {
            color: var(--dreamcat-muted);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .04em;
        }

        .dreamcat-config-card-value {
            margin-top: 7px;
            font-size: 18px;
            font-weight: 800;
        }

        .dreamcat-config-card-hint {
            margin-top: 6px;
            color: var(--dreamcat-muted);
            font-size: 12px;
        }

        .dreamcat-config-content {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 300px;
            gap: 12px;
            padding: 12px 24px 24px;
        }

        .dreamcat-link-list {
            display: grid;
            gap: 10px;
        }

        .dreamcat-link-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 13px 14px;
            border: 1px solid var(--dreamcat-border);
            border-radius: 12px;
            background: #fff;
            color: inherit !important;
            text-decoration: none !important;
            transition: background .18s ease, border-color .18s ease, color .18s ease;
            cursor: pointer;
        }

        .dreamcat-link-card:hover {
            border-color: #cfd5ea;
            background: #fafbff;
        }

        .dreamcat-link-title {
            font-weight: 800;
        }

        .dreamcat-link-description {
            margin-top: 4px;
            color: var(--dreamcat-muted);
            font-size: 12px;
        }

        .dreamcat-link-arrow {
            color: var(--dreamcat-primary);
            font-weight: 800;
        }

        .dreamcat-note {
            padding: 16px;
            border: 1px solid #eadfc4;
            border-radius: 14px;
            background: #fff8e8;
            color: #4f3b12;
        }

        .dreamcat-note-title {
            font-size: 16px;
            font-weight: 800;
        }

        .dreamcat-note p {
            margin: 10px 0 0;
            color: #725927;
            line-height: 1.75;
        }

        .dreamcat-developer-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .dreamcat-developer-card {
            border-radius: 12px;
            background: #f8f9ff;
        }

        .typecho-option {
            margin-bottom: 12px !important;
            padding: 16px !important;
            border: 1px solid var(--dreamcat-border);
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 4px 14px rgba(32, 36, 50, .03);
        }

        .typecho-option label.typecho-label {
            margin-bottom: 8px;
            color: var(--dreamcat-ink);
            font-weight: 800;
        }

        .typecho-option input.text,
        .typecho-option textarea {
            border-radius: 12px;
        }

        form.protected[action="?DreamCatBackup"] {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            margin: 18px 0;
            padding: 16px;
            border: 1px solid var(--dreamcat-border);
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 4px 14px rgba(32, 36, 50, .03);
        }

        form.protected[action="?DreamCatBackup"] input.btn {
            border-radius: 999px;
        }

        @media (max-width: 960px) {
            .dreamcat-config-hero,
            .dreamcat-config-content {
                grid-template-columns: 1fr;
            }

            .dreamcat-config-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 760px) {
            .dreamcat-config-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .dreamcat-config-hero,
            .dreamcat-config-grid,
            .dreamcat-config-content {
                padding-left: 18px;
                padding-right: 18px;
            }

            .dreamcat-config-hero {
                padding-top: 22px;
            }

            .dreamcat-developer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <!-- 配置中心=>CSS [End] -->

    <div class="dreamcat-config-shell">
        <div class="dreamcat-config-panel">
            <div class="dreamcat-config-hero">
                <div>
                    <div class="dreamcat-config-kicker">主题设置</div>
                    <h2 class="dreamcat-config-title">DreamCat 主题配置中心</h2>
                    <p class="dreamcat-config-subtitle">集中管理站点资料、展示样式、资源加载和社交链接。顶部只展示当前状态和常用入口，具体配置仍在下方表单中保存。</p>
                    <div class="dreamcat-config-actions">
                        <a class="dreamcat-config-button" href="https://github.com/LychApe/DreamCat/" target="_blank" rel="noopener noreferrer">查看项目</a>
                        <a class="dreamcat-config-button is-secondary" href="https://github.com/LychApe/DreamCat/releases" target="_blank" rel="noopener noreferrer">检查更新</a>
                    </div>
                </div>

                <div class="dreamcat-version-card">
                    <div class="dreamcat-version-head">
                        <img src="<?php echo $escape($brandAvatar); ?>" alt="DreamCat logo" />
                        <div>
                            <div class="dreamcat-version-name">DreamCat</div>
                            <div class="dreamcat-version-meta">Version <?php echo $themeVersion; ?></div>
                        </div>
                    </div>
                    <a href="https://github.com/LychApe/DreamCat/" target="_blank" rel="noopener noreferrer"><img alt="GitHub release (latest by date)" src="https://img.shields.io/github/v/release/LychApe/DreamCat?style=flat-square" ></a>
                    <div class="dreamcat-badges">
                        <?php foreach ($githubBadges as $badge) : ?>
                            <img alt="<?php echo $escape($badge['alt']); ?>" src="<?php echo $escape($badge['url']); ?>" >
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="dreamcat-config-grid">
                <?php foreach ($configHighlights as $highlight) : ?>
                    <div class="dreamcat-config-card">
                        <div class="dreamcat-config-card-label"><?php echo $escape($highlight['label']); ?></div>
                        <div class="dreamcat-config-card-value"><?php echo $escape($highlight['value']); ?></div>
                        <div class="dreamcat-config-card-hint"><?php echo $escape($highlight['hint']); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="dreamcat-config-content">
                <div class="dreamcat-config-card">
                    <div class="dreamcat-config-card-label">常用入口</div>
                    <div class="dreamcat-link-list">
                        <?php foreach ($quickLinks as $link) : ?>
                            <?php if (isset($link['dialog'])) : ?>
                                <div class="dreamcat-link-card" mdui-dialog="{target: '<?php echo $escape($link['dialog']); ?>'}">
                            <?php else : ?>
                                <a class="dreamcat-link-card" href="<?php echo $escape($link['url']); ?>" target="_blank" rel="noopener noreferrer">
                            <?php endif; ?>
                                    <div>
                                        <div class="dreamcat-link-title"><?php echo $escape($link['title']); ?></div>
                                        <div class="dreamcat-link-description"><?php echo $escape($link['description']); ?></div>
                                    </div>
                                    <span class="dreamcat-link-arrow">&gt;</span>
                            <?php if (isset($link['dialog'])) : ?>
                                </div>
                            <?php else : ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="dreamcat-note">
                    <div class="dreamcat-note-title">配置建议</div>
                    <p>建议先完成站点头像、标题、导航栏和文章列表模式，再配置 CDN、字体和自定义脚本。保存前可使用底部备份功能保留当前配置。</p>
                    <p>QQ交流群：1034830519</p>
                </div>
            </div>
        </div>

        <div class="mdui-dialog" id="developerDialog">
            <div class="mdui-dialog-title">开发者列表</div>
            <div class="mdui-dialog-content">
                <div class="dreamcat-developer-grid">
                    <?php foreach ($developerList as $developer) : ?>
                        <div class="mdui-card dreamcat-developer-card">
                            <div class="mdui-card-header">
                                <img class="mdui-card-header-avatar" src="<?php echo $escape($developer['avatar']); ?>" alt="<?php echo $escape($developer['name']); ?>'s avatar" />
                                <div class="mdui-card-header-title"><?php echo $escape($developer['name']); ?></div>
                                <div class="mdui-card-header-subtitle"><?php echo $escape($developer['subtitle']); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p>此外，我们还收到了来自全球各地开发者通过 GitHub 提交的众多贡献。</p>
            </div>
            <div class="mdui-dialog-actions">
                <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确认</button>
            </div>
        </div>

        <!-- 配置中心=>JS [Start] -->
        <?php foreach (['mdui.min.js', 'dreamcat.js'] as $script) : ?>
            <script src="<?php CustomCDN_FAM('DreamCat_StaticResources/js/', '', 'js/' . $script, $script); ?>" ></script >
        <?php endforeach; ?>
        <!-- 配置中心=>JS [End] -->
    </div>
<?php
    backupHandler();
}
