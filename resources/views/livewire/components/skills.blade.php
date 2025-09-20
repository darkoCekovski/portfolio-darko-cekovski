<section class="relative">
    <div class="relative z-10 container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">{{ __('messages.skills_title') }}</h2>

        <style>
            @property --p { syntax: '<number>'; inherits: false; initial-value: 0; }
            @keyframes skill-fill { 0% { --p: 0; } 100% { --p: var(--target); } }
            .skill-ring { background: conic-gradient(var(--ring-color, #2563eb) calc(var(--p) * 1%), var(--track-color, #e5e7eb) 0); }
            .skill-animate { animation: skill-fill var(--duration, 1100ms) ease-out forwards; }
            .skills-wrapper {
                position: relative;
                height: 80vh; /* Reduced height for better visibility */
                overflow: hidden;
                outline: none; /* Ensure focus outline is clean */
            }
            .skill-container {
                height: 80vh;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: transform 0.8s ease-in-out, opacity 0.8s ease-in-out;
                position: absolute;
                width: 100%;
                top: 0;
                opacity: 0;
                transform: translateY(100%);
                z-index: 1;
            }
            .skill-container.active {
                opacity: 1;
                transform: translateY(0);
                z-index: 2;
            }
            .skill-container.prev {
                transform: translateY(-100%);
            }
        </style>

        <div class="skills-wrapper" tabindex="0">
            @foreach ($skills as $skill)
                @php
                    $value = max(0, min(10, (int)($skill->proficiency ?? 0)));
                    $percent = (int) round(($value / 10) * 100);
                    $color = '#2563eb';
                    $href = localized_route('skill.detail', ['slug' => \Illuminate\Support\Str::slug($skill->name)]);
                @endphp

                <div class="skill-container {{ $loop->first ? 'active' : '' }}"
                     data-index="{{ $loop->index }}">
                    <a href="{{ $href }}"
                       class="w-fit mx-auto group flex flex-col items-center gap-3">
                        <div
                            class="relative grid place-items-center w-[400px] h-[400px] select-none shadow-[0px_0px_50px_9px_rgba(0,0,0,0.20)] dark:shadow-[0px_0px_50px_9px_rgba(255,255,255,0.20)] rounded-full"
                            role="progressbar"
                            aria-label="{{ $skill->name }}"
                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"
                            style="--target: {{ $percent }}; --ring-color: {{ $color }}; --track-color: #e5e7eb; --duration: 1100ms;"
                            data-skill data-value="{{ $value }}" data-max="10"
                        >
                            <div class="absolute inset-0 rounded-full bg-gray-200 dark:bg-gray-700"></div>
                            <div class="absolute inset-0 rounded-full skill-ring"></div>
                            <div class="absolute inset-2 rounded-full bg-white dark:bg-black shadow-inner">
{{--                                <img src="{{ asset('images/moon-light.svg') }}" alt="Red Planet Vector"--}}
{{--                                     class="absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 w-[100px] drop-shadow-[0_0_15px_rgba(255,100,0,0.7)]">--}}
                            </div>
                            @if ($skill->logo)
                                <img src="{{ asset($skill->logo) }}" alt="{{ $skill->name }} Logo"
                                     class="relative w-60 h-60 opacity-40 group-hover:opacity-100 transition-opacity ease-in-out duration-300"
                                     loading="lazy">
                            @endif
                            <span class="pointer-events-none absolute bottom-2 text-xs font-medium text-gray-600 dark:text-gray-300"><span class="js-skill-percent">0</span>%</span>
                        </div>

                        <div class="text-center">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $skill->name }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><span class="js-skill-now">{{ $value }}</span>/10</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-6 text-center">
            <a href="{{ localized_route('skills') }}"
               class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 shadow-[0_4px_6px_rgba(0,0,0,0.1)] dark:shadow-[0_4px_6px_rgba(255,255,255,0.1)]">
                {{ __('messages.skills_all_cta') }}
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            if (window.__skillsIOSetup) return;
            window.__skillsIOSetup = true;

            const prefersReduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            // Progress ring animation setup
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
                        const start = performance.now();
                        const duration = 850;
                        function tick(now) {
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

            // Scroll hijacking logic
            const wrapper = document.querySelector('.skills-wrapper');
            let currentIndex = 0;
            const containers = wrapper.querySelectorAll('.skill-container');
            const totalSections = containers.length;
            let isScrolling = false;

            function updateSections(index) {
                containers.forEach((container, i) => {
                    container.classList.remove('active', 'prev');
                    if (i === index) {
                        container.classList.add('active');
                    } else if (i < index) {
                        container.classList.add('prev');
                    }
                });
            }

            function scrollToSection(index) {
                if (index >= 0 && index < totalSections) {
                    currentIndex = index;
                    updateSections(currentIndex);
                    io.observe(containers[index].querySelector('[data-skill]')); // Re-observe for animation
                }
            }

            wrapper.addEventListener('wheel', (event) => {
                event.preventDefault();
                if (isScrolling) return;
                isScrolling = true;
                setTimeout(() => { isScrolling = false; }, 800);

                if (event.deltaY > 0 && currentIndex < totalSections - 1) {
                    scrollToSection(currentIndex + 1);
                } else if (event.deltaY < 0 && currentIndex > 0) {
                    scrollToSection(currentIndex - 1);
                } else {
                    // Allow page scrolling at boundaries
                    window.scrollBy({ top: event.deltaY, behavior: 'smooth' });
                }
            }, { passive: false });

            wrapper.addEventListener('keydown', (event) => {
                if (event.key === 'ArrowDown' || event.key === 'ArrowUp') {
                    event.preventDefault();
                    if (isScrolling) return;
                    isScrolling = true;
                    setTimeout(() => { isScrolling = false; }, 800);

                    if (event.key === 'ArrowDown' && currentIndex < totalSections - 1) {
                        scrollToSection(currentIndex + 1);
                    } else if (event.key === 'ArrowUp' && currentIndex > 0) {
                        scrollToSection(currentIndex - 1);
                    }
                }
            });

            // Initialize first section
            updateSections(0);
            if (containers[0]) {
                io.observe(containers[0].querySelector('[data-skill]'));
            }
        });
    </script>
</section>
