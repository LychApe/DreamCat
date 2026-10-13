<?php

use Typecho\Widget\Helper\Form\Element\Checkbox;
use Typecho\Widget\Helper\Form\Element\Text;

require_once 'component/config.php';

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeVersion(): string
{
    return '3.0.261004';
}

function defaultBackgroundImage(): string
{
    return 'https://tva3.sinaimg.cn/large/0072Vf1pgy1foxkfdxnnqj31hc0u0h5j.jpg';
}

function dreamcatThemePrimaryColorOptions(): array
{
    return [
        'indigo' => '靛蓝 Indigo',
        'blue' => '蓝色 Blue',
        'light-blue' => '浅蓝 Light Blue',
        'cyan' => '青色 Cyan',
        'teal' => '水鸭 Teal',
        'green' => '绿色 Green',
        'light-green' => '浅绿 Light Green',
        'lime' => '青柠 Lime',
        'yellow' => '黄色 Yellow',
        'amber' => '琥珀 Amber',
        'orange' => '橙色 Orange',
        'deep-orange' => '深橙 Deep Orange',
        'red' => '红色 Red',
        'pink' => '粉色 Pink',
        'purple' => '紫色 Purple',
        'deep-purple' => '深紫 Deep Purple',
        'brown' => '棕色 Brown',
        'grey' => '灰色 Grey',
        'blue-grey' => '蓝灰 Blue Grey',
    ];
}

function dreamcatThemeAccentColorOptions(): array
{
    return [
        'pink' => '粉色 Pink',
        'red' => '红色 Red',
        'purple' => '紫色 Purple',
        'deep-purple' => '深紫 Deep Purple',
        'indigo' => '靛蓝 Indigo',
        'blue' => '蓝色 Blue',
        'light-blue' => '浅蓝 Light Blue',
        'cyan' => '青色 Cyan',
        'teal' => '水鸭 Teal',
        'green' => '绿色 Green',
        'light-green' => '浅绿 Light Green',
        'lime' => '青柠 Lime',
        'yellow' => '黄色 Yellow',
        'amber' => '琥珀 Amber',
        'orange' => '橙色 Orange',
        'deep-orange' => '深橙 Deep Orange',
    ];
}

function dreamcatNightModeOptions(): array
{
    return [
        'LightMode' => '浅色模式',
        'DarkMode' => '夜间模式',
        'AutoMode' => '跟随系统',
    ];
}

function dreamcatThemeColorHex(string $type, string $color): string
{
    $colors = [
        'primary' => [
            'amber' => '#FFC107',
            'blue' => '#2196F3',
            'blue-grey' => '#607D8B',
            'brown' => '#795548',
            'cyan' => '#00BCD4',
            'deep-orange' => '#FF5722',
            'deep-purple' => '#673AB7',
            'green' => '#4CAF50',
            'grey' => '#9E9E9E',
            'indigo' => '#3F51B5',
            'light-blue' => '#03A9F4',
            'light-green' => '#8BC34A',
            'lime' => '#CDDC39',
            'orange' => '#FF9800',
            'pink' => '#E91E63',
            'purple' => '#9C27B0',
            'red' => '#F44336',
            'teal' => '#009688',
            'yellow' => '#FFEB3B',
        ],
        'accent' => [
            'amber' => '#FFC400',
            'blue' => '#448AFF',
            'cyan' => '#18FFFF',
            'deep-orange' => '#FF6E40',
            'deep-purple' => '#7C4DFF',
            'green' => '#69F0AE',
            'indigo' => '#536DFE',
            'light-blue' => '#40C4FF',
            'light-green' => '#B2FF59',
            'lime' => '#EEFF41',
            'orange' => '#FFAB40',
            'pink' => '#FF4081',
            'purple' => '#E040FB',
            'red' => '#FF5252',
            'teal' => '#64FFDA',
            'yellow' => '#FFFF00',
        ],
    ];

    return $colors[$type][$color] ?? ($type == 'accent' ? '#FF4081' : '#3F51B5');
}

function dreamcatSelectedOption($value, array $options, string $default): string
{
    return isset($options[$value]) ? $value : $default;
}

function dreamcatThemeAdminUrl(): string
{
    return Helper::options()->adminUrl('options-theme.php');
}

function dreamcatThemeStaticUrl(string $path): string
{
    return Helper::options()->rootUrl . '/usr/themes/DreamCat/DreamCat_StaticResources/' . $path;
}

function dreamcatRenderAdminNotice(string $message, int $delay = 2500): void
{
    $adminUrl = dreamcatThemeAdminUrl();
    echo '<div>' . $message . '</div>';
    echo '<script>setTimeout(function(){ location.href = "' . $adminUrl . '"; }, ' . $delay . ');</script>';
}

function dreamcatRenderAdjacentPost($widget, string $comparisonOperator, string $sortDirection, array $config): void
{
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')->where('table.contents.created ' . $comparisonOperator . ' ?', $widget->created)->where(
        'table.contents.status = ?', 'publish'
    )->where('table.contents.type = ?', $widget->type)->where('table.contents.password IS NULL')->order(
        'table.contents.created', $sortDirection
    )->limit(1);
    $content = $db->fetchRow($sql);

    $linkClass = $config['linkClass'];
    $icon = $config['icon'];
    $label = $config['label'];
    $emptyLabel = $config['emptyLabel'];
    $textClass = $config['textClass'] ?? '';
    $emptyTextClass = $config['emptyTextClass'] ?? $textClass;
    $directionClass = $config['directionClass'] ?? '';
    $chapterClass = $config['chapterClass'] ?? '';

    if ($content) {
        $content = $widget->filter($content);
        $content['permalink'] = \Typecho\Router::url($content['type'], $content, Helper::options()->index);
        echo '<a href="' . $content['permalink'] . '" class="' . $linkClass . '"><div class="doc-footer-nav-text' . $textClass . '"><i class="mdui-icon material-icons">' . $icon . '</i><span class="doc-footer-nav-direction' . $directionClass . '">' . $label . '</span><div class="doc-footer-nav-chapter' . $chapterClass . '">' . $content['title'] . '</div></div></a>';
        return;
    }

    echo '<a class="' . $linkClass . '"><div class="doc-footer-nav-text' . $emptyTextClass . '"><i class="mdui-icon material-icons">' . $icon . '</i><span class="doc-footer-nav-direction' . $directionClass . '">' . $label . '</span><div class="doc-footer-nav-chapter' . $chapterClass . '">' . $emptyLabel . '</div></div></a>';
}

function dreamcatBrowserVersion(string $agent, string $needle): string
{
    $parts = explode($needle, $agent, 2);
    if (!isset($parts[1])) {
        return '';
    }

    $versionParts = explode('.', $parts[1]);
    return $versionParts[0];
}

function dreamcatFirstMatchLabel(string $agent, array $rules, $fallback = false)
{
    foreach ($rules as $pattern => $label) {
        if (preg_match($pattern, $agent)) {
            return $label;
        }
    }

    return $fallback;
}

function themeFields($layout)
{
    $User_ImageUrl_TF = new Typecho_Widget_Helper_Form_Element_Text(
        'User_ImageUrl_TF',
        null,
        null,
        _t('文章头图'),
        _t('文章头图会显示在文章的顶部及首页展示图片'));
    $layout->addItem($User_ImageUrl_TF);
}

function backupHandler() {
    $db = Typecho_Db::get();
    // 首先检查是否存在旧的备份项
    $existingBackup = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:DreamCatbf'));
    if ($existingBackup) {
        // 如果存在，则移动数据到新的备份项
        $db->delete('table.options')->where('name = ?', 'theme:DreamCatbf');
        $db->insert('table.options')->rows(['name' => 'themeBackup:DreamCat', 'user' => '0', 'value' => $existingBackup['value']]);
    }

    // 以下是处理不同类型的POST请求的逻辑
    $requestType = $_POST['type'] ?? '';
    if ($requestType !== '') {
        switch ($requestType) {
            case "备份模板数据":
                $currentValue = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:DreamCat'))['value'] ?? '';
                $db->query($db->delete('table.options')->where('name = ?', 'themeBackup:DreamCat'));
                $db->query($db->insert('table.options')->rows(['name' => 'themeBackup:DreamCat', 'user' => '0', 'value' => $currentValue]));
                dreamcatRenderAdminNotice('备份完成！');
                break;
            case "还原模板数据":
                $backupData = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'themeBackup:DreamCat'));
                if ($backupData) {
                    $db->query($db->update('table.options')->rows(['value' => $backupData['value']])->where('name = ?', 'theme:DreamCat'));
                    dreamcatRenderAdminNotice('检测到模板备份数据，恢复完成！请等待自动刷新！若无反应请 <a href="' . dreamcatThemeAdminUrl() . '">点击这里</a>', 2000);
                } else {
                    echo '<div>没有模板备份数据，恢复不了哦！</div>';
                }
                break;
            case "删除备份数据":
                $db->query($db->delete('table.options')->where('name = ?', 'themeBackup:DreamCat'));
                dreamcatRenderAdminNotice('删除成功！请等待自动刷新！若无反应请 <a href="' . dreamcatThemeAdminUrl() . '">点击这里</a>');
                break;
        }
    }

    // 显示表单
    echo <<<form
	<form class="protected" action="?DreamCatBackup" method="post">
        <input type="submit" name="type" class="btn btn-s" value="备份模板数据" />
        <input type="submit" name="type" class="btn btn-s" value="还原模板数据" />
        <input type="submit" name="type" class="btn btn-s" value="删除备份数据" />
    </form>
