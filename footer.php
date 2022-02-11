<?php
	/**
	 * DreamCat   是一个极简自适应博客主题,年轻人追梦的必备良品!
	 *
	 * @package DreamCat
	 * @author LychApe
	 * @version X2.6.220211
	 * @link https://github.com/LychApe/DreamCat
	 */
	if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<div class="DreamCat-footer">
	<div class="DreamCat-infooter">
		<br/>
		<div class="mdui-typo">
			<p>Copyright © <?php echo date('Y'); ?> <a
						href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.</p>
			<?php $this->options->CustomFooter(); ?>
		</div>
		<br/>
	</div>
</div>

<div class="mdui-dialog" id="About_DreamCat">
	<div class="mdui-dialog-title">关于 DreamCat</div>
	<div class="mdui-dialog-content" style="height: 219px;">
		<blockquote>
			<div class="mdui-typo"><p>主题名称：<a href="https://typecho.me/1516.html" target="_blank">DreamCat</a> | 版本：<a
							href="https://github.com/LychApe/DreamCat" target="_blank">X2.6.220211</a></p>
				<p>主题开发：<a
							href="https://github.com/HanFengA7" target="_blank">HanFengA7</a> | <a
							href="https://github.com/TeddyNight" target="_blank">TeddyNight</a> | <a
							href="https://github.com/Dev-Leo" target="_blank">Dev-Leo</a> | <a
							href="https://github.com/CornWorld" target="_blank">CornWorld</a> | <a
							href="https://github.com/whitebearcn" target="_blank">WhiteBearcn</a> | <a
							href="https://github.com/DFFZMXJ" target="_blank">DFFZMXJ</a>
				</p>
				<p>Designed by <a href="https://www.hanfenga7.cn/" style="text-decoration: none">HanFengA7</a> Power by
					<a href="http://typecho.org/" style="text-decoration: none">Typecho</a></p>
				<p>Copyright © 2015-2022 by LychApe All rights reserved!</p></div>
		</blockquote>
		<div class="mdui-dialog-actions">
			<button class="mdui-btn mdui-ripple" mdui-dialog-close>知 道 啦 !</button>
		</div>
	</div>
</div>

<div class="mdui-dialog" id="qq">
	<div class="mdui-dialog-title">加我的QQ</div>
	<div class="mdui-dialog-content mdui-typo">
		<img src="<?php $this->options->qq() ?>">
	</div>
	<div class="mdui-dialog-actions">
		<button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确认</button>
	</div>
</div>
<div class="mdui-dialog" id="weibo">
	<div class="mdui-dialog-title">加我的微博</div>
	<div class="mdui-dialog-content mdui-typo">
		<img src="<?php $this->options->weibo() ?>">
	</div>
	<div class="mdui-dialog-actions">
		<button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确认</button>
	</div>
</div>
<div class="mdui-dialog" id="zfb">
	<div class="mdui-dialog-title">加我的支付宝</div>
	<div class="mdui-dialog-content mdui-typo">
		<img src="<?php $this->options->zfb() ?>">
	</div>
	<div class="mdui-dialog-actions">
		<button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确认</button>
	</div>
</div>
<div class="mdui-dialog" id="weixin">
	<div class="mdui-dialog-title">加我的微信</div>
	<div class="mdui-dialog-content mdui-typo">
		<img src="<?php $this->options->weixin() ?>">
	</div>
	<div class="mdui-dialog-actions">
		<button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确认</button>
	</div>
</div>

<?php if ($this->options->ClickEffects == 'checked'): ?>
<script>
	!function (e, t, a) {
		function r() {
			for (var e = 0; e < s.length; e++) s[e].alpha <= 0 ? (t.body.removeChild(s[e].el), s.splice(e, 1)) : (s[e].y--, s[e].scale += .004, s[e].alpha -= .013, s[e].el.style.cssText = "left:" + s[e].x + "px;top:" + s[e].y + "px;opacity:" + s[e].alpha + ";transform:scale(" + s[e].scale + "," + s[e].scale + ") rotate(45deg);background:" + s[e].color + ";z-index:99999");
			requestAnimationFrame(r)
		}
	
		function n() {
			var t = "function" == typeof e.onclick && e.onclick;
			e.onclick = function (e) {
				t && t(), o(e)
			}
		}
	
		function o(e) {
			var a = t.createElement("div");
			a.className = "heart", s.push({
				el: a,
				x: e.clientX - 5,
				y: e.clientY - 5,
				scale: 1,
				alpha: 1,
				color: c()
			}), t.body.appendChild(a)
		}
	
		function i(e) {
			var a = t.createElement("style");
			a.type = "text/css";
			try {
				a.appendChild(t.createTextNode(e))
			} catch (t) {
				a.styleSheet.cssText = e
			}
			t.getElementsByTagName("head")[0].appendChild(a)
		}
	
		function c() {
			return "rgb(" + ~~(255 * Math.random()) + "," + ~~(255 * Math.random()) + "," + ~~(255 * Math.random()) + ")"
		}
	
		var s = [];
		e.requestAnimationFrame = e.requestAnimationFrame || e.webkitRequestAnimationFrame || e.mozRequestAnimationFrame || e.oRequestAnimationFrame || e.msRequestAnimationFrame || function (e) {
			setTimeout(e, 1e3 / 60)
		}, i(".heart{width: 10px;height: 10px;position: fixed;background: #f00;transform: rotate(45deg);-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);}.heart:after,.heart:before{content: '';width: inherit;height: inherit;background: inherit;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;position: fixed;}.heart:after{top: -5px;}.heart:before{left: -5px;}"), n(), r()
	}(window, document);
</script>
<?php endif; ?>

<script>
	<?php $this->options->CustomizeGlobalJs() ?>
</script>
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
		console.log(121);
		if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
			document.getElementById("back-top").style.display = "block";
		} else {
			document.getElementById("back-top").style.display = "none";
		}
	}
</script>

</div>
</body>
</html>
