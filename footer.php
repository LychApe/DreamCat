<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer>
    <div style="background-color: #f2f2f2; padding: 0 8%;">
        <div style="display: flex; justify-content: space-between;color: #000;padding: 40px 0;">

            <div style="display: flex;flex-direction: column;line-height: 2;color: #000;">
                <!--<a target="_blank" style="color: black;background-color: transparent;text-decoration-line: none;" href="https://beian.miit.gov.cn/">互联网ICP备案：</a>-->
                <span><?php $this->options->DC_WebCustomFooter(); ?></span>
                <span>Copyright © <?php echo date('Y'); ?> <?php $this->options->DC_WebName(); ?>.</span>
            </div>

            <div class="mdui-hidden-sm-down"
                style="box-sizing: border-box; display: flex;flex-direction: column;align-items: flex-start;padding: 0 50px;position: relative;">
                <div class="footer-top-contact-logos">
                    <?php 
                        if (!empty($this->options->DC_FooterLogoUrl)) {
                            echo('<img width="173px" height="35px" src="'.$this->options->DC_FooterLogoUrl.'">');
                        }
                    ?>
                </div>
                <div style="align-items: center;">
                    <div class="mdui-row-xs-3">
                        <div class="mdui-col">
                            <?php if (!empty($this->options->DC_A_qq)): ?>
                            <a mdui-dialog="{target: '#DC_A_qq'}">
                                <div class="DreamCat-icon-ts icon iconfont icon-QQ-circle-fill"
                                    style="font-size: 35px;"></div>
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="mdui-col">
                            <?php if (!empty($this->options->DC_A_github)): ?>
                            <a href="<?php $this->options->DC_A_github() ?>"
                                style="text-decoration: none;color: black;">
                                <div class="DreamCat-icon-ts icon iconfont icon-github" style="font-size: 35px;"></div>
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="mdui-col">
                            <?php if (!empty($this->options->DC_A_wx)): ?>
                            <a mdui-dialog="{target: '#DC_A_wx'}">
                                <div class="DreamCat-icon-ts icon iconfont icon-logo-wechat" style="font-size: 35px;">
                                </div>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>


<div class="mdui-dialog" id="DC_A_qq">
    <div class="mdui-dialog-title">加我的QQ</div>
    <div class="mdui-dialog-content mdui-typo">
        <img src="<?php $this->options->DC_A_qq(); ?>">
    </div>
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确认</button>
    </div>
</div>
<div class="mdui-dialog" id="DC_A_wb">
    <div class="mdui-dialog-title">加我的微博</div>
    <div class="mdui-dialog-content mdui-typo">
        <img src="<?php $this->options->DC_A_wb() ?>">
    </div>
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确认</button>
    </div>
</div>
<div class="mdui-dialog" id="DC_A_zfb">
    <div class="mdui-dialog-title">加我的支付宝</div>
    <div class="mdui-dialog-content mdui-typo">
        <img src="<?php $this->options->DC_A_zfb() ?>">
    </div>
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确认</button>
    </div>
</div>
<div class="mdui-dialog" id="DC_A_wx">
    <div class="mdui-dialog-title">加我的微信</div>
    <div class="mdui-dialog-content mdui-typo">
        <img src="<?php $this->options->DC_A_wx() ?>">
    </div>
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确认</button>
    </div>
</div>



<script
    src="<?php CustomCDN_FAM('ajax/libs/mdui/1.0.2/','ajax/libs/mdui/1.0.2/','js/mdui.min.js','js/mdui.min.js'); ?>">
</script>
<script src="<?php CustomCDN_url('js/dreamcat.js'); ?>"></script>
<script
    src="<?php CustomCDN_FAM('ajax/libs/highlight.js/11.6.0/','ajax/libs/highlight.js/11.6.0/','js/highlight.min.js','highlight.min.js'); ?>">
</script>
<script
    src="<?php CustomCDN_FAM('ajax/libs/smooth-scroll/16.1.3/','ajax/libs/smooth-scroll/16.1.3/','js/smooth-scroll.min.js','smooth-scroll.min.js'); ?>">
</script>

<script>
hljs.initHighlightingOnLoad()
</script>
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
        "日  " +
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
    display: none;
    /* 默认隐藏 */
    position: fixed;
    bottom: 20px;
    right: 10px;
    z-index: 99;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px;
    border-radius: 10px;
    /* 圆角 */
}
</style>
<div class="mdui-fab-wrapper">
    <a href="#top" class="mdui-fab mdui-fab-mini mdui-ripple mdui-color-pink scrollTop" id="back-top"
        onclick="scrollFunction()">
        <i class="mdui-icon material-icons">&#xe5d8;</i></a>
</div>
<!-- 返回顶部js -->
<script>
window.onscroll = function() {
    scrollFunction()
};

var scroll = new SmoothScroll("a[href*='#']");

var $ = mdui.$;
$('#back-top').on('click', function() {
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


<?php if (is_array($this->options->DC_GlobalApp) && in_array('DCShowClickEffect', $this->options->DC_GlobalApp)): ?>
<script>
! function(e, t, a) {
    function r() {
        for (var e = 0; e < s.length; e++) s[e].alpha <= 0 ? (t.body.removeChild(s[e].el), s.splice(e, 1)) : (s[e].y--,
            s[e].scale += .004, s[e].alpha -= .013, s[e].el.style.cssText = "left:" + s[e].x + "px;top:" + s[e].y +
            "px;opacity:" + s[e].alpha + ";transform:scale(" + s[e].scale + "," + s[e].scale +
            ") rotate(45deg);background:" + s[e].color + ";z-index:99999");
        requestAnimationFrame(r)
    }

    function n() {
        var t = "function" == typeof e.onclick && e.onclick;
        e.onclick = function(e) {
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
    e.requestAnimationFrame = e.requestAnimationFrame || e.webkitRequestAnimationFrame || e.mozRequestAnimationFrame ||
        e.oRequestAnimationFrame || e.msRequestAnimationFrame || function(e) {
            setTimeout(e, 1e3 / 60)
        }, i(
            ".heart{width: 10px;height: 10px;position: fixed;background: #f00;transform: rotate(45deg);-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);}.heart:after,.heart:before{content: '';width: inherit;height: inherit;background: inherit;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;position: fixed;}.heart:after{top: -5px;}.heart:before{left: -5px;}"
            ), n(), r()
}(window, document);
</script>
<script>
<?php $this->options->DC_WebCustomJavascript() ?>
</script>


<?php endif; ?>

<?php $this->footer(); ?>

</body>

</html>
