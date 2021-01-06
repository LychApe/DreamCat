<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

define("THEME_URL", rtrim(preg_replace('/^'.preg_quote($options->siteUrl, '/').'/', $options->rootUrl.'/', $options->themeUrl, 1),'/'));

function themeConfig($form) {
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('logoUrl'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('Dec'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('title'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('keywords'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('description'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('Decc'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('commentszs'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('headbj1'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('headbj2'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('qq'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('weixin'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('zfb'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('weibo'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('baidusl'));
	$form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('articletime'));
	$options = Typecho_Widget::widget('Widget_Options');
		$Html = <<<HTML
	<link rel="stylesheet" href="/usr/themes/DreamCat/layui/css/layui.css?v=2.5.6">
	<script src="/usr/themes/DreamCat/layui/layui.js?v=2.5.6"></script>
	
<div style="background-color: #F2F2F2;">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md12">
      <div class="layui-card">
   <br>
        <div class="layui-card-body">
	<fieldset class="layui-elem-field">
	
		<legend>DreamCat 主题配置中心 <small> Version:1.8</small></legend>

      	<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
		<legend>基本设置</legend>
		</fieldset>
		<div class="layui-field-box">
			<div class="layui-form-item">
				<label class="layui-form-label">头像图片<br/>地址</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_logoUrl" value="{$options->logoUrl}" placeholder="网站 LOGO 地址" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">在这里填入一个图片 URL 地址, 以在网站前台显示头像，留空则显示默认头像</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">网站标题</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_title" value="{$options->title}" placeholder="网站标题" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">留空则不显示</div>
				</div>
			</div>
				<div class="layui-form-item">
				<label class="layui-form-label">网站<br/>SEO描述</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_description" value="{$options->description}" placeholder="网站SEO描述" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">网站描述将显示在网页代码的头部,留空则不显示</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">网站<br/>SEO关键字</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_keywords" value="{$options->keywords}" placeholder="网站SEO关键字" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">请以半角逗号 "," 分割多个关键字</div>
				</div>
			</div>
			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
		<legend>首页设置</legend>
		</fieldset>
			<div class="layui-form-item">
				<label class="layui-form-label">首页标语</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_Dec" value="{$options->Dec}" placeholder="填入首页标语" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">填入首页标语</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">站点首页<br/>博主栏<br/>显示文字</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_Decc" value="{$options->Decc}" placeholder="填入一个具有逼格的首页博主栏简介或者说明" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">填入一个具有逼格的首页博主栏简介或者说明</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">文章可评论<br/>的字数</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_commentszs" value="{$options->commentszs}" placeholder="填入一个数字" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">填入一个数字,限制评论的字数</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">首页公告栏<br/>背景地址</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_headbj1" value="{$options->headbj1}" placeholder="填入一个图片地址" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">填入一个图片地址，不填则显示默认背景(地球)</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">首页博主栏<br/>背景地址</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_headbj2" value="{$options->headbj2}" placeholder="填入一个图片地址" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">填入一个图片地址，不填则显示默认背景(地球)</div>
				</div>
			</div>
				<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">首页文章<br/>是否显示<br/>发表时间</label>
					<div class="layui-input-inline" style="width: 80px;">
						<input type="checkbox" name="dreamcat_articletime" value="checked" lay-skin="switch" lay-text="开启|关闭" {$options->articletime} >
						<div class="layui-word-aux">开启则首页文章显示发表时间</div>
					</div>
					
				</div>
			</div>
			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
		<legend>联系方式设置</legend>
		</fieldset>
			<div class="layui-form-item">
				<label class="layui-form-label">您的QQ<br/>二维码图片<br/>地址</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_qq" value="{$options->qq}" placeholder="填写QQ二维码图片地址" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">填写您的QQ二维码图片地址,它将在首页以及其他地方显示，不填则不显示</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">您的微信<br/>二维码图片<br/>地址</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_weixin" value="{$options->weixin}" placeholder="填写微信二维码图片地址" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">填写您的微信二维码图片地址,它将在首页以及其他地方显示，不填则不显示</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">您的支付宝<br/>二维码图片<br/>地址</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_zfb" value="{$options->zfb}" placeholder="填写支付宝二维码图片地址" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">填写您的支付宝二维码图片地址,它将在首页以及其他地方显示，不填则不显示</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">您的微博<br/>二维码图片<br/>地址</label>
				<div class="layui-input-block">
					<input type="text" name="dreamcat_weibo" value="{$options->weibo}" placeholder="填写微博二维码图片地址" autocomplete="off" class="layui-input">
					<div class="layui-word-aux">填写您的微博二维码图片地址,它将在首页以及其他地方显示，不填则不显示</div>
				</div>
			</div>
			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
		<legend>文章页设置</legend>
		</fieldset>
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">是否开启<br/>百度收录显示</label>
					<div class="layui-input-inline" style="width: 80px;">
						<input type="checkbox" name="dreamcat_baidusl" value="checked" lay-skin="switch" lay-text="开启|关闭" {$options->baidusl} >
						<div class="layui-word-aux">开启则文章内显示百度是否收录</div>
					</div>
					
				</div>
			</div>
			<hr>
			
			</div>
			</fieldset>
	<br><br></div>	</div>	

	
		

	<script>

		layui.use(["colorpicker","form","transfer"], function(){
			var $ = layui.$;
			var form = layui.form;
			var colorpicker = layui.colorpicker;
			var transfer = layui.transfer;

			colorpicker.render({
				elem: '#headerColor'
				,color: '{$options->headerColor}'
				,done: function(color){
					$('#headerColor-input').focus().val(color).blur();
				}
			});
			colorpicker.render({
				elem: '#headerTextColor'
				,color: '{$options->headerTextColor}'
				,done: function(color){
					$('#headerTextColor-input').focus().val(color).blur();
				}
			});
			colorpicker.render({
				elem: '#footerColor'
				,color: '{$options->footerColor}'
				,done: function(color){
					$('#footerColor-input').focus().val(color).blur();
				}
			});
			colorpicker.render({
				elem: '#footerTextColor'
				,color: '{$options->footerTextColor}'
				,done: function(color){
					$('#footerTextColor-input').focus().val(color).blur();
				}
			});
			colorpicker.render({
				elem: '#backgroundColor'
				,color: '{$options->backgroundColor}'
				,done: function(color){
					$('#backgroundColor-input').focus().val(color).blur();
				}
			});

			
			transfer.render({
				elem: '#sidebar'
				,title: ['可选列表', '显示列表']
				,data: [
					{"value": "1", "title": "搜索框"}
					,{"value": "2", "title": "栏目分类"}
					,{"value": "3", "title": "广而告之"}
					,{"value": "4", "title": "博主动态"}
					,{"value": "5", "title": "标签云"}
					,{"value": "6", "title": "友情链接"}
				]
				,value: [{$options->sidebar}]
				,id: 'sidebar'
				,onchange: function(data, index){
					var sidebar = [];
					var sidebarData = transfer.getData('sidebar');
					for(var key in sidebarData){
						sidebar.push(sidebarData[key]['value']);

					}
					$("input[name='sidebar']").val(sidebar.join());
				}
			});

			$("form").addClass("layui-form");
			$("input[name=echo_thumbType][value='']").attr("checked", '{$options->thumbType}' == '' ? true : false);
			$("input[name=echo_thumbType][value='1']").attr("checked", '{$options->thumbType}' == 1 ? true : false);
			$("input[name=echo_thumbType][value='2']").attr("checked", '{$options->thumbType}' == 2 ? true : false);
			$("input[name=echo_thumbType][value='3']").attr("checked", '{$options->thumbType}' == 3 ? true : false);
			form.render();

			//同步input值
			$('input').bind('input propertychange blur', function(){
				var name = $(this).attr("name").split('_')[1];
				$("input[name='"+name+"']").val($(this).val());
			});
			$('textarea').bind('input propertychange', function(){
				var name = $(this).attr("name").split('_')[1];
				$("input[name='"+name+"']").val($(this).val());
			});
			form.on('switch()', function(data){
				var that = data.elem;
				var name = $(that).attr("name").split('_')[1];
				var value = data.elem.checked?data.value:'';
				$("input[name='"+name+"']").val(value);
			}); 
			form.on('radio()', function(data){
				var that = data.elem;
				var name = $(that).attr("name").split('_')[1];
				$("input[name='"+name+"']").val(data.value);
			});
		});
	</script>
	<script>
	layui.use('element', function(){
  var $ = layui.jquery
  ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
  
  //触发事件
  var active = {
    tabAdd: function(){
      //新增一个Tab项
      element.tabAdd('demo', {
        title: '新选项'+ (Math.random()*1000|0) //用于演示
        ,content: '内容'+ (Math.random()*1000|0)
        ,id: new Date().getTime() //实际使用一般是规定好的id，这里以时间戳模拟下
      })
    }
    ,tabDelete: function(othis){
      //删除指定Tab项
      element.tabDelete('demo', '44'); //删除：“商品管理”
      
      
      othis.addClass('layui-btn-disabled');
    }
    ,tabChange: function(){
      //切换到指定Tab项
      element.tabChange('demo', '22'); //切换到：用户管理
    }
  };
  
  $('.site-demo-active').on('click', function(){
    var othis = $(this), type = othis.data('type');
    active[type] ? active[type].call(this, othis) : '';
  });
  
  //Hash地址的定位
  var layid = location.hash.replace(/^#test=/, '');
  element.tabChange('test', layid);
  
  element.on('tab(test)', function(elem){
    location.hash = 'test='+ $(this).attr('lay-id');
  });
  
});

</script>
HTML;
	$layout = new Typecho_Widget_Helper_Layout();
	$layout->html(_t($Html));
	$form->addItem($layout);
}

/* 随机图片 */
function thumb($obj) {
$rand_num = 10; //根据我们随机图片文件夹中的图片数量
if ($rand_num == 0) {
$imgurl = THEME_URL."/usr/themes/DreamCat/src/img/OER/0.jpg";
//如果$rand_num = 0,则显示默认图片，须命名为"0.jpg"
}else{
$imgurl = THEME_URL."/usr/themes/DreamCat/src/img/OER/".rand(1,$rand_num).".jpg";
// 须按"1.jpg","2.jpg","3.jpg"，一定要安装顺序
}
$attach = $obj->attachments(1)->attachment;
if(isset($attach->isImage) && $attach->isImage == 1){
$thumb = $attach->url;
}else{
$thumb = $imgurl;
}
return $thumb;
}

/*显示下一篇*/
function theNext($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created > ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_ASC)
->limit(1);
$content = $db->fetchRow($sql);
 
if ($content) {
$content = $widget->filter($content);
$link = '<a href="' . $content['permalink'] . '" class="mdui-ripple mdui-col-xs-10 mdui-col-sm-6 moe-nav-right">
	   <div class="moe-nav-text">
		<span class="moe-nav-direction">下一篇</span>
		<i class="mdui-icon material-icons">arrow_forward</i>
		<div class="moe-nav-chapter">' . $content['title'] . '</div>
	   </div>
	  </a>';
echo $link;
} else {
echo $default;
}
}
 
/**
* 显示上一篇
*
* @access public
* @param string $default 如果没有下一篇,显示的默认文字
* @return void
*/
function thePrev($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created < ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_DESC)
->limit(1);
$content = $db->fetchRow($sql);
 
if ($content) {
$content = $widget->filter($content);
$link = '<a href="' . $content['permalink'] . '" class="mdui-ripple mdui-col-xs-2 mdui-col-sm-6 moe-nav-left">
	   <div class="moe-nav-text">
		<i class="mdui-icon material-icons">arrow_back</i>
		<span class="moe-nav-direction mdui-hidden-xs-down">上一篇</span>
		<div class="moe-nav-chapter mdui-hidden-xs-down">' . $content['title'] . '</div>
	   </div>
	  </a>';
echo $link;
} else {

echo $default;
}
}

//判断内容页是否百度收录

function baidu_record() {
$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 

if(checkBaidu($url)==1)
{echo "百度已收录";
}
else
{echo "<a style=\"color:red;\" rel=\"external nofollow\" title=\"点击提交收录！\" target=\"_blank\" href=\"https://ziyuan.baidu.com/sitesubmit/index?sitename=$url\">百度未收录</a>";}
}

   function checkBaidu($url) { 
    $url = 'https://www.baidu.com/s?wd=' . urlencode($url); 
    $curl = curl_init(); 
    curl_setopt($curl, CURLOPT_URL, $url); 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
    $rs = curl_exec($curl); 
    curl_close($curl); 
    if (!strpos($rs, '没有找到')) { //没有找到说明已被百度收录 
        return 1; 
    } else { 
        return -1; 
    } 
}

function art_count ($cid){
$db=Typecho_Db::get ();
$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
$text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text']);
echo mb_strlen($text,'UTF-8');
}


/**
 * 输出评论回复内容，配合 commentAtContent($coid)一起使用
 * <?php showCommentContent($comments->coid); ?>
 */
function showCommentContent($coid)
{
	$db = Typecho_Db::get();
	$result = $db->fetchRow($db->select('text')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
	$text = $result['text'];
	$atStr = commentAtContent($coid);
	$_content = Markdown::convert($text);
	//<p>
	if ($atStr !== '') {
		$content = substr_replace($_content, $atStr, 0, 3);
	} else {
		$content = $_content;
	}

	echo $content;
}

/**
 * 评论回复加@ 
 */
function commentAtContent($coid)
{
	$db = Typecho_Db::get();
	$prow = $db->fetchRow($db->select('parent')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
	$parent = $prow['parent'];
	if ($parent != "0") {
		$arow = $db->fetchRow($db->select('author')->from('table.comments')
			->where('coid = ? AND status = ?', $parent, 'approved'));
		$author = $arow['author'];
		$href = '<p><a  href="#comment-' . $parent . '">@' . $author . '</a> ';
		return $href;
	} else {
		return '';
	}
}


//算术验证评论
function spam_protection_math(){
	$num1=1;
	$num2=rand(1,9);
	echo "$num1 + $num2 = ";
	echo "<input type=\"text\" name=\"sum\" class=\"vnick vinput\" value=\"\" size=\"25\" tabindex=\"4\" style=\" background: 0 0; width:70px;	 border: none;
	resize: none;
	outline: none;
	padding: 10px 5px;
	max-width: 100%;
	font-size: .775rem;\" placeholder=\"计算结果\">";
	echo "<input type=\"hidden\" name=\"num1\" value=\"$num1\">";
	echo "<input type=\"hidden\" name=\"num2\" value=\"$num2\">";
}
function spam_protection_pre($comment, $post, $result){
	if(isset($_POST['sum'])){$sum=$_POST['sum'];}
	switch($sum){
		case $_POST['num1']+$_POST['num2']:
		break;
		case null:
		throw new Typecho_Widget_Exception(_t('抱歉：请输入验证码','评论失败'));
		break;
		default:
		throw new Typecho_Widget_Exception(_t('抱歉：验证码错误，请返回重试','评论失败'));

	};
	return $comment;
}

/*
 * 获取浏览次数(改进版)
 */
function getViewsStr($widget, $format = "{views} ℃ ") {
	$fields = unserialize($widget->fields);
	if (array_key_exists('views', $fields))
		$views = (!empty($fields['views'])) ? intval($fields['views']) : 0;
	else
		$views = 0;
	
	//增加浏览次数
	if ($widget->is('single')) {
		$vieweds = Typecho_Cookie::get('contents_viewed');
		if (empty($vieweds))
			$vieweds = array();
		else
			$vieweds = explode(',', $vieweds);
		if (!in_array($widget->cid, $vieweds)) {
			$views = $views + 1;
			$widget->setField('views', 'str', strval($views), $widget->cid);
			$vieweds[] = $widget->cid;
			$vieweds = implode(',', $vieweds);
			Typecho_Cookie::set("contents_viewed",$vieweds);
		}
	}
	return str_replace("{views}", $views, $format);
}
/** 获取浏览器信息 <?php echo getBrowser($comments->agent); ?> */
function getBrowser($agent)
{ $outputer = false;
	if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
		$outputer = 'IE Browser';
	} else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
	  $str1 = explode('Firefox/', $regs[0]);
$FireFox_vern = explode('.', $str1[1]);
		$outputer = 'Firefox Browser '. $FireFox_vern[0];
	} else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
	  $str1 = explode('Maxthon/', $agent);
$Maxthon_vern = explode('.', $str1[1]);
		$outputer = 'Maxthon Browser '.$Maxthon_vern[0];
	} else if (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $agent, $regs)) {
		$outputer = 'Sogo Browser';
	} else if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
$outputer = '360 Browser';
	} else if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
		$str1 = explode('Edge/', $regs[0]);
$Edge_vern = explode('.', $str1[1]);
		$outputer = 'Edge '.$Edge_vern[0];
	} else if (preg_match('/EdgiOS([\d]*)\/([^\s]+)/i', $agent, $regs)) {
		$str1 = explode('EdgiOS/', $regs[0]);
		$outputer = 'Edge';
	} else if (preg_match('/UC/i', $agent)) {
			  $str1 = explode('rowser/',  $agent);
$UCBrowser_vern = explode('.', $str1[1]);
		$outputer = 'UC Browser '.$UCBrowser_vern[0];
	}else if (preg_match('/OPR/i', $agent)) {
			  $str1 = explode('OPR/',  $agent);
$opr_vern = explode('.', $str1[1]);
		$outputer = 'Open Browser '.$opr_vern[0];
	} else if (preg_match('/MicroMesseng/i', $agent, $regs)) {
		$outputer = 'Weixin Browser';
	}  else if (preg_match('/WeiBo/i', $agent, $regs)) {
		$outputer = 'WeiBo Browser';
	}  else if (preg_match('/QQ/i', $agent, $regs)||preg_match('/QQ Browser\/([^\s]+)/i', $agent, $regs)) {
				  $str1 = explode('rowser/',  $agent);
$QQ_vern = explode('.', $str1[1]);
		$outputer = 'QQ Browser '.$QQ_vern[0];
	} else if (preg_match('/MQBHD/i', $agent, $regs)) {
				  $str1 = explode('MQBHD/',  $agent);
$QQ_vern = explode('.', $str1[1]);
		$outputer = 'QQ Browser '.$QQ_vern[0];
	} else if (preg_match('/BIDU/i', $agent, $regs)) {
		$outputer = 'Baidu Browser';
	} else if (preg_match('/LBBROWSER/i', $agent, $regs)) {
		$outputer = 'KS Browser';
	} else if (preg_match('/TheWorld/i', $agent, $regs)) {
		$outputer = 'TheWorld Browser';
	} else if (preg_match('/XiaoMi/i', $agent, $regs)) {
		$outputer = 'XiaoMi Browser';
	} else if (preg_match('/UBrowser/i', $agent, $regs)) {
			  $str1 = explode('rowser/',  $agent);
$UCBrowser_vern = explode('.', $str1[1]);
		$outputer = 'UCBrowser '.$UCBrowser_vern[0];
	} else if (preg_match('/mailapp/i', $agent, $regs)) {
		$outputer = 'Email Browser';
	} else if (preg_match('/2345Explorer/i', $agent, $regs)) {
		$outputer = '2345 Browser';
	} else if (preg_match('/Sleipnir/i', $agent, $regs)) {
		$outputer = 'Sleipnir Browser';
	} else if (preg_match('/YaBrowser/i', $agent, $regs)) {
		$outputer = 'Yandex Browser';
	}  else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
		$outputer = 'Opera Browser';
	} else if (preg_match('/MZBrowser/i', $agent, $regs)) {
		$outputer = 'MZ Browser';
	} else if (preg_match('/VivoBrowser/i', $agent, $regs)) {
		$outputer = 'Vivo Browser';
	} else if (preg_match('/Quark/i', $agent, $regs)) {
		$outputer = 'Quark Browser';
	} else if (preg_match('/mixia/i', $agent, $regs)) {
		$outputer = 'Mixia Browser';
	}else if (preg_match('/fusion/i', $agent, $regs)) {
		$outputer = 'Fusion';
	} else if (preg_match('/CoolMarket/i', $agent, $regs)) {
		$outputer = 'CoolMarket Browser';
	} else if (preg_match('/Thunder/i', $agent, $regs)) {
		$outputer = 'Thunder Browser';
	} else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
$str1 = explode('Chrome/', $agent);
$chrome_vern = explode('.', $str1[1]);
		$outputer = 'Chrome '.$chrome_vern[0];
	} else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
		 $str1 = explode('Version/',  $agent);
$safari_vern = explode('.', $str1[1]);
		$outputer = 'Safari '.$safari_vern[0];
	} else{
		return false;
	}
   return $outputer;
}

/** 获取操作系统信息 <?php echo getOs($comments->agent); ?>*/
function getOs($agent)
{
	$os = false;
 
	if (preg_match('/win/i', $agent)) {
		if (preg_match('/nt 6.0/i', $agent)) {
			$os = 'Windows Vista';
		} else if (preg_match('/nt 6.1/i', $agent)) {
			$os = 'Windows 7';
		} else if (preg_match('/nt 6.2/i', $agent)) {
			$os = 'Windows 8';
		} else if(preg_match('/nt 6.3/i', $agent)) {
			$os = 'Windows 8.1';
		} else if(preg_match('/nt 5.1/i', $agent)) {
			$os = 'Windows XP';
		} else if (preg_match('/nt 10.0/i', $agent)) {
			$os = 'Windows 10';
		} else{
			$os = 'Windows';
		}
	} else if (preg_match('/android/i', $agent)) {
if (preg_match('/android 9/i', $agent)) {
		$os = 'Android P';
	}
else if (preg_match('/android 8/i', $agent)) {
		$os = 'Android O';
	}
else if (preg_match('/android 7/i', $agent)) {
		$os = 'Android N';
	}
else if (preg_match('/android 6/i', $agent)) {
		$os = 'Android M';
	}
else if (preg_match('/android 5/i', $agent)) {
		$os = 'Android L';
	}
else{
		$os = 'Android';
}
	}
 else if (preg_match('/ubuntu/i', $agent)) {
		$os = 'Linux';
	} else if (preg_match('/linux/i', $agent)) {
		$os = 'Linux';
	} else if (preg_match('/iPhone/i', $agent)) {
		$os = 'iPhone';
	} else if (preg_match('/iPad/i', $agent)) {
		$os = 'iPad';
	} else if (preg_match('/mac/i', $agent)) {
		$os = 'OSX';
	}else if (preg_match('/cros/i', $agent)) {
		$os = 'Chrome os';
	}else {
 return false;
	}
   return $os;
}