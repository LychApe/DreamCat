<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<style>
.DreamCat-footer {
    padding: 10px 0;
    background: rgba(255,255,255,.6);
    box-shadow: 1px 0px 9px 1px rgba(0,0,0,.1);
}
.DreamCat-infooter {
    text-align: center;
    margin: 0 auto;
    font-size: 12px;
    color: #999;
}
</style>
<!--START by LEO-->
<div class="DreamCat-footer">
    <div class="DreamCat-infooter">
                    <div class="mdui-typo"> 
                    <p id="testme">Theme <strong style="color: rgba(77, 136, 255,.9);">DreamCat</strong>  Made By <strong style="color: rgba(77, 136, 255,.9);">LychApe</strong>
                    <p>Copyright © <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.</p>
                    <p>Designed by <a href="https://hanfen.run">HanFen</a></p>
                    </div>
    </div>
</div>
<!--END-->
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
          <div class="mdui-dialog" id="About_DreamCat">
            <div class="mdui-dialog-title">ABOUT DreamCat</div>
            <div class="mdui-dialog-content">
            <blockquote>
                <div class="mdui-chip">
                  <span class="mdui-chip-icon mdui-color-blue"><i class="mdui-icon material-icons">star</i></span>
                  <span class="mdui-chip-title">DreamCat</span>
                </div>
                <div class="mdui-chip">
                  <span class="mdui-chip-icon mdui-color-blue">X</span>
                  <span class="mdui-chip-title">1.3-2020331</span>
                </div>
				<br/>
				</p> 
				<div class="mdui-typo">       
				<p>开发者: <a href="https://github.com/Han-Fen" target="_blank">HanFen</a> | <a href="https://github.com/pa4sword" target="_blank">pa4sword</a> | <a href="https://github.com/
Dev-Leo" target="_blank">
Dev-Leo</a></p>
                <p>鸣谢:<a href="https://github.com/DFFZMXJ" target="_blank">学神之女</a></p>
				</div>
				<footer>© Copyright 2015-2020 by LychApe All rights are reserved.</footer>
			</blockquote>
            </div>
            <div class="mdui-dialog-actions">
              <button class="mdui-btn mdui-ripple" mdui-dialog-close>知 道 啦 !</button>
            </div>
          </div>
<a onclick="topFunction()" id="myBtn" title="回顶部" class="mdui-fab mdui-fab-fixed mdui-ripple top mdui-color-theme-accent" style="display: none;"><i class="mdui-icon material-icons">arrow_upward</i></a>  


<!-- 返回顶部js -->
<script type="text/javascript">
// 当网页向下滑动 30px 出现"返回顶部" 按钮
window.onscroll = function() {scrollFunction()};
 
function scrollFunction() {console.log(121);
    if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}
 
// 点击按钮，返回顶部
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
<!---<script type="text/javascript" src="https://down.inwao.com/Bash/jquery.min.js"></script>
<script type="text/javascript" src="https://down.inwao.com/Bash/go-top.js"></script>!-->

</div>
<?php $this->footer(); ?>
</body>
</html>