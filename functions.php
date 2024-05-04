<?php

use Typecho\Widget\Helper\Form\Element\Checkbox;
use Typecho\Widget\Helper\Form\Element\Text;

require_once 'component/config.php';

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeVersion(): string
{
    return '3.0.240224';
}

function defaultBackgroundImage(): string
{
    return 'https://tva3.sinaimg.cn/large/0072Vf1pgy1foxkfdxnnqj31hc0u0h5j.jpg';
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
        $db->insert('table.options')->rows(array('name' => 'themeBackup:DreamCat', 'user' => '0', 'value' => $existingBackup['value']));
    }

    // 以下是处理不同类型的POST请求的逻辑
    if (isset($_POST['type'])) {
        switch ($_POST['type']) {
            case "备份模板数据":
                $currentValue = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:DreamCat'))['value'];
                $db->query($db->delete('table.options')->where('name = ?', 'themeBackup:DreamCat'));
                $db->query($db->insert('table.options')->rows(array('name' => 'themeBackup:DreamCat', 'user' => '0', 'value' => $currentValue)));
				echo '<div >备份完成！</div>';
                echo '<script>setTimeout(function(){ location.href = "'. Helper::options()->adminUrl('options-theme.php') .'"; }, 2500);</script>';
                break;
            case "还原模板数据":
                $backupData = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'themeBackup:DreamCat'));
                if ($backupData) {
                    $db->query($db->update('table.options')->rows(array('value' => $backupData['value']))->where('name = ?', 'theme:DreamCat'));
                    echo '<div >检测到模板备份数据，恢复完成！请等待自动刷新！若无反应请 <a href="'. Helper::options()->adminUrl('options-theme.php') .'">点击这里</a></div>';
                    echo '<script>setTimeout(function(){ location.href = "'. Helper::options()->adminUrl('options-theme.php') .'"; }, 2000);</script>';
                } else {
                    echo '<div >没有模板备份数据，恢复不了哦！</div>';
                }
                break;
            case "删除备份数据":
                $db->query($db->delete('table.options')->where('name = ?', 'themeBackup:DreamCat'));
                echo '<div >删除成功！请等待自动刷新！若无反应请 <a href="'. Helper::options()->adminUrl('options-theme.php') .'">点击这里</a></div>';
                echo '<script>setTimeout(function(){ location.href = "'. Helper::options()->adminUrl('options-theme.php') .'"; }, 2500);</script>';
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
    $text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text']);
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
    switch (true) {
        case ($options->DC_WebCdnRadio == 'FuseAccelerationMode'):
        case (empty($options->DC_WebCdnRadio) || $options->DC_WebCdnRadio == 'LocalMode'):
            echo($options->rootUrl . "/usr/themes/DreamCat/DreamCat_StaticResources/" . "$agent");
            break;
        default:
            $CustomCDN = $options->DC_CustomCdnUrl_User . "$agent";
            echo "$CustomCDN";
            break;
    }
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
    //$CDN_1 = 'https://gh.sourcegcdn.com/LychApe/DreamCat/InsiderPreview/';
    $CDN_1 = 'https://cdn.fallsoft.cn/gh/LychApe/DreamCat@' . themeVersion() . '/';
    if ($options->DC_WebCdnRadio == 'FuseAccelerationMode') {
        echo($CDN_1 . $URL_1 . $Path_C);
    } else {
        if (!empty($options->DC_CustomCdnUrl_User && $options->DC_WebCdnRadio == 'CustomMode')) {
            $CustomCDN = $options->DC_CustomCdnUrl_User . "$Path_L";
            echo "$CustomCDN";
        } else {
            echo($options->rootUrl . "/usr/themes/DreamCat/DreamCat_StaticResources/" . "$Path_L");
        }
    }

}

/**
 * 自定义字体
 * @author HanFengA7
 * version 0.04
 */
