import './bootstrap';

// Do NOT import Alpine — Livewire 3 bundles and starts it automatically.

/* ── Scroll-reveal ──────────────────────────────────────────────────────── */

let revealObs = null;

function buildRevealObserver() {
    return new IntersectionObserver((entries, obs) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });
}

function initReveal() {
    if (revealObs) revealObs.disconnect();
    revealObs = buildRevealObserver();

    // Double rAF: ensures the browser has painted opacity:0 at least once
    // before the observer fires. Without this, in-viewport elements get
    // .visible in the same frame as the initial render, so the transition
    // has nothing to animate from and elements appear static.
    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            document.querySelectorAll('.reveal:not(.visible)').forEach(el => {
                revealObs.observe(el);
            });
        });
    });
}

// After a Livewire re-render, .visible is stripped by DOM morph.
// Re-add it immediately to anything already on screen, re-observe the rest.
function revealRescue() {
    if (!revealObs) return;
    document.querySelectorAll('.reveal:not(.visible)').forEach(el => {
        const r = el.getBoundingClientRect();
        if (r.top < window.innerHeight && r.bottom > 0) {
            el.classList.add('visible');
        } else {
            revealObs.observe(el);
        }
    });
}

/* ── Skill progress rings ───────────────────────────────────────────────── */

function initSkillRings() {
    if (window.__skillRingsSetup) return;
    window.__skillRingsSetup = true;

    const prefersReduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('[data-skill]').forEach(el => {
        const value = Number(el.dataset.value) || 0;
        const max   = Number(el.dataset.max)   || 10;
        const pct   = Math.round((value / max) * 100);
        el.style.setProperty('--target', pct);
        const label = el.querySelector('.js-pct');
        if (label) label.textContent = prefersReduce ? pct : '0';
        el.dataset.animated = 'false';
    });

    const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            if (el.dataset.animated === 'true') return;

            const ring  = el.querySelector('.skill-ring');
            const label = el.querySelector('.js-pct');
            const target = parseFloat(getComputedStyle(el).getPropertyValue('--target')) || 0;

            if (prefersReduce) {
                if (label) label.textContent = target;
            } else {
                ring?.classList.add('skill-animate');
                const start = performance.now();
                const dur = 900;
                (function tick(now) {
                    const p = Math.min(1, (now - start) / dur);
                    if (label) label.textContent = Math.round(target * p);
                    if (p < 1) requestAnimationFrame(tick);
                })(start);
            }

            el.setAttribute('aria-valuenow', target);
            el.dataset.animated = 'true';
            io.unobserve(el);
        });
    }, { threshold: 0.3 });

    document.querySelectorAll('[data-skill]').forEach(el => io.observe(el));
}

/* ── Typewriter ─────────────────────────────────────────────────────────── */

function initTypewriter() {
    const el = document.querySelector('[data-typewriter]');
    if (!el) return;
    const words = JSON.parse(el.dataset.typewriter || '[]');
    if (!words.length) return;

    let wi = 0, ci = 0, deleting = false;
    function tick() {
        const word = words[wi];
        if (!deleting) {
            el.textContent = word.slice(0, ++ci);
            if (ci === word.length) { deleting = true; setTimeout(tick, 1800); return; }
        } else {
            el.textContent = word.slice(0, --ci);
            if (ci === 0) { deleting = false; wi = (wi + 1) % words.length; }
        }
        setTimeout(tick, deleting ? 60 : 100);
    }
    tick();
}

/* ── Boot ───────────────────────────────────────────────────────────────── */

function boot() {
    initReveal();
    initSkillRings();
    initTypewriter();
}

// Initial page load
document.addEventListener('DOMContentLoaded', boot);

// Livewire SPA navigation between pages
document.addEventListener('livewire:navigated', () => {
    window.__skillRingsSetup = false;
    boot();
});

// Livewire re-render after form submit / model update.
// The commit hook fires ONLY after a real Livewire network request,
// never on initial page load — so it won't interfere with boot animations.
document.addEventListener('livewire:init', () => {
    Livewire.hook('commit', ({ succeed }) => {
        succeed(() => {
            requestAnimationFrame(() => revealRescue());
        });
    });
});
