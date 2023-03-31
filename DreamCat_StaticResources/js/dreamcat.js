/*返回顶部js Start*/
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

/*返回顶部js End*/

