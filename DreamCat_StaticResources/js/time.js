/* 侧栏实时时钟 */
(() => {
    const start = () => {
        const clock = document.querySelector('.showTime');
        if (!clock) return;

        const pad = (n) => String(n).padStart(2, '0');

        const tick = () => {
            const now = new Date();
            clock.innerHTML = `${now.getFullYear()}年${pad(now.getMonth() + 1)}月${pad(now.getDate())}日  `
                + `${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
        };

        tick();
        setInterval(tick, 1000);
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', start);
    } else {
        start();
    }
})();
