<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<style>
.DreamCat-icon-ts{
    transition: all 0.6s .3s ease-in-out;
}
.DreamCat-icon-ts:hover{
    transform:scale(1.2);
}
</style>
<footer>
    <div style="background-color: #f2f2f2; padding: 0 8%;">
        <div style="display: flex; justify-content: space-between;color: #000;padding: 40px 0;">
            
            <div style="display: flex;flex-direction: column;line-height: 2;color: #000;">
                <a target="_blank" style="color: black;background-color: transparent;text-decoration-line: none;" href="https://beian.miit.gov.cn/">互联网ICP备案：</a>
                <span>Copyright © <?php echo date('Y'); ?> <?php $this->options->DC_WebName(); ?>.</span>
                <span>Theme: DreamCat X3.0 InsiderPreview 评估副本 Build 220720-008</span>
            </div>
            
            <div class="mdui-hidden-sm-down" style="box-sizing: border-box; display: flex;flex-direction: column;align-items: flex-start;padding: 0 50px;position: relative;">
                <div  class="footer-top-contact-logos"><img data-v-0f1600f3="" width="173px" height="35px" src="<?php $this->options->DC_FooterLogoUrl(); ?>"></div>
                <div style="align-items: center;">
                    <div class="mdui-row-xs-3">
                    <div class="mdui-col"><div class="DreamCat-icon-ts icon iconfont icon-QQ-circle-fill" style="font-size: 35px;"></div></div>
                    <div class="mdui-col"><div class="DreamCat-icon-ts icon iconfont icon-github" style="font-size: 35px;"></div></div>
                    <div class="mdui-col"><div class="DreamCat-icon-ts icon iconfont icon-logo-wechat" style="font-size: 35px;"></</div></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</footer>
<script src="<?php echo($this->options->rootUrl . '/usr/themes/DreamCat/DreamCat_StaticResources/js/mdui.min.js');?>"></script>
<script src="<?php echo($this->options->rootUrl . '/usr/themes/DreamCat/DreamCat_StaticResources/js/dreamcat.js');?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.min.js"></script>
<script>hljs.initHighlightingOnLoad()</script>
<script>
var t = null;
t = setTimeout(time, 1000); //開始运行
function time() {
clearTimeout(t); //清除定时器
dt = new Date();
var y = dt.getFullYear();
var mt = dt.getMonth() + 1;
var day = dt.getDate();
var h = dt.getHours(); //获取时
var m = dt.getMinutes(); //获取分
var s = dt.getSeconds(); //获取秒
document.querySelector(".showTime").innerHTML =
  y +
  "年" +
  mt +
  "月" +
  day +
  "日  "+
  h +
  ":" +
  m +
  ":" +
  s +
  "";
t = setTimeout(time, 1000); //设定定时器，循环运行
}
</script>
<script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
<!--右下返回顶部按钮-->
<style>
	.scrollTop {
		display: none; /* 默认隐藏 */
		position: fixed;
		bottom: 20px;
		right: 10px;
		z-index: 99;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 10px;
		border-radius: 10px; /* 圆角 */
	}
</style>
<div class="mdui-fab-wrapper">
	<a href="#top" class="mdui-fab mdui-fab-mini mdui-ripple mdui-color-pink scrollTop" id="back-top"
	   onclick="scrollFunction()">
		<i class="mdui-icon material-icons">&#xe5d8;</i></a>
</div>
<!-- 返回顶部js -->
<script>
	window.onscroll = function () {
		scrollFunction()
	};

	var scroll = new SmoothScroll("a[href*='#']");

	var $ = mdui.$;
	$('#back-top').on('click', function () {
		mdui.snackbar({
			message: '啊！撞到头辣！(๑╹っ╹๑)',
			position: 'right-top'
		});
	});

	// 当网页向下滑动 30px 出现"返回顶部" 按钮
	function scrollFunction() {
		if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
			document.getElementById("back-top").style.display = "block";
		} else {
			document.getElementById("back-top").style.display = "none";
		}
	}
</script>
</body>
</html>
