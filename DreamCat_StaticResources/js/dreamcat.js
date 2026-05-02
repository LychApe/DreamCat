/*返回顶部js Start*/
window.onscroll = function () {
    scrollFunction()
};

var scroll = typeof SmoothScroll !== 'undefined' ? new SmoothScroll("a[href*='#']") : null;

var $ = mdui.$;
$('#back-top').on('click', function () {
    mdui.snackbar({
        message: '啊！撞到头辣！(๑╹っ╹๑)',
        position: 'right-top'
    });
});

// 当网页向下滑动 30px 出现"返回顶部" 按钮
function scrollFunction() {
    var backTop = document.getElementById("back-top");
    if (!backTop) return;
    if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
        backTop.style.display = "block";
    } else {
        backTop.style.display = "none";
    }
}

/*返回顶部js End*/

var dreamcatThemeColors = {
    primary: {
        amber: '#FFC107',
        blue: '#2196F3',
        'blue-grey': '#607D8B',
        brown: '#795548',
        cyan: '#00BCD4',
        'deep-orange': '#FF5722',
        'deep-purple': '#673AB7',
        green: '#4CAF50',
        grey: '#9E9E9E',
        indigo: '#3F51B5',
        'light-blue': '#03A9F4',
        'light-green': '#8BC34A',
        lime: '#CDDC39',
        orange: '#FF9800',
        pink: '#E91E63',
        purple: '#9C27B0',
        red: '#F44336',
        teal: '#009688',
        yellow: '#FFEB3B'
    },
    accent: {
        amber: '#FFC400',
        blue: '#448AFF',
        cyan: '#18FFFF',
        'deep-orange': '#FF6E40',
        'deep-purple': '#7C4DFF',
        green: '#69F0AE',
        indigo: '#536DFE',
        'light-blue': '#40C4FF',
        'light-green': '#B2FF59',
        lime: '#EEFF41',
        orange: '#FFAB40',
        pink: '#FF4081',
        purple: '#E040FB',
        red: '#FF5252',
        teal: '#64FFDA',
        yellow: '#FFFF00'
    }
};

var dreamcatThemeDefaults = {
    primary: 'indigo',
    accent: 'pink',
    mode: 'LightMode'
};

function dreamcatStoredTheme() {
    try {
        return JSON.parse(localStorage.getItem('dreamcat-theme-settings')) || {};
    } catch (e) {
        return {};
    }
}

function dreamcatSaveTheme(theme) {
    localStorage.setItem('dreamcat-theme-settings', JSON.stringify(theme));
}

function dreamcatThemeValue(theme, key) {
    if (key === 'primary' && dreamcatThemeColors.primary[theme[key]]) {
        return theme[key];
    }
    if (key === 'accent' && dreamcatThemeColors.accent[theme[key]]) {
        return theme[key];
    }
    if (key === 'mode' && ['LightMode', 'DarkMode', 'AutoMode'].indexOf(theme[key]) !== -1) {
        return theme[key];
    }
    return dreamcatThemeDefaults[key];
}

function dreamcatReplaceClassByPrefix(element, prefix, value) {
    var classes = element.className.split(/\s+/).filter(function (className) {
        return className && className.indexOf(prefix) !== 0;
    });
    classes.push(prefix + value);
    element.className = classes.join(' ');
}

function dreamcatApplyTheme(theme) {
    var body = document.body;
    if (!body) return;

    var primary = dreamcatThemeValue(theme, 'primary');
    var accent = dreamcatThemeValue(theme, 'accent');
    var mode = dreamcatThemeValue(theme, 'mode');

    dreamcatReplaceClassByPrefix(body, 'mdui-theme-primary-', primary);
    dreamcatReplaceClassByPrefix(body, 'mdui-theme-accent-', accent);
    body.classList.remove('mdui-theme-layout-dark', 'mdui-theme-layout-auto', 'dreamcat-night-mode', 'dreamcat-night-mode-auto');

    if (mode === 'DarkMode') {
        body.classList.add('mdui-theme-layout-dark', 'dreamcat-night-mode');
    } else if (mode === 'AutoMode') {
        body.classList.add('mdui-theme-layout-auto', 'dreamcat-night-mode-auto');
    }

    document.documentElement.style.setProperty('--dreamcat-theme-primary', dreamcatThemeColors.primary[primary] || dreamcatThemeColors.primary.indigo);
    document.documentElement.style.setProperty('--dreamcat-theme-accent', dreamcatThemeColors.accent[accent] || dreamcatThemeColors.accent.pink);
    dreamcatUpdateThemeDialog(theme);
}

function dreamcatUpdateThemeDialog(theme) {
    var primary = dreamcatThemeValue(theme, 'primary');
    var accent = dreamcatThemeValue(theme, 'accent');
    var mode = dreamcatThemeValue(theme, 'mode');

    document.querySelectorAll('[data-dreamcat-theme-primary]').forEach(function (button) {
        button.classList.toggle('is-active', button.getAttribute('data-dreamcat-theme-primary') === primary);
    });
    document.querySelectorAll('[data-dreamcat-theme-accent]').forEach(function (button) {
        button.classList.toggle('is-active', button.getAttribute('data-dreamcat-theme-accent') === accent);
    });
    document.querySelectorAll('[data-dreamcat-theme-mode]').forEach(function (button) {
        button.classList.toggle('is-active', button.getAttribute('data-dreamcat-theme-mode') === mode);
    });
}

function dreamcatBindThemeDialog() {
    var theme = Object.assign({}, dreamcatThemeDefaults, dreamcatStoredTheme());
    dreamcatApplyTheme(theme);

    document.querySelectorAll('[data-dreamcat-theme-primary]').forEach(function (button) {
        button.addEventListener('click', function () {
            theme.primary = button.getAttribute('data-dreamcat-theme-primary');
            dreamcatSaveTheme(theme);
            dreamcatApplyTheme(theme);
        });
    });
    document.querySelectorAll('[data-dreamcat-theme-accent]').forEach(function (button) {
        button.addEventListener('click', function () {
            theme.accent = button.getAttribute('data-dreamcat-theme-accent');
            dreamcatSaveTheme(theme);
            dreamcatApplyTheme(theme);
        });
    });
    document.querySelectorAll('[data-dreamcat-theme-mode]').forEach(function (button) {
        button.addEventListener('click', function () {
            theme.mode = button.getAttribute('data-dreamcat-theme-mode');
            dreamcatSaveTheme(theme);
            dreamcatApplyTheme(theme);
        });
    });

    var resetButton = document.getElementById('dreamcat-theme-reset');
    if (resetButton) {
        resetButton.addEventListener('click', function () {
            theme = Object.assign({}, dreamcatThemeDefaults);
            localStorage.removeItem('dreamcat-theme-settings');
            dreamcatApplyTheme(theme);
        });
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', dreamcatBindThemeDialog);
} else {
    dreamcatBindThemeDialog();
}

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