function CustomFont_url()
{
    $options = Helper::options();
    if ($options->DC_CustomFontRadio == "Ol_JetBrainsMono") {
        echo 'https://cdn.fallsoft.cn/gh/LychApe/DreamCat@fonts/fonts/JetBrainsMono-Regular.woff2';
    } elseif ($options->DC_CustomFontRadio == "Ol_SmileySans") {
        echo 'https://cdn.fallsoft.cn/gh/LychApe/DreamCat@fonts/fonts/SmileySans-Oblique.ttf.woff2';
    } elseif ($options->DC_CustomFontRadio == "Ol_HarmonyOS_Sans") {
        echo 'https://cdn.fallsoft.cn/gh/LychApe/DreamCat@fonts/fonts/HarmonyOS_Sans_SC_Regular.ttf';
    } elseif ($options->DC_CustomFontRadio == "CustomModeUser") {
        $CustomFont = $options->DC_CustomFont_User;
        echo($CustomFont);
    } else {
        CustomCDN_url("fonts/JetBrainsMono-Regular.woff2");
    }
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
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')->where('table.contents.created > ?', $widget->created)->where(
        'table.contents.status = ?', 'publish'
    )->where('table.contents.type = ?', $widget->type)->where('table.contents.password IS NULL')->order(
        'table.contents.created', Typecho_Db::SORT_ASC
    )->limit(1);
    $content = $db->fetchRow($sql);
    if ($content) {
        $content = $widget->filter($content);
        $link =
            '<a href="' . $content['permalink'] . '" class="mdui-ripple mdui-color-grey-50 mdui-col-xs-10 mdui-col-sm-6 doc-footer-nav-right"><div class="doc-footer-nav-text"><i class="mdui-icon material-icons">arrow_forward</i><span class="doc-footer-nav-direction">Next</span><div class="doc-footer-nav-chapter">' . $content['title'] . '</div></div></a>';
        echo $link;
    } else {
        $link2 =
            '<a class="mdui-ripple mdui-color-grey-50 mdui-col-xs-10 mdui-col-sm-6 doc-footer-nav-right"><div class="doc-footer-nav-text dreamcat-disabled"><i class="mdui-icon material-icons">arrow_forward</i><span class="doc-footer-nav-direction">Next</span><div class="doc-footer-nav-chapter">没有啦!!!</div></div></a>';
        echo $link2;
    }
}

/** 显示上一篇
 * @access public
 * @param $widget
 * @return Void
 */
function thePrev($widget)
{
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')->where('table.contents.created < ?', $widget->created)->where(
        'table.contents.status = ?', 'publish'
    )->where('table.contents.type = ?', $widget->type)->where('table.contents.password IS NULL')->order(
        'table.contents.created', Typecho_Db::SORT_DESC
    )->limit(1);
    $content = $db->fetchRow($sql);
    if ($content) {
        $content = $widget->filter($content);
        $link =
            '<a href="' . $content['permalink'] . '" class="mdui-ripple mdui-color-grey-50 mdui-col-xs-2 mdui-col-sm-6 doc-footer-nav-left"><div class="doc-footer-nav-text"><i class="mdui-icon material-icons">arrow_back</i><span class="doc-footer-nav-direction mdui-hidden-xs-down">Previous</span><div class="doc-footer-nav-chapter mdui-hidden-xs-down">' . $content['title'] . '</div></div></a>';
        echo $link;
    } else {
        $link2 =
            '<a class="mdui-ripple mdui-color-grey-50 mdui-col-xs-2 mdui-col-sm-6 doc-footer-nav-left"><div class="doc-footer-nav-text dreamcat-disabled"><i class="mdui-icon material-icons">arrow_back</i><span class="doc-footer-nav-direction mdui-hidden-xs-down">Previous</span><div class="doc-footer-nav-chapter mdui-hidden-xs-down">没有啦!!!</div></div></a>';
        echo $link2;
    }
}

/**
 * 获取浏览器信息
 * @param String $agent
 * @return String|bool
 */
function getBrowser($agent)
{
    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $output = 'IE Browser';
    } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Firefox/', $regs[0]);
        $FireFox_vern = explode('.', $str1[1]);
        $output = 'Firefox Browser ' . $FireFox_vern[0];
    } else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Maxthon/', $agent);
        $Maxthon_vern = explode('.', $str1[1]);
        $output = 'Maxthon Browser ' . $Maxthon_vern[0];
    } else if (preg_match('#SE2([a-zA-Z0-9.]+)#i', $agent)) {
        $output = 'Sogo Browser';
    } else if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent)) {
        $output = '360 Browser';
    } else if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Edge/', $regs[0]);
        $Edge_vern = explode('.', $str1[1]);
        $output = 'Edge ' . $Edge_vern[0];
    } else if (preg_match('/EdgiOS([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('EdgiOS/', $regs[0]);
        $output = 'Edge';
    } else if (preg_match('/UC/i', $agent)) {
        $str1 = explode('rowser/', $agent);
        $UCBrowser_vern = explode('.', $str1[1]);
        $output = 'UC Browser ' . $UCBrowser_vern[0];
    } else if (preg_match('/OPR/i', $agent)) {
        $str1 = explode('OPR/', $agent);
        $opr_vern = explode('.', $str1[1]);
        $output = 'Open Browser ' . $opr_vern[0];
    } else if (preg_match('/MicroMesseng/i', $agent)) {
        $output = 'Weixin Browser';
    } else if (preg_match('/WeiBo/i', $agent)) {
        $output = 'WeiBo Browser';
    } else if (preg_match('/QQ/i', $agent) || preg_match('/QQBrowser\/([^\s]+)/i', $agent)) {
        $str1 = explode('rowser/', $agent);
        $QQ_vern = explode('.', $str1[1]);
        $output = 'QQ Browser ' . $QQ_vern[0];
    } else if (preg_match('/MQBHD/i', $agent)) {
        $str1 = explode('MQBHD/', $agent);
        $QQ_vern = explode('.', $str1[1]);
        $output = 'QQ Browser ' . $QQ_vern[0];
    } else if (preg_match('/BIDU/i', $agent)) {
        $output = 'Baidu Browser';
    } else if (preg_match('/LBBROWSER/i', $agent)) {
        $output = 'KS Browser';
    } else if (preg_match('/TheWorld/i', $agent)) {
        $output = 'TheWorld Browser';
    } else if (preg_match('/XiaoMi/i', $agent)) {
        $output = 'XiaoMi Browser';
    } else if (preg_match('/UBrowser/i', $agent)) {
        $str1 = explode('rowser/', $agent);
        $UCBrowser_vern = explode('.', $str1[1]);
        $output = 'UCBrowser ' . $UCBrowser_vern[0];
    } else if (preg_match('/mailapp/i', $agent)) {
        $output = 'Email Browser';
    } else if (preg_match('/2345Explorer/i', $agent)) {
        $output = '2345 Browser';
    } else if (preg_match('/Sleipnir/i', $agent)) {
        $output = 'Sleipnir Browser';
    } else if (preg_match('/YaBrowser/i', $agent)) {
        $output = 'Yandex Browser';
    } else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent)) {
        $output = 'Opera Browser';
    } else {
        if (preg_match('/MZBrowser/i', $agent)) {
            $output = 'MZ Browser';
        } else {
            if (preg_match('/VivoBrowser/i', $agent)) {
                $output = 'Vivo Browser';
            } else if (preg_match('/Quark/i', $agent)) {
                $output = 'Quark Browser';
            } else if (preg_match('/mixia/i', $agent)) {
                $output = 'Mixia Browser';
            } else if (preg_match('/fusion/i', $agent)) {
                $output = 'Fusion';
            } else if (preg_match('/CoolMarket/i', $agent)) {
                $output = 'CoolMarket Browser';
            } else if (preg_match('/Thunder/i', $agent)) {
                $output = 'Thunder Browser';
            } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent)) {
                $str1 = explode('Chrome/', $agent);
                $chrome_vern = explode('.', $str1[1]);
                $output = 'Chrome ' . $chrome_vern[0];
            } else if (preg_match('/safari\/([^\s]+)/i', $agent)) {
                $str1 = explode('Version/', $agent);
                $safari_vern = explode('.', $str1[1]);
                $output = 'Safari' . $safari_vern[0];
            } else {
                return false;
            }
        }
    }
    return $output;
}


/** 获取操作系统信息
 * @return String
 * @example getOs($comments->agent);
 */
function getOs($agent)
{
    $os = false;
    if (preg_match('/win/i', $agent)) {
        if (preg_match('/nt 6.0/i', $agent)) {
            $os = 'Windows Vista';
        } else {
            if (preg_match('/nt 6.1/i', $agent)) {
                $os = 'Windows 7';
            } else {
                if (preg_match('/nt6.2/i', $agent)) {
                    $os = 'Windows 8';
                } else {
                    if (preg_match('/nt 6.3/i', $agent)) {
                        $os = 'Windows 8.1';
                    } else {
                        if (preg_match('/nt 5.1/i', $agent)) {
                            $os = 'Windows XP';
                        } else {
                            if (preg_match('/nt 10.0/i', $agent)) {
                                $os = 'Windows 10';
                            } else {
                                $os = 'Windows';
                            }
                        }
                    }
                }
            }
        }
    } else {
        if (preg_match('/android/i', $agent)) {
            if (preg_match('/android9/i', $agent)) {
                $os = 'Android P';
            } else {
                if (preg_match('/android 8/i', $agent)) {
                    $os = 'Android O';
                } else {
                    if (preg_match('/android 7/i', $agent)) {
                        $os = 'Android N';
                    } else {
                        if (preg_match('/android 6/i', $agent)) {
                            $os = 'Android M';
                        } else {
                            if (preg_match('/android 5/i', $agent)) {
                                $os = 'Android L';
                            } else {
                                $os = 'Android';
                            }
                        }
                    }
                }
            }
        } else {
            if (preg_match('/ubuntu/i', $agent)) {
                $os = 'Linux';
            } else {
                if (preg_match('/linux/i', $agent)) {
                    $os = 'Linux';
                } else {
                    if (preg_match('/iPhone/i', $agent)) {
                        $os = 'iPhone';
                    } else {
                        if (preg_match('/iPad/i', $agent)) {
                            $os =
                                'iPad';
                        } else {
                            if (preg_match('/mac/i', $agent)) {
                                $os = 'OSX';
                            } else {
                                if (preg_match('/cros/i', $agent)) {
                                    $os = 'Chrome os';
                                } else {
                                    return false;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $os;
}


?>
