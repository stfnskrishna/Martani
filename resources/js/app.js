import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Auto-hide scrollbar: adds `is-scrolling` to <html> while any scrollable
// element (the page, or an inner overflow-y-auto container like the admin
// sidebar's <main>) is actively being scrolled, and removes it 800ms after
// the last scroll event. The navy thumb (see app.css) only paints in while
// this class is present, so the scrollbar is invisible at rest.
(function () {
    let hideTimer;
    const html = document.documentElement;

    document.addEventListener('scroll', () => {
        html.classList.add('is-scrolling');
        clearTimeout(hideTimer);
        hideTimer = setTimeout(() => {
            html.classList.remove('is-scrolling');
        }, 800);
    }, { capture: true, passive: true });
})();
