<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeVersion()
    {
        return 'DreamCat X3.0 InsiderPreview 评估副本 Build 220731';
    }

function themeConfig($form)
{
    $DC_HeadImageUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_HeadImageUrl',
        null,
        null,
        _t('博客头像地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站前台显示头像，留空则显示默认头像')
    );
    $form->addInput($DC_HeadImageUrl);
    
    $DC_FooterLogoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_FooterLogoUrl',
        null,
        null,
        _t('底部Logo地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站底部显示Logo，留空则不显示')
    );
    $form->addInput($DC_FooterLogoUrl);
    
    $DC_WebFavicon = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_WebFavicon',
        null,
        null,
        _t('网站Favicon地址'),
        _t('网站Favicon将显示在网页标签的头部,留空则不显示')
    );
    $form->addInput($DC_WebFavicon);
    
    $DC_WebName = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_WebName',
        null,
        null,
        _t('网站标题'),
        _t('在这里填入一个网站标题, 以在网站前台显示网站标题，留空则不显示')
    );
    $form->addInput($DC_WebName);
    
    $DC_WebSlogan = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_WebSlogan',
        null,
        null,
        _t('网站标语'),
        _t('在这里填入一个首页标语, 以在网站前台显示首页标语，留空则不显示')
    );
    $form->addInput($DC_WebSlogan);
    
    $description = new \Typecho\Widget\Helper\Form\Element\Text(
        'description',
        null,
        null,
        _t('网站SEO描述'),
        _t('网站描述将显示在网页代码的头部,留空则不显示')
    );
    $form->addInput($description);
    
    $keywords = new \Typecho\Widget\Helper\Form\Element\Text(
        'keywords',
        null,
        null,
        _t('网站SEO关键字'),
        _t('请以半角逗号 "," 分割多个关键字,留空则不显示')
    );
    $form->addInput($keywords);
    
    $DC_NavigationBarModeRadio = new Typecho_Widget_Helper_Form_Element_Radio('DC_NavigationBarModeRadio', array(
        'ColurMode' => '单色背景模式',
        'ImgMode' => '图片背景模式',
    ), 'ColurMode', _t('导航栏模式'));
    $form->addInput($DC_NavigationBarModeRadio);
    
    $DC_AppImgBarColor = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_AppImgBarColor',
        null,
        null,
        _t('导航栏颜色值'),
        _t('选择单色背景模式在这里填入颜色值, 留空则默认')
    );
    $form->addInput($DC_AppImgBarColor);
    
    $DC_AppImgBarUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_AppImgBarUrl',
        null,
        null,
        _t('导航栏图片地址'),
        _t('选择图片背景模式在这里填入一个图片 URL 地址,留空则显示默认')
    );
    $form->addInput($DC_AppImgBarUrl);
    
    $DC_AppImgBarHeight = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_AppImgBarHeight',
        null,
        null,
        _t('导航栏高度'),
        _t('在这里填入导航栏高度, 以在网站导航栏显示，留空则显示默认')
    );
    $form->addInput($DC_AppImgBarHeight);
    
    $DC_ProfileCardName = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_ProfileCardName',
        null,
        null,
        _t('个人资料卡片名字'),
        _t('个人资料卡片名字将显示在个人资料卡片,留空则不显示')
    );
    $form->addInput($DC_ProfileCardName);
    
    $DC_ProfileCardIntroduction = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_ProfileCardIntroduction',
        null,
        null,
        _t('个人资料卡片介绍'),
        _t('个人资料卡片介绍将显示在个人资料卡片,留空则不显示')
    );
    $form->addInput($DC_ProfileCardIntroduction);
    
    $DC_AdmireQCode = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_AdmireQCode',
        null,
        null,
        _t('博客赞赏二维码地址'),
        _t('在这里填入赞赏二维码地址,留空则不显示')
    );
    $form->addInput($DC_AdmireQCode);
    
    
    $DC_GlobalApp = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'DC_GlobalApp',
        [
            'DCShowClickEffect'     => _t('点击特效'),
            'DCShowPublicationTime' => _t('首页文章显示发表时间'),
            'DCShowRSS'             => _t('侧边栏RSS'),
        ],
        ['DCShowClickEffect', 'DCShowPublicationTime', 'DCShowRSS'],
        _t('全局应用')
    );
    $form->addInput($DC_GlobalApp->multiMode());

    $DC_WebCdnRadio = new Typecho_Widget_Helper_Form_Element_Radio('DC_WebCdnRadio', array(
        'LocalMode' => '本地资源模式',
        'FuseAccelerationMode' => '融合CDN加速模式',
        'CustomMode' => '自定义CDN加速模式'
    ), 'black', _t('自定义CDN设置'));
    $form->addInput($DC_WebCdnRadio);
    $DC_CustomCdnUrl_User = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_CustomCdnUrl_User',
        null,
        null,
        _t('CDN静态资源链接'),
        _t('选择自定义CDN加速模式即可填写CDN静态资源链接')
    );
    $form->addInput($DC_CustomCdnUrl_User);
    $DC_CustomFont_User = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_CustomFont_User',
        null,
        null,
        _t('自定义字体'),
        _t('填入一个字体接链或留空')
    );
    $form->addInput($DC_CustomFont_User);
    
    $DC_CustomRandomPictures = new \Typecho\Widget\Helper\Form\Element\Text(
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
    
    $DC_A_qq = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_A_qq',null,null,_t('QQ二维码图片地址'),_t('填写您的QQ二维码图片地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_qq);
    $DC_A_wx = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_A_wx',null,null,_t('微信二维码图片地址'),_t('填写您的微信二维码图片地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_wx);
    $DC_A_zfb = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_A_zfb',null,null,_t('支付宝二维码图片地址'),_t('填写您的支付宝二维码图片地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_zfb);
    $DC_A_wb = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_A_wb',null,null,_t('微博地址'),_t('填写您的微博地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_wb);
    $DC_A_github = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_A_github',null,null,_t('Github地址'),_t('填写您的Github地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_github);
    $DC_A_linkedin = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_A_linkedin',null,null,_t('Linkedin地址'),_t('填写您的Linkedin地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_linkedin);
    $DC_A_telegram = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_A_telegram',null,null,_t('Telegram地址'),_t('填写您的Telegram地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_telegram);
    $DC_A_bilibili = new \Typecho\Widget\Helper\Form\Element\Text(
        'DC_A_bilibili',null,null,_t('BiliBili地址'),_t('填写您的BiliBili地址,它将在首页以及其他地方显示，不填则不显示'));
    $form->addInput($DC_A_bilibili);
    
    
    
    
    //备份开始
    $db = Typecho_Db::get();
    $sjdq=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:DreamCat'));
    $ysj = $sjdq['value'];
    if(isset($_POST['type']))
    { 
    if($_POST["type"]=="备份模板数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:DreamCatbf'))){
    $update = $db->update('table.options')->rows(array('value'=>$ysj))->where('name = ?', 'theme:DreamCatbf');
    $updateRows= $db->query($update);
    echo '<div class="tongzhi">备份已更新，请等待自动刷新！如果等不到请点击';
    ?>    
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }else{
    if($ysj){
         $insert = $db->insert('table.options')
        ->rows(array('name' => 'theme:DreamCatbf','user' => '0','value' => $ysj));
         $insertId = $db->query($insert);
    echo '<div class="tongzhi">备份完成，请等待自动刷新！如果等不到请点击';
    ?>    
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }
    }
            }
    if($_POST["type"]=="还原模板数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:DreamCatbf'))){
    $sjdub=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:DreamCatbf'));
    $bsj = $sjdub['value'];
    $update = $db->update('table.options')->rows(array('value'=>$bsj))->where('name = ?', 'theme:DreamCat');
    $updateRows= $db->query($update);
    echo '<div class="tongzhi">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
    ?>    
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
    <?php
    }else{
    echo '<div class="tongzhi">没有模板备份数据，恢复不了哦！</div>';
    }
    }
    if($_POST["type"]=="删除备份数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:DreamCatbf'))){
    $delete = $db->delete('table.options')->where ('name = ?', 'theme:DreamCatbf');
    $deletedRows = $db->query($delete);
    echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
    ?>    
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }else{
    echo '<div class="tongzhi">不用删了！备份不存在！！！</div>';
    }
    }
        }
    echo '<form class="protected" action="?DreamCatbf" method="post">
    <input type="submit" name="type" class="btn btn-s" value="备份模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form>';
    //备份结束

}

function themeFields($layout) {
    $User_ImageUrl_TF = new Typecho_Widget_Helper_Form_Element_Text(
        'User_ImageUrl_TF', 
        null, 
        null, 
        _t('文章头图'), 
        _t('文章头图会显示在文章的顶部及首页展示图片'));
    $layout->addItem($User_ImageUrl_TF); 
}

#################################
#CustomCDN_url                  #
#author：HanFengA7              #
#version：0.13                  #
#################################
function CustomCDN_url($agent) {
	$options = Helper::options();
	switch (true) {
	    case (empty($options->DC_WebCdnRadio) || $options->DC_WebCdnRadio == 'LocalMode'):
            echo ($options->rootUrl . "/usr/themes/DreamCat/DreamCat_StaticResources/" . "$agent");
	        break;
	    case ($options->DC_WebCdnRadio == 'FuseAccelerationMode'):
	        echo ($options->rootUrl . "/usr/themes/DreamCat/DreamCat_StaticResources/" . "$agent");
	        break;
	    default:
	        $CustomCDN = $options->DC_CustomCdnUrl_User."$agent";
		    echo "$CustomCDN";
	        break;
	}
}


#################################
#CustomCDN_FuseAccelerationMode #
#author：HanFengA7              #
#version：0.14                  #
#################################
function CustomCDN_FAM($URL_1,$URL_2,$Path_L,$Path_C){
    $options = Helper::options();
    $CDN_1 = '//cdnjs.sourcegcdn.com/';
    $CDN_2 = '//cdnjs.cloudflare.com/';
    $CDN_HTTP = 'http:';
    if ($options->DC_WebCdnRadio == 'FuseAccelerationMode') {
        #CDN:[SourcegCdn][1]
        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_URL,$CDN_HTTP.$CDN_1.$URL_1.$Path_C);
        curl_setopt($ch1, CURLOPT_TIMEOUT, 0.1); #整个cURL函数执行过程的最长等待时间
        curl_setopt($ch1, CURLOPT_CONNECTTIMEOUT, 0.05); #连接对方最长等待时间
        curl_setopt($ch1, CURLOPT_NOBODY, 1);
        curl_setopt($ch1, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        $result_1 = ((curl_exec($ch1)!==false) ? true : false );
        $result_1_httpcode = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
        if ($result_1_httpcode == "200"){
            if ($result_1 == true) {
                echo($CDN_1.$URL_1.$Path_C);
                curl_close($ch1);
            }
        }else{
            #CDN:[cloudflare][2]
            $ch2 = curl_init();
            curl_setopt($ch2, CURLOPT_URL,$CDN_HTTP.$CDN_2.$URL_2.$Path_C);
            curl_setopt($ch2, CURLOPT_TIMEOUT, 0.1); #整个cURL函数执行过程的最长等待时间
            curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 0.05); #连接对方最长等待时间
            curl_setopt($ch2, CURLOPT_NOBODY, 1);
            curl_setopt($ch2, CURLOPT_FAILONERROR, 1);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
            $result_2 = ((curl_exec($ch2)!==false) ? true : false );
            $result_2_httpcode = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
            if ($result_2_httpcode == "200") {
                if ($result_2 == true) {
                    echo($CDN_2.$URL_2.$Path_C);
                    curl_close($ch2);
                }
            }else{
                    echo ($options->rootUrl . "/usr/themes/DreamCat/DreamCat_StaticResources/" . "$Path_L");
                }
            }
    } else {
        if (!empty($options->DC_CustomCdnUrl_User && $options->DC_WebCdnRadio == 'CustomMode')) {
	        $CustomCDN = $options->DC_CustomCdnUrl_User."$Path_L";
		    echo "$CustomCDN";
        }else{
            echo ($options->rootUrl . "/usr/themes/DreamCat/DreamCat_StaticResources/" . "$Path_L");
        }
    }
    
}



