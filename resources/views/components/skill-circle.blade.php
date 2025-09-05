{{-- Drop-in replacement for your current section; uses circular, animated skill meters --}}
<section class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">{{ __('messages.skills_title') }}</h2>

    <style>
        /* Animatable custom property for percent */
        @property --p { syntax: '<number>'; inherits: false; initial-value: 0; }
        @keyframes skill-fill { 0% { --p: 0; } 100% { --p: var(--target); } }

        /* The circular progress ring via conic-gradient */
        .skill-ring { background: conic-gradient(var(--ring-color, #2563eb) calc(var(--p) * 1%), var(--track-color, #e5e7eb) 0); }
        .skill-animate { animation: skill-fill var(--duration, 1100ms) ease-out forwards; }
    </style>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($skills as $skill)
            @php
                // Percent (0-100) derived from 1..10 scale
                $value = max(0, min(10, (int)($skill->proficiency ?? 0)));
                $percent = (int) round(($value / 10) * 100);
                // Optional brand color on the model (hex); fallback to Tailwind blue-600
                $color = $skill->color ?? '#2563eb';
                // Detail route: adjust if your route signature differs
                $href = function_exists('localized_route')
                  ? localized_route('skills.show', $skill->slug ?? $skill->id)
                  : route('skills.show', $skill->slug ?? $skill->id);
            @endphp

            <a href="{{ $href }}" class="group flex flex-col items-center gap-3 bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-900">
                <div
                    class="relative grid place-items-center w-32 h-32 select-none"
                    role="progressbar"
                    aria-label="{{ $skill->name }}"
                    aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"
                    style="--target: {{ $percent }}; --ring-color: {{ $color }}; --track-color: #e5e7eb; --duration: 1100ms;"
                    data-skill data-value="{{ $value }}" data-max="10"
                >
                    <!-- Track circle -->
                    <div class="absolute inset-0 rounded-full bg-gray-200 dark:bg-gray-700"></div>
                    <!-- Animated progress overlay -->
                    <div class="absolute inset-0 rounded-full skill-ring"></div>
                    <!-- Inner cutout -->
                    <div class="absolute inset-2 rounded-full bg-white dark:bg-gray-900 shadow-inner"></div>

                    <!-- Logo centered -->
                    <img src="{{ $skill->logo }}" alt="{{ $skill->name }} Logo" class="relative w-10 h-10 opacity-90 group-hover:opacity-100 transition-opacity" loading="lazy">

                    <!-- Optional percent label -->
                    <span class="pointer-events-none absolute bottom-2 text-xs font-medium text-gray-600 dark:text-gray-300"><span class="js-skill-percent">0</span>%</span>
                </div>

                <div class="text-center">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $skill->name }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400"><span class="js-skill-now">{{ $value }}</span>/10</p>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-6 text-center">
        <a href="{{ function_exists('localized_route') ? localized_route('skills') : route('skills') }}"
           class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
            {{ __('messages.skills_all_cta') }}
        </a>
    </div>

    <script>
        // Runs once per page; animates circles when first scrolled into view.
        (() => {
            if (window.__skillsIOSetup) return; // guard against duplicate in partials
            window.__skillsIOSetup = true;

            const prefersReduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            // Initialize labels to 0 and compute --target from 1..10 scale
            document.querySelectorAll('[data-skill][role="progressbar"]').forEach(el => {
                const value = Number(el.getAttribute('data-value')) || 0;
                const max = Number(el.getAttribute('data-max')) || 10;
                const pct = Math.max(0, Math.min(100, Math.round((value / max) * 100)));
                el.style.setProperty('--target', pct);
                const label = el.querySelector('.js-skill-percent');
                if (label) label.textContent = prefersReduce ? String(pct) : '0';
                const now = el.closest('a')?.querySelector('.js-skill-now');
                if (now) now.textContent = String(value);
                el.dataset.animated = 'false';
            });

            const io = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    const el = entry.target;
                    if (el.dataset.animated === 'true') return;

                    const ring = el.querySelector('.skill-ring');
                    const label = el.querySelector('.js-skill-percent');
                    const styles = getComputedStyle(el);
                    const target = parseFloat(styles.getPropertyValue('--target')) || 0;

                    if (prefersReduce) {
                        if (label) label.textContent = String(target);
                    } else {
                        ring && ring.classList.add('skill-animate');
                        // number count-up
                        const start = performance.now();
                        const duration = 850;
                        function tick(now){
                            const p = Math.min(1, (now - start) / duration);
                            if (label) label.textContent = String(Math.round(target * p));
                            if (p < 1) requestAnimationFrame(tick);
                        }
                        requestAnimationFrame(tick);
                    }

                    el.setAttribute('aria-valuenow', String(target));
                    el.dataset.animated = 'true';
                    io.unobserve(el);
                });
            }, { threshold: 0.35 });

            document.querySelectorAll('[data-skill][role="progressbar"]').forEach(el => io.observe(el));
        })();
    </script>
</section>
