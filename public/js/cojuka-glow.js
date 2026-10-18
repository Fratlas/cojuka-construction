/**
 * COJUKA / Signature Glass Glow.
 * Opt-in pointer light follows the cursor only on hover-capable devices.
 * Passive listeners + requestAnimationFrame keep animation smooth.
 */
(function () {
  'use strict';
  function init() {
    if (!document.body || !document.body.classList.contains('cojuka-glass')) return;
    if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    var selectors = [
      '.cojuka-glass-public main .service-card',
      '.cojuka-glass-public main .info-card',
      '.cojuka-glass-public main .history-card',
      '.cojuka-glass-public main .model-card',
      '.cojuka-glass-public main .cojuka-atlas-photo',
      '.cojuka-glass-public main .cojuka-entity-content',
      '.cojuka-glass-public main .cx-card',
      '.cojuka-glass-public main .cx-stage-info',
      '.cojuka-glass-public main .cx-controls button',
      '.cojuka-glass-public main .cx-stage-side button',
      '.cojuka-glass-public main .cojuka-entity-arrow',
      '.cojuka-glass-public main .cojuka-entity-link',
      '.cojuka-glass-public main .btn-pill',
      '.cojuka-glass-public main .btn-outline-light-custom',
      '.cojuka-glass-admin .page-content .card',
      '.cojuka-glass-admin .page-content .btn',
      '.cojuka-glass-admin .sidebar .side-link',
      '.cojuka-glass-admin .topbar .avatar',
      '.cojuka-glass-auth .auth-workspace',
      '.cojuka-glass-auth .auth-feature',
      '.cojuka-glass-auth .auth-panel .btn',
      '.cojuka-glass-legacy .panel',
      '.cojuka-glass-legacy .stat'
    ].join(',');

    function attach(el) {
      if (el.dataset.cgGlow === 'ready') return;
      el.dataset.cgGlow = 'ready';
      var raf = 0, x = 50, y = 50;
      el.addEventListener('pointermove', function (event) {
        var rect = el.getBoundingClientRect();
        if (!rect.width || !rect.height) return;
        x = Math.max(0, Math.min(100, ((event.clientX - rect.left) / rect.width) * 100));
        y = Math.max(0, Math.min(100, ((event.clientY - rect.top) / rect.height) * 100));
        if (!raf) {
          raf = requestAnimationFrame(function () {
            el.style.setProperty('--cg-pointer-x', x.toFixed(2) + '%');
            el.style.setProperty('--cg-pointer-y', y.toFixed(2) + '%');
            raf = 0;
          });
        }
      }, { passive: true });
      el.addEventListener('pointerleave', function () {
        if (raf) cancelAnimationFrame(raf);
        raf = 0;
      }, { passive: true });
    }

    document.querySelectorAll(selectors).forEach(attach);
    // Modal content, dashboard widgets and other dynamically inserted panels.
    document.addEventListener('shown.bs.modal', function (event) {
      event.target.querySelectorAll('.card,.modal-content,.btn').forEach(attach);
    });
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init, { once: true });
  else init();
})();