#################################
#CustomCDN_FuseAccelerationMode #
#[自定义字体]                   #
#author：HanFengA7              #
#version：0.03                  #
#################################
function CustomFont_url() {
	$options = Helper::options();
	if ($options->CustomFont == '') {
		CustomCDN_url("fonts/JetBrainsMono-Regular.woff2");
	}
	else {
		$CustomFont = $options->CustomFont;
		echo($CustomFont);
	}
}



#################################
#thumb                          #
#[随机图片]                     #
#author：HanFengA7              #
#version：0.15                  #
#################################
function thumb($obj) {
	$rand_num = 10;
	$options = Helper::options();
	if (empty($options->DC_CustomRandomPictures)) {
		$imgcdn = 'https://api.btstu.cn/sjbz/api.php?lx=fengjing&format=images&sj=';
		#https://api.ixiaowai.cn/gqapi/gqapi.php?lx=fengjing&sj=
		#https://api.btstu.cn/sjbz/api.php?lx=fengjing&format=images&sj=
	}else {
		$imgcdn = $options->DC_CustomRandomPictures;
	}
	
	if ($rand_num == 0) {
		$imgurl = $imgcdn . "/img/OER/0.jpg"; //如果$rand_num = 0,则显示默认图片，须命名为"0.jpg"
	}
	else {
		$imgurl = $imgcdn . "/img/OER/" . rand(1, $rand_num) . ".jpg"; // 须按"1.jpg","2.jpg","3.jpg"，一定要安装顺序
	}
	$attach = $obj->attachments(1)->attachment;
	if (isset($attach->isImage) && $attach->isImage == 1) {
		$thu = [0, $attach->url];
	}
	else {
		$thu = [1, $imgurl];
	}
	return $thu;
}

















