/* 返回顶部 + 菜单按钮悬浮态 Start */
const dreamcatBackTop = document.getElementById('back-top');
const dreamcatMenuToggle = document.querySelector('.dreamcat-menu-toggle');

const dreamcatScrollFunction = () => {
    const scrolled = document.body.scrollTop > 30 || document.documentElement.scrollTop > 30;

    if (dreamcatBackTop) {
        dreamcatBackTop.style.display = scrolled ? 'block' : 'none';
    }
    dreamcatMenuToggle?.classList.toggle('is-scrolled', scrolled);
};

window.addEventListener('scroll', dreamcatScrollFunction, { passive: true });
dreamcatScrollFunction();

const dreamcatSmoothScroll = typeof SmoothScroll !== 'undefined' ? new SmoothScroll("a[href*='#']") : null;

if (dreamcatBackTop) {
    dreamcatBackTop.addEventListener('click', () => {
        mdui.snackbar({
            message: '啊！撞到头辣！(๑╹っ╹๑)',
            position: 'right-top'
        });
    });
}
/* 返回顶部 + 菜单按钮悬浮态 End */

const dreamcatThemeColors = {
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

const dreamcatThemeDefaults = {
    primary: 'indigo',
    accent: 'pink',
    mode: 'LightMode'
};

const dreamcatThemeModes = ['LightMode', 'DarkMode', 'AutoMode'];

const dreamcatStoredTheme = () => {
    try {
        return JSON.parse(localStorage.getItem('dreamcat-theme-settings')) ?? {};
    } catch {
        return {};
    }
};

const dreamcatSaveTheme = (theme) => localStorage.setItem('dreamcat-theme-settings', JSON.stringify(theme));

const dreamcatThemeValue = (theme, key) => {
    if (key === 'mode') {
        return dreamcatThemeModes.includes(theme[key]) ? theme[key] : dreamcatThemeDefaults[key];
    }
    return dreamcatThemeColors[key]?.[theme[key]] ? theme[key] : dreamcatThemeDefaults[key];
};

const dreamcatReplaceClassByPrefix = (element, prefix, value) => {
    const kept = element.className.split(/\s+/).filter((name) => name && !name.startsWith(prefix));
    element.className = [...kept, prefix + value].join(' ');
};

const dreamcatApplyTheme = (theme) => {
    const body = document.body;
    if (!body) return;

    const primary = dreamcatThemeValue(theme, 'primary');
    const accent = dreamcatThemeValue(theme, 'accent');
    const mode = dreamcatThemeValue(theme, 'mode');

    dreamcatReplaceClassByPrefix(body, 'mdui-theme-primary-', primary);
    dreamcatReplaceClassByPrefix(body, 'mdui-theme-accent-', accent);
    body.classList.remove('mdui-theme-layout-dark', 'mdui-theme-layout-auto', 'dreamcat-night-mode', 'dreamcat-night-mode-auto');

    if (mode === 'DarkMode') {
        body.classList.add('mdui-theme-layout-dark', 'dreamcat-night-mode');
    } else if (mode === 'AutoMode') {
        body.classList.add('mdui-theme-layout-auto', 'dreamcat-night-mode-auto');
    }

    document.documentElement.style.setProperty('--dreamcat-theme-primary', dreamcatThemeColors.primary[primary] ?? dreamcatThemeColors.primary.indigo);
    document.documentElement.style.setProperty('--dreamcat-theme-accent', dreamcatThemeColors.accent[accent] ?? dreamcatThemeColors.accent.pink);
    dreamcatUpdateThemeDialog(theme);
};

const dreamcatUpdateThemeDialog = (theme) => {
    for (const key of ['primary', 'accent', 'mode']) {
        const current = dreamcatThemeValue(theme, key);
        document.querySelectorAll(`[data-dreamcat-theme-${key}]`).forEach((button) => {
            button.classList.toggle('is-active', button.getAttribute(`data-dreamcat-theme-${key}`) === current);
        });
    }
};

const dreamcatBindThemeDialog = () => {
    let theme = { ...dreamcatThemeDefaults, ...dreamcatStoredTheme() };
    dreamcatApplyTheme(theme);

    for (const key of ['primary', 'accent', 'mode']) {
        document.querySelectorAll(`[data-dreamcat-theme-${key}]`).forEach((button) => {
            button.addEventListener('click', () => {
                theme[key] = button.getAttribute(`data-dreamcat-theme-${key}`);
                dreamcatSaveTheme(theme);
                dreamcatApplyTheme(theme);
            });
        });
    }

    document.getElementById('dreamcat-theme-reset')?.addEventListener('click', () => {
        theme = { ...dreamcatThemeDefaults };
        localStorage.removeItem('dreamcat-theme-settings');
        dreamcatApplyTheme(theme);
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', dreamcatBindThemeDialog);
} else {
    dreamcatBindThemeDialog();
}

const showhidediv = (id) => {
    const target = document.getElementById(id);
    if (target) {
        target.style.display = target.style.display === 'flex' ? 'none' : 'flex';
    }
};

(() => {
    const dom = (id) => document.getElementById(id);

    window.TypechoComment = {
        reply(cid, coid) {
            const comment = dom(cid);
            if (!comment || typeof getResponseIdFromTypecho !== 'function') {
                return false;
            }
            const response = dom(getResponseIdFromTypecho());
            if (!response) {
                return false;
            }
            let input = dom('comment-parent');
            const form = response.tagName === 'FORM' ? response : response.getElementsByTagName('form')[0];
            const textarea = response.getElementsByTagName('textarea')[0];

            if (input === null) {
                input = document.createElement('input');
                Object.assign(input, { type: 'hidden', name: 'parent', id: 'comment-parent' });
                form.appendChild(input);
            }
            input.setAttribute('value', coid);

            if (dom('comment-form-place-holder') === null) {
                const holder = document.createElement('div');
                holder.id = 'comment-form-place-holder';
                response.parentNode.insertBefore(holder, response);
            }

            comment.appendChild(response);
            document.querySelectorAll('.comment-reply').forEach((el) => (el.style.display = ''));
            dom(`cp-${cid}`).style.display = 'none';
            document.querySelectorAll('.cancel-comment-reply').forEach((el) => (el.style.display = 'none'));
            dom(`cl-${cid}`).style.display = '';
            if (textarea?.name === 'text') {
                textarea.focus();
            }
            return false;
        },
        cancelReply() {
            if (typeof getResponseIdFromTypecho !== 'function') {
                return true;
            }
            const response = dom(getResponseIdFromTypecho());
            const holder = dom('comment-form-place-holder');
            const input = dom('comment-parent');

            input?.parentNode.removeChild(input);
            if (holder === null) {
                return true;
            }
            document.querySelectorAll('.comment-reply').forEach((el) => (el.style.display = ''));
            document.querySelectorAll('.cancel-comment-reply').forEach((el) => (el.style.display = 'none'));
            holder.parentNode.insertBefore(response, holder);
            return false;
        }
    };
})();