form;
}


/** art_count
 * @param $cid
 * @author HanFengA7
 * version 0.02
 * */
function art_count($cid)
{
    $db = Typecho_Db::get();
    $rs = $db->fetchRow(
        $db->select('table.contents.text')->from('table.contents')->where('table.contents.cid=?', $cid)->order(
            'table.contents.cid', Typecho_Db::SORT_ASC
        )->limit(1)
    );
    $text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text'] ?? '');
    echo mb_strlen($text, 'UTF-8');
}

/**
 * @param $agent
 * @author HanFengA7
 * version 0.13
 */
function CustomCDN_url($agent)
{
    $options = Helper::options();
    if ($options->DC_WebCdnRadio == 'CustomMode' && !empty($options->DC_CustomCdnUrl_User)) {
        echo $options->DC_CustomCdnUrl_User . $agent;
        return;
    }

    echo dreamcatThemeStaticUrl($agent);
}


/**
 * @param $URL_1
 * @param $URL_2
 * @param $Path_L
 * @param $Path_C
 * @author HanFengA7
 * version 0.14
 */
function CustomCDN_FAM($URL_1, $URL_2, $Path_L, $Path_C): void
{
    $options = Helper::options();
    if ($options->DC_WebCdnRadio == 'CustomMode' && !empty($options->DC_CustomCdnUrl_User)) {
        echo $options->DC_CustomCdnUrl_User . $Path_L;
        return;
    }

    echo dreamcatThemeStaticUrl($Path_L);

}

/**
 * 自定义字体
 * @author HanFengA7
 * version 0.04
 */
function CustomFont_url(): void
{
    $options = Helper::options();
    $fonts = [
        'Ol_JetBrainsMono' => 'https://cdn.fallsoft.cn/gh/LychApe/DreamCat@fonts/fonts/JetBrainsMono-Regular.woff2',
        'Ol_SmileySans' => 'https://cdn.fallsoft.cn/gh/LychApe/DreamCat@fonts/fonts/SmileySans-Oblique.ttf.woff2',
        'Ol_HarmonyOS_Sans' => 'https://cdn.fallsoft.cn/gh/LychApe/DreamCat@fonts/fonts/HarmonyOS_Sans_SC_Regular.ttf',
    ];

    $font = $fonts[$options->DC_CustomFontRadio] ?? null;
    if ($font !== null) {
        echo $font;
        return;
    }

    if ($options->DC_CustomFontRadio === 'CustomModeUser') {
        echo $options->DC_CustomFont_User;
        return;
    }

    CustomCDN_url('fonts/JetBrainsMono-Regular.woff2');
}

/** 随机图片
 * @param $obj
 * @return array
 * version 0.16
 * @author HanFengA7
 */
function thumb($obj): array
{
    $options = Helper::options();
    if (empty($options->DC_CustomRandomPictures)) {
        $randImgClass = rand(1, 4);
        $imgcdn = 'https://api.hanfenga7.cn/RandomImg/V1/api.php?type=img&class=' . $randImgClass;
        $imgurl = $imgcdn . '&sjImg=' . rand(100, 9000);
    } else {
        $imgcdn = $options->DC_CustomRandomPictures;
        $imgurl = $imgcdn . '?&sjImg=' . rand(100, 9000);
    }
    $attach = $obj->attachments(1)->attachment;
    if (isset($attach->isImage) && $attach->isImage == 1) {
        $thu = [0, $attach->url];
    } else {
        $thu = [1, $imgurl];
    }
    return $thu;
}


/** 显示下一篇
 * @access public
 * @param $widget
 * @return Void
 */
function theNext($widget)
{
    dreamcatRenderAdjacentPost($widget, '>', Typecho_Db::SORT_ASC, array(
        'linkClass' => 'mdui-ripple mdui-color-grey-50 mdui-col-xs-10 mdui-col-sm-6 doc-footer-nav-right',
        'icon' => 'arrow_forward',
        'label' => 'Next',
        'emptyLabel' => '没有啦!!!',
        'textClass' => '',
        'emptyTextClass' => ' dreamcat-disabled',
        'directionClass' => '',
        'chapterClass' => '',
    ));
}

/** 显示上一篇
 * @access public
 * @param $widget
 * @return Void
 */
function thePrev($widget)
{
    dreamcatRenderAdjacentPost($widget, '<', Typecho_Db::SORT_DESC, array(
        'linkClass' => 'mdui-ripple mdui-color-grey-50 mdui-col-xs-2 mdui-col-sm-6 doc-footer-nav-left',
        'icon' => 'arrow_back',
        'label' => 'Previous',
        'emptyLabel' => '没有啦!!!',
        'textClass' => '',
        'emptyTextClass' => ' dreamcat-disabled',
        'directionClass' => ' mdui-hidden-xs-down',
        'chapterClass' => ' mdui-hidden-xs-down',
    ));
}

/**
 * 获取浏览器信息
 * @param String $agent
 * @return String|bool
 */
function dreamcatBrowserRules(): array
{
    // 规则: [正则, 标签模板(%s 为版本号占位), 版本号截取锚点]
    return [
        ['/MSIE\s([^\s|;]+)/i', 'IE Browser'],
        ['/FireFox\/([^\s]+)/i', 'Firefox Browser %s', 'Firefox/'],
        ['/Maxthon([\d]*)\/([^\s]+)/i', 'Maxthon Browser %s', 'Maxthon/'],
        ['#SE2([a-zA-Z0-9.]+)#i', 'Sogo Browser'],
        ['#360([a-zA-Z0-9.]+)#i', '360 Browser'],
        ['/Edge([\d]*)\/([^\s]+)/i', 'Edge %s', 'Edge/'],
        ['/EdgiOS([\d]*)\/([^\s]+)/i', 'Edge'],
        ['/UC/i', 'UC Browser %s', 'rowser/'],
        ['/OPR/i', 'Open Browser %s', 'OPR/'],
        ['/MicroMesseng/i', 'Weixin Browser'],
        ['/WeiBo/i', 'WeiBo Browser'],
        ['/QQ/i', 'QQ Browser %s', 'rowser/'],
        ['/MQBHD/i', 'QQ Browser %s', 'MQBHD/'],
        ['/BIDU/i', 'Baidu Browser'],
        ['/LBBROWSER/i', 'KS Browser'],
        ['/TheWorld/i', 'TheWorld Browser'],
        ['/XiaoMi/i', 'XiaoMi Browser'],
        ['/UBrowser/i', 'UCBrowser %s', 'rowser/'],
        ['/mailapp/i', 'Email Browser'],
        ['/2345Explorer/i', '2345 Browser'],
        ['/Sleipnir/i', 'Sleipnir Browser'],
        ['/YaBrowser/i', 'Yandex Browser'],
        ['/Opera[\s|\/]([^\s]+)/i', 'Opera Browser'],
        ['/MZBrowser/i', 'MZ Browser'],
        ['/VivoBrowser/i', 'Vivo Browser'],
        ['/Quark/i', 'Quark Browser'],
        ['/mixia/i', 'Mixia Browser'],
        ['/fusion/i', 'Fusion'],
        ['/CoolMarket/i', 'CoolMarket Browser'],
        ['/Thunder/i', 'Thunder Browser'],
        ['/Chrome([\d]*)\/([^\s]+)/i', 'Chrome %s', 'Chrome/'],
        ['/safari\/([^\s]+)/i', 'Safari%s', 'Version/'],
    ];
}

/**
 * 获取浏览器信息
 * @param String $agent
 * @return String|bool
 */
function getBrowser($agent)
{
    foreach (dreamcatBrowserRules() as $rule) {
        [$pattern, $label] = $rule;
        $needle = $rule[2] ?? null;
        if (!preg_match($pattern, $agent)) {
            continue;
        }
        return $needle === null ? $label : str_replace('%s', dreamcatBrowserVersion($agent, $needle), $label);
    }

    return false;
}


/** 获取操作系统信息
 * @return String
 * @example getOs($comments->agent);
 */
function getOs($agent)
{
    if (preg_match('/win/i', $agent)) {
        return dreamcatFirstMatchLabel($agent, [
            '/nt 6.0/i' => 'Windows Vista',
            '/nt 6.1/i' => 'Windows 7',
            '/nt6.2/i' => 'Windows 8',
            '/nt 6.3/i' => 'Windows 8.1',
            '/nt 5.1/i' => 'Windows XP',
            '/nt 10.0/i' => 'Windows 10',
        ], 'Windows');
    }

    if (preg_match('/android/i', $agent)) {
        return dreamcatFirstMatchLabel($agent, [
            '/android9/i' => 'Android P',
            '/android 8/i' => 'Android O',
            '/android 7/i' => 'Android N',
            '/android 6/i' => 'Android M',
            '/android 5/i' => 'Android L',
        ], 'Android');
    }

    return dreamcatFirstMatchLabel($agent, [
        '/ubuntu/i' => 'Linux',
        '/linux/i' => 'Linux',
        '/iPhone/i' => 'iPhone',
        '/iPad/i' => 'iPad',
        '/mac/i' => 'OSX',
        '/cros/i' => 'Chrome os',
    ]);
}

?>