/** 显示下一篇
 * @access public
 * @param String $default 如果没有上一篇,显示的默认文字
 * @return Void
 */
function theNext($widget) {
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
	}
	else {
		$link2 =
				'<a class="mdui-ripple mdui-color-grey-50 mdui-col-xs-10 mdui-col-sm-6 doc-footer-nav-right"><div class="doc-footer-nav-text"><i class="mdui-icon material-icons">arrow_forward</i><span class="doc-footer-nav-direction">Next</span><div class="doc-footer-nav-chapter">没有啦!!!</div></div></a>';
		echo $link2;
	}
}

/** 显示上一篇
 * @access public
 * @param String $default 如果没有下一篇,显示的默认文字
 * @return Void
 */
function thePrev($widget) {
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
	}
	else {
		$link2 =
				'<a class="mdui-ripple mdui-color-grey-50 mdui-col-xs-2 mdui-col-sm-6 doc-footer-nav-left"><div class="doc-footer-nav-text"><i class="mdui-icon material-icons">arrow_back</i><span class="doc-footer-nav-direction mdui-hidden-xs-down">Previous</span><div class="doc-footer-nav-chapter mdui-hidden-xs-down">没有啦!!!</div></div></a>';
		
		echo $link2;
	}
}

	/** 获取浏览器信息
	 * @return String
	 * @example getBrowser($comments->agent);
	 */
	function getBrowser($agent) {
		$outputer = null;
		if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
			$outputer = 'IE Browser';
		}
		else {
			if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
				$str1 = explode('Firefox/', $regs[0]);
				$FireFox_vern = explode('.', $str1[1]);
				$outputer = 'Firefox Browser ' . $FireFox_vern[0];
			}
			else {
				if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
					$str1 = explode('Maxthon/', $agent);
					$Maxthon_vern = explode('.', $str1[1]);
					$outputer = 'Maxthon Browser ' . $Maxthon_vern[0];
				}
				else {
					if (preg_match('#SE2([a-zA-Z0-9.]+)#i', $agent, $regs)) {
						$outputer = 'Sogo Browser';
					}
					else {
						if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
							$outputer = '360 Browser';
						}
						else {
							if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
								$str1 = explode('Edge/', $regs[0]);
								$Edge_vern = explode('.', $str1[1]);
								$outputer = 'Edge ' . $Edge_vern[0];
							}
							else {
								if (preg_match('/EdgiOS([\d]*)\/([^\s]+)/i', $agent, $regs)) {
									$str1 = explode('EdgiOS/', $regs[0]);
									$outputer = 'Edge';
								}
								else {
									if (preg_match('/UC/i', $agent)) {
										$str1 = explode('rowser/', $agent);
										$UCBrowser_vern = explode('.', $str1[1]);
										$outputer = 'UC Browser ' . $UCBrowser_vern[0];
									}
									else {
										if (preg_match('/OPR/i', $agent)) {
											$str1 = explode('OPR/', $agent);
											$opr_vern = explode('.', $str1[1]);
											$outputer = 'Open Browser ' . $opr_vern[0];
										}
										else {
											if (preg_match('/MicroMesseng/i', $agent, $regs)) {
												$outputer = 'Weixin Browser';
											}
											else {
												if (preg_match('/WeiBo/i', $agent, $regs)) {
													$outputer = 'WeiBo Browser';
												}
												else {
													if (preg_match('/QQ/i', $agent, $regs) || preg_match(
																	'/QQBrowser\/([^\s]+)/i', $agent, $regs
															)) {
														$str1 = explode('rowser/', $agent);
														$QQ_vern = explode('.', $str1[1]);
														$outputer = 'QQ Browser ' . $QQ_vern[0];
													}
													else {
														if (preg_match('/MQBHD/i', $agent, $regs)) {
															$str1 = explode('MQBHD/', $agent);
															$QQ_vern = explode('.', $str1[1]);
															$outputer = 'QQ Browser ' . $QQ_vern[0];
														}
														else {
															if (preg_match('/BIDU/i', $agent, $regs)) {
																$outputer = 'Baidu Browser';
															}
															else {
																if (preg_match('/LBBROWSER/i', $agent, $regs)) {
																	$outputer = 'KS Browser';
																}
																else {
																	if (preg_match('/TheWorld/i', $agent, $regs)) {
																		$outputer = 'TheWorld Browser';
																	}
																	else {
																		if (preg_match('/XiaoMi/i', $agent, $regs)) {
																			$outputer = 'XiaoMi Browser';
																		}
																		else {
																			if (preg_match(
																					'/UBrowser/i', $agent, $regs
																			)) {
																				$str1 = explode('rowser/', $agent);
																				$UCBrowser_vern =
																						explode('.', $str1[1]);
																				$outputer =
																						'UCBrowser ' . $UCBrowser_vern[0];
																			}
																			else {
																				if (preg_match(
																						'/mailapp/i', $agent, $regs
																				)) {
																					$outputer = 'Email Browser';
																				}
																				else {
																					if (preg_match(
																							'/2345Explorer/i', $agent,
																							$regs
																					)) {
																						$outputer = '2345 Browser';
																					}
																					else {
																						if (preg_match(
																								'/Sleipnir/i', $agent,
																								$regs
																						)) {
																							$outputer =
																									'Sleipnir Browser';
																						}
																						else {
																							if (preg_match(
																									'/YaBrowser/i',
																									$agent,
																									$regs
																							)) {
																								$outputer =
																										'Yandex Browser';
																							}
																							else {
																								if (preg_match(
																										'/Opera[\s|\/]([^\s]+)/i',
																										$agent, $regs
																								)) {
																									$outputer =
																											'Opera Browser';
																								}
																								else {
																									if (preg_match(
																											'/MZBrowser/i',
																											$agent,
																											$regs
																									)) {
																										$outputer =
																												'MZ Browser';
																									}
																									else {
																										if (preg_match(
																												'/VivoBrowser/i',
																												$agent,
																												$regs
																										)) {
																											$outputer =
																													'Vivo Browser';
																										}
																										else {
																											if (preg_match(
																													'/Quark/i',
																													$agent,
																													$regs
																											)) {
																												$outputer =
																														'Quark Browser';
																											}
																											else {
																												if (preg_match(
																														'/mixia/i',
																														$agent,
																														$regs
																												)) {
																													$outputer =
																															'Mixia Browser';
																												}
																												else {
																													if (preg_match(
																															'/fusion/i',
																															$agent,
																															$regs
																													)) {
																														$outputer =
																																'Fusion';
																													}
																													else {
																														if (preg_match(
																																'/CoolMarket/i',
																																$agent,
																																$regs
																														)) {
																															$outputer =
																																	'CoolMarket Browser';
																														}
																														else {
																															if (preg_match(
																																	'/Thunder/i',
																																	$agent,
																																	$regs
																															)) {
																																$outputer =
																																		'Thunder Browser';
																															}
																															else {
																																if (preg_match(
																																		'/Chrome([\d]*)\/([^\s]+)/i',
																																		$agent,
																																		$regs
																																)) {
																																	$str1 =
																																			explode(
																																					'Chrome/',
																																					$agent
																																			);
																																	$chrome_vern =
																																			explode(
																																					'.',
																																					$str1[1]
																																			);
																																	$outputer =
																																			'Chrome ' . $chrome_vern[0];
																																}
																																else {
																																	if (preg_match(
																																			'/safari\/([^\s]+)/i',
																																			$agent,
																																			$regs
																																	)) {
																																		$str1 =
																																				explode(
																																						'Version/',
																																						$agent
																																				);
																																		$safari_vern =
																																				explode(
																																						'.',
																																						$str1[1]
																																				);
																																		$outputer =
																																				'Safari' . $safari_vern[0];
																																	}
																																	else {
																																		return false;
																																	}
																																}
																															}
																														}
																													}
																												}
																											}
																										}
																									}
																								}
																							}
																						}
																					}
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
		return $outputer;
	}
	
	/** 获取操作系统信息
	 * @return String
	 * @example getOs($comments->agent);
	 */
	function getOs($agent) {
		$os = false;
		if (preg_match('/win/i', $agent)) {
			if (preg_match('/nt 6.0/i', $agent)) {
				$os = 'Windows Vista';
			}
			else {
				if (preg_match('/nt 6.1/i', $agent)) {
					$os = 'Windows 7';
				}
				else {
					if (preg_match('/nt6.2/i', $agent)) {
						$os = 'Windows 8';
					}
					else {
						if (preg_match('/nt 6.3/i', $agent)) {
							$os = 'Windows 8.1';
						}
						else {
							if (preg_match('/nt 5.1/i', $agent)) {
								$os = 'Windows XP';
							}
							else {
								if (preg_match('/nt 10.0/i', $agent)) {
									$os = 'Windows 10';
								}
								else {
									$os = 'Windows';
								}
							}
						}
					}
				}
			}
		}
		else {
			if (preg_match('/android/i', $agent)) {
				if (preg_match('/android9/i', $agent)) {
					$os = 'Android P';
				}
				else {
					if (preg_match('/android 8/i', $agent)) {
						$os = 'Android O';
					}
					else {
						if (preg_match('/android 7/i', $agent)) {
							$os = 'Android N';
						}
						else {
							if (preg_match('/android 6/i', $agent)) {
								$os = 'Android M';
							}
							else {
								if (preg_match('/android 5/i', $agent)) {
									$os = 'Android L';
								}
								else {
									$os = 'Android';
								}
							}
						}
					}
				}
			}
			else {
				if (preg_match('/ubuntu/i', $agent)) {
					$os = 'Linux';
				}
				else {
					if (preg_match('/linux/i', $agent)) {
						$os = 'Linux';
					}
					else {
						if (preg_match('/iPhone/i', $agent)) {
							$os = 'iPhone';
						}
						else {
							if (preg_match('/iPad/i', $agent)) {
								$os =
										'iPad';
							}
							else {
								if (preg_match('/mac/i', $agent)) {
									$os = 'OSX';
								}
								else {
									if (preg_match('/cros/i', $agent)) {
										$os = 'Chrome os';
									}
									else {
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