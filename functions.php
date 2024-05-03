<?php

use Typecho\Widget\Helper\Form\Element\Checkbox;
use Typecho\Widget\Helper\Form\Element\Text;

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeVersion(): string
{
    return '3.0.240224';
}

function defaultBackgroundImage(): string
{
    return 'https://tva3.sinaimg.cn/large/0072Vf1pgy1foxkfdxnnqj31hc0u0h5j.jpg';
}

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
	<link rel="dns-prefetch" href="//cdn.staticfile.org" />
	<link rel="stylesheet preload" href="//cdn.staticfile.org/mdui/1.0.2/css/mdui.min.css" as="style" >
	<!-- 配置中心=>CSS [End] -->

	<style >
		.mdui-tab .mdui-tab-active {
			color: rgb(74 69 62 / 70%);
			opacity: 2;
		}

		.mdui-tab-indicator {
			background-color: rgb(74 69 62 / 70%);
		}

		.fillet-A1 {
			border-radius: .5rem
		}

		.shadow-A1 {
			box-shadow: .5rem .875rem 2.375rem rgba(39, 44, 49, .06), .0625rem .1875rem .5rem rgba(39, 44, 49, .03)
		}

		.button-ts {
			position: relative
		}

		.button-ts:active {
			transform: translateY(2px);
			-webkit-transition: box-shadow 2.5s;
			box-shadow: .5rem .875rem 2.375rem rgba(255, 255, 255, .12),
			.0625rem .1875rem .5rem transparent
		}

		.primary {
			border: none;
			background-color: #d8d8d8;
			cursor: pointer;
			border-radius: 2px;
			color: #FFF;
		}

		.primary:hover {
			transition-duration: 1.5s;
			background-color: rgb(74 69 62 / 70%);
		}

		.primary:disabled {
			background-color: #edecec;
			cursor: default;
		}
	</style >

	<div class="mdui-card" >

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
						<div class="mdui-card shadow-A1 button-ts" style="background-color: rgb(130 123 123 / 14%);" >
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
						<div class="mdui-card shadow-A1 button-ts" mdui-dialog="{target: '#exampleDialog'}"
						     style="background-color: rgb(130 123 123 / 14%);" >
							<div class="mdui-card-header" >
								<img class="mdui-card-header-avatar"
								     src="https://i.loli.net/2020/01/19/gHs2Kb39YixpyE4.png"
								     alt="" />
								<div class="mdui-card-header-title" >开发者</div >
								<div class="mdui-card-header-subtitle" >简单不先于复杂,而是在复杂之后</div >
							</div >
						</div >
					</div >
				</div >
				<br />

				<div class="mdui-card shadow-A1" style="background-color: rgb(130 123 123 / 14%);" >
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

				<div class="mdui-card shadow-A1" style="background-color: rgb(130 123 123 / 14%);" >
					<div class="mdui-card-content" >
						最新版本：<a href="https://github.com/LychApe/DreamCat/" ><img
									alt="GitHub release (latest by date)"
									src="https://img.shields.io/github/v/release/LychApe/DreamCat?style=flat-square" ></a >
						<div class="mdui-float-right" >当前版本：<?php echo(themeVersion()); ?></div >
					</div >
				</div >
				<br />

				<div class="mdui-card shadow-A1" style="background-color: rgb(130 123 123 / 14%);" >
					<div class="mdui-card-content" >
						<div class="mdui-typo" >
							<p >QQ交流群:1034830519</p >
							<p >最后，祝您使用愉快:)</p >
						</div >
					</div >
				</div >
			</div >
		</div >
		<!-- 配置中心=>模板信息 [End]-->

		<!-- 配置中心=>弹窗:开发者列表 [Start]-->
		<div class="mdui-card-content" >
			<div class="mdui-dialog" id="exampleDialog" >
				<div class="mdui-dialog-title" >开发者列表</div >
				<div class="mdui-dialog-content" >
					<div class="mdui-row-xs-2" >
						<div class="mdui-col" >
							<div class="mdui-card shadow-A1 button-ts"
							     style="background-color: rgb(130 123 123 / 14%);" >
								<div class="mdui-card-header" >
									<img class="mdui-card-header-avatar"
									     src="https://q2.qlogo.cn/headimg_dl?dst_uin=1091044631@qq.com&spec=640" />
									<div class="mdui-card-header-title" >HanFengA7</div >
									<div class="mdui-card-header-subtitle" >所幸抬头仰望,总有星辰相伴!</div >
								</div >
							</div >
							<br />
						</div >
						<div class="mdui-col" >
							<div class="mdui-card shadow-A1 button-ts"
							     style="background-color: rgb(130 123 123 / 14%);" >
								<div class="mdui-card-header" >
									<img class="mdui-card-header-avatar"
									     src="https://q2.qlogo.cn/headimg_dl?dst_uin=2206645368@qq.com&spec=640" />
									<div class="mdui-card-header-title" >TeddyNight</div >
									<div class="mdui-card-header-subtitle" >自由和未来不可以被妥协</div >
								</div >
							</div >
							<br />
						</div >
						<div class="mdui-col" >
							<div class="mdui-card shadow-A1 button-ts"
							     style="background-color: rgb(130 123 123 / 14%);" >
								<div class="mdui-card-header" >
									<img class="mdui-card-header-avatar"
									     src="https://q2.qlogo.cn/headimg_dl?dst_uin=1906944165@qq.com&spec=640" />
									<div class="mdui-card-header-title" >Dev-Leo</div >
									<div class="mdui-card-header-subtitle" >不忘初心,牢记使命！</div >
								</div >
							</div >
							<br />
						</div >
						<div class="mdui-col" >
							<div class="mdui-card shadow-A1 button-ts"
							     style="background-color: rgb(130 123 123 / 14%);" >
								<div class="mdui-card-header" >
									<img class="mdui-card-header-avatar"
									     src="https://q2.qlogo.cn/headimg_dl?dst_uin=2135620856@qq.com&spec=640" />
									<div class="mdui-card-header-title" >CornWorld</div >
									<div class="mdui-card-header-subtitle" >"希望人没事"</div >
								</div >
							</div >
							<br />
						</div >
						<div class="mdui-col" >
							<div class="mdui-card shadow-A1 button-ts"
							     style="background-color: rgb(130 123 123 / 14%);" >
								<div class="mdui-card-header" >
									<img class="mdui-card-header-avatar"
									     src="https://q2.qlogo.cn/headimg_dl?dst_uin=1846405136@qq.com&spec=640" />
									<div class="mdui-card-header-title" >WhiteBearcn</div >
									<div class="mdui-card-header-subtitle" ></div >
								</div >
							</div >
							<br />
						</div >
						<div class="mdui-col" >
							<div class="mdui-card shadow-A1 button-ts" mdui-dialog="{target: '#exampleDialog'}"
							     style="background-color: rgb(130 123 123 / 14%);" >
								<div class="mdui-card-header" >
									<img class="mdui-card-header-avatar"
									     src="https://q2.qlogo.cn/headimg_dl?dst_uin=2477819731@qq.com&spec=640" />
									<div class="mdui-card-header-title" >学神之女</div >
									<div class="mdui-card-header-subtitle" >举头望涵涵，低头思第一。</div >
								</div >
							</div >
							<br />
						</div >
					</div >
					<br />
					除此之外，还有很多来自全世界的开发者正通过 GitHub 向我们提交贡献。
				</div >
				<div class="mdui-dialog-actions" >
					<button class="mdui-btn mdui-ripple" mdui-dialog-confirm >确认</button >
				</div >
			</div >
		</div >
		<!-- 配置中心=>弹窗:开发者列表 [End]-->
		<!-- 配置中心=>JS [Start] -->
		<script rel="preload" src="//cdn.staticfile.org/jquery/3.6.0/jquery.min.js" as="script" ></script >
		<script rel="preload" src="//cdn.staticfile.org/mdui/1.0.2/js/mdui.min.js" as="script" ></script >
		<!-- 配置中心=>JS [End] -->

	</div >
	<br />
	<br />
    <?php
//备份开始
    $db = Typecho_Db::get();
    $sjdq = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:DreamCat'));
    $ysj = $sjdq['value'];
    if (isset($_POST['type'])) {
        if ($_POST["type"] == "备份模板数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:DreamCatbf'))) {
                $update = $db->update('table.options')->rows(array('value' => $ysj))->where('name = ?', 'theme:DreamCatbf');
                $updateRows = $db->query($update);
                echo '<div class="tongzhi">备份已更新，请等待自动刷新！如果等不到请点击';
                ?>
				<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>" >这里</a ></div>
				<script language="JavaScript" >
					window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);
				</script >
                <?php
            } else {
                if ($ysj) {
                    $insert = $db->insert('table.options')
                        ->rows(array('name' => 'theme:DreamCatbf', 'user' => '0', 'value' => $ysj));
                    $insertId = $db->query($insert);
                    echo '<div class="tongzhi">备份完成，请等待自动刷新！如果等不到请点击';
                    ?>
					<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>" >这里</a ></div>
					<script language="JavaScript" >
						window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);
					</script >
                    <?php
                }
            }
        }
        if ($_POST["type"] == "还原模板数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:DreamCatbf'))) {
                $sjdub = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:DreamCatbf'));
                $bsj = $sjdub['value'];
                $update = $db->update('table.options')->rows(array('value' => $bsj))->where('name = ?', 'theme:DreamCat');
                $updateRows = $db->query($update);
                echo '<div class="tongzhi">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
                ?>
				<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>" >这里</a ></div>
				<script language="JavaScript" >
					window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);
				</script >
                <?php
            } else {
                echo '<div class="tongzhi">没有模板备份数据，恢复不了哦！</div>';
            }
        }
        if ($_POST["type"] == "删除备份数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:DreamCatbf'))) {
                $delete = $db->delete('table.options')->where('name = ?', 'theme:DreamCatbf');
                $deletedRows = $db->query($delete);
                echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
                ?>
				<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>" >这里</a ></div>
				<script language="JavaScript" >
					window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);
				</script >
                <?php
            } else {
                echo '<div class="tongzhi">不用删了！备份不存在！！！</div>';
            }
        }
    }
    echo '<form class="protected" action="?DreamCatbf" method="post">
    <input type="submit" name="type" class="btn btn-s" value="备份模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form>';
    //备份结束

}

//function themeFields($layout)
//{
//    $User_ImageUrl_TF = new Typecho_Widget_Helper_Form_Element_Text(
//        'User_ImageUrl_TF',
//        null,
//        null,
//        _t('文章头图'),
//        _t('文章头图会显示在文章的顶部及首页展示图片'));
//    $layout->addItem($User_ImageUrl_TF);
//}
// TODO

#################################
#art_count                      #
#author：HanFengA7              #
#version：0.02                  #
#################################
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
 * @author HanFeng47
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
 * @author HanFeng47
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
 * @author HanFeng47
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
