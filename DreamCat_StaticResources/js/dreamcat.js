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

function showhidediv(id) {
    var sbtitle = document.getElementById(id);
    if (sbtitle) {
        if (sbtitle.style.display == 'flex') {
            sbtitle.style.display = 'none';
        } else {
            sbtitle.style.display = 'flex';
        }
    }
}

(function () {
    window.TypechoComment = {
        dom: function (id) {
            return document.getElementById(id)
        },
        pom: function (id) {
            return document.getElementsByClassName(id)[0]
        },
        iom: function (id, dis) {
            var alist = document.getElementsByClassName(id);
            if (alist) {
                for (var idx = 0; idx < alist.length; idx++) {
                    var mya = alist[idx];
                    mya.style.display = dis
                }
            }
        },
        create: function (tag, attr) {
            var el = document.createElement(tag);
            for (var key in attr) {
                el.setAttribute(key, attr[key])
            }
            return el
        },
        reply: function (cid, coid) {
            var comment = this.dom(cid),
                parent = comment.parentNode,
                response = this.dom(getResponseIdFromTypecho()),
                input = this.dom("comment-parent"),
                form = "form" == response.tagName ? response : response.getElementsByTagName("form")[0],
                textarea = response.getElementsByTagName("textarea")[0];
            if (null == input) {
                input = this.create("input", {
                    "type": "hidden",
                    "name": "parent",
                    "id": "comment-parent"
                });
                form.appendChild(input)
            }
            input.setAttribute("value", coid);
            if (null == this.dom("comment-form-place-holder")) {
                var holder = this.create("div", {
                    "id": "comment-form-place-holder"
                });
                response.parentNode.insertBefore(holder, response)
            }
            comment.appendChild(response);
            this.iom("comment-reply", "");
            this.pom("cp-" + cid).style.display = "none";
            this.iom("cancel-comment-reply", "none");
            this.pom("cl-" + cid).style.display = "";
            if (null != textarea && "text" == textarea.name) {
                textarea.focus()
            }
            return false
        },
        cancelReply: function () {
            var response = this.dom("<?php echo $this->respondId(); ?>"),
                holder = this.dom("comment-form-place-holder"),
                input = this.dom("comment-parent");
            if (null != input) {
                input.parentNode.removeChild(input)
            }
            if (null == holder) {
                return true
            }
            this.iom("comment-reply", "");
            this.iom("cancel-comment-reply", "none");
            holder.parentNode.insertBefore(response, holder);
            return false
        }
    }
})();