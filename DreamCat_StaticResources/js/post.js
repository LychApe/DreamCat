/* 文章阅读增强: 目录 / 代码复制 / 灯箱 (仅文章页加载) */
(() => {
    const content = document.querySelector('.dreamcat-content');
    if (!content) return;

    const config = { toc: true, codeCopy: true, lightbox: true, ...window.dreamcatPostConfig };

    /* ---------- 目录 ---------- */
    const buildTocTree = (headings) => {
        const root = document.createElement('ul');
        root.className = 'dreamcat-toc-list';
        let list = root;
        let prevLevel = 1;

        headings.forEach((heading, index) => {
            if (!heading.id) {
                heading.id = `dreamcat-heading-${index + 1}`;
            }
            const level = Number(heading.tagName.slice(1));

            if (level > prevLevel) {
                const parentItem = list.lastElementChild || list.appendChild(document.createElement('li'));
                list = parentItem.querySelector(':scope > ul') ?? parentItem.appendChild(Object.assign(document.createElement('ul'), { className: 'dreamcat-toc-list' }));
            } else if (level < prevLevel) {
                for (let depth = prevLevel; depth > level && list.parentNode; depth--) {
                    list = list.parentNode.closest('ul') ?? list;
                }
            }
            prevLevel = level;

            const item = document.createElement('li');
            const link = document.createElement('a');
            link.href = `#${heading.id}`;
            link.textContent = heading.textContent;
            link.dataset.targetId = heading.id;
            item.appendChild(link);
            list.appendChild(item);
        });

        return root;
    };

    const setupScrollSpy = (headings, nav) => {
        const links = new Map([...nav.querySelectorAll('a')].map((a) => [a.dataset.targetId, a]));
        let ticking = false;

        const update = () => {
            ticking = false;
            const fromTop = window.scrollY + 120;
            let current = headings[0];

            for (const heading of headings) {
                if (heading.offsetTop <= fromTop) {
                    current = heading;
                } else {
                    break;
                }
            }

            links.forEach((link, id) => {
                link.classList.toggle('is-active', id === current.id);
            });
        };

        // 文章页为整页生命周期, 监听器随页面卸载回收, 无需显式移除
        window.addEventListener('scroll', () => {
            if (!ticking) {
                ticking = true;
                requestAnimationFrame(update);
            }
        }, { passive: true });
        update();
    };

    const initToc = () => {
        const headings = [...content.querySelectorAll('h1, h2, h3, h4')];
        if (headings.length < 2) {
            return;
        }

        const tree = buildTocTree(headings);
        const panel = Object.assign(document.createElement('aside'), { className: 'dreamcat-toc' });
        const title = document.createElement('div');
        title.className = 'dreamcat-toc-title';
        title.textContent = '目录';
        panel.append(title, tree);
        document.body.appendChild(panel);

        setupScrollSpy(headings, tree);

        const openTocDialog = () => {
            const dialogTree = tree.cloneNode(true);
            dialogTree.querySelectorAll('.is-active').forEach((el) => el.classList.remove('is-active'));
            const dialog = mdui.dialog({
                title: '目录',
                content: dialogTree.outerHTML,
                modal: false,
                history: false,
                buttons: [{ text: '关闭' }]
            });
            mdui.$(dialogTree).on('click', 'a', () => dialog.close());
        };

        const fab = document.createElement('button');
        fab.className = 'dreamcat-toc-fab mdui-fab mdui-ripple mdui-color-theme-accent';
        fab.title = '目录';
        fab.innerHTML = '<i class="mdui-icon material-icons">format_list_bulleted</i>';
        fab.addEventListener('click', () => {
            if (typeof mdui === 'undefined') {
                return;
            }
            openTocDialog();
        });
        document.body.appendChild(fab);
    };

    if (config.toc) {
        initToc();
    }

    /* ---------- 代码块复制 ---------- */
    const copyText = async (text) => {
        if (navigator.clipboard && window.isSecureContext) {
            await navigator.clipboard.writeText(text);
            return;
        }
        const textarea = Object.assign(document.createElement('textarea'), { value: text });
        textarea.style.position = 'fixed';
        textarea.style.opacity = '0';
        document.body.appendChild(textarea);
        textarea.select();
        const ok = document.execCommand('copy');
        textarea.remove();
        if (!ok) {
            throw new Error('execCommand copy failed');
        }
    };

    if (config.codeCopy) {
        content.querySelectorAll('pre').forEach((pre) => {
            const code = pre.querySelector('code') ?? pre;
            const getText = () => (code === pre
                ? [...pre.childNodes].filter((n) => n.nodeType === Node.TEXT_NODE).map((n) => n.textContent).join('')
                : code.innerText);
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'dreamcat-code-copy';
            button.textContent = '复制';
            button.addEventListener('click', async () => {
                try {
                    await copyText(getText().replace(/\n$/, ''));
                    button.textContent = '已复制';
                    button.classList.add('is-copied');
                } catch {
                    button.textContent = '复制失败';
                }
                setTimeout(() => {
                    button.textContent = '复制';
                    button.classList.remove('is-copied');
                }, 1600);
            });
            pre.appendChild(button);
        });
    }

    /* ---------- 图片灯箱 ---------- */
    const closeLightbox = (overlay) => {
        overlay.classList.add('is-closing');
        setTimeout(() => overlay.remove(), 200);
        document.removeEventListener('keydown', overlay._onKeydown);
        if (!document.querySelector('.dreamcat-lightbox:not(.is-closing)')) {
            document.documentElement.style.overflow = '';
        }
    };

    if (config.lightbox) {
        content.querySelectorAll('img').forEach((img) => {
            if (img.closest('a')) {
                return;
            }
            img.classList.add('dreamcat-lightboxable');
            img.addEventListener('click', () => {
                if (!img.complete) {
                    return;
                }
                if (img.naturalWidth > 0 && img.naturalWidth < 150) {
                    return;
                }
                const overlay = Object.assign(document.createElement('div'), { className: 'dreamcat-lightbox' });
                const image = document.createElement('img');
                image.src = img.currentSrc || img.src;
                image.alt = img.alt || '';
                overlay.appendChild(image);
                if (img.alt) {
                    const caption = document.createElement('div');
                    caption.className = 'dreamcat-lightbox-caption';
                    caption.textContent = img.alt;
                    overlay.appendChild(caption);
                }

                overlay._onKeydown = (event) => {
                    if (event.key === 'Escape') {
                        closeLightbox(overlay);
                    }
                };
                overlay.addEventListener('click', () => closeLightbox(overlay));
                document.addEventListener('keydown', overlay._onKeydown);
                document.documentElement.style.overflow = 'hidden';
                overlay.dataset.openedAt = String(Date.now());
                document.body.appendChild(overlay);
            });
        });
    }
})();
