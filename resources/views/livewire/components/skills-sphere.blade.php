<div>
    <div class="grid lg:grid-cols-2 gap-12 items-center">

        {{-- Left: sphere --}}
        <div class="relative flex items-center justify-center w-full"
             style="height:min(480px, 80vw);"
             id="skills-sphere-wrap"
             data-skills-url="{{ localized_route('skills') }}">
            <div id="skills-sphere" style="position:relative;width:min(420px, 78vw);height:min(420px, 78vw);"></div>
        </div>

        {{-- Right: text --}}
        <div class="reveal">
        <span class="text-xs font-bold uppercase tracking-widest text-primary-500 dark:text-primary-400 mb-4 block">
            {{ __('messages.skills_eyebrow') }}
        </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white mb-6 leading-tight">
                {{ __('messages.skills_title') }}
            </h2>
            <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-8">
                {{ __('messages.skills_sphere_text') }}
            </p>
            <a href="{{ localized_route('skills') }}"
               wire:navigate
               class="group inline-flex items-center text-sm font-semibold text-primary-600 dark:text-primary-400 transition-colors duration-200">
                {{ __('messages.skills_all_cta') }}
                <span class="inline-block w-4 ml-2 overflow-visible">
                <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1.5" fill="none"
                     stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </span>
            </a>
        </div>

    </div>

    <style>
        .stag {
            position: absolute;
            left: 50%;
            top: 50%;
            white-space: nowrap;
            cursor: pointer;
            border-radius: 9999px;
            padding: 5px 12px;
            font-size: 12px;
            font-weight: 500;
            border: 1px solid rgba(99, 102, 241, 0.25);
            background: rgba(255, 255, 255, 0.75);
            color: #374151;
            display: flex;
            align-items: center;
            gap: 5px;
            pointer-events: auto;
            text-decoration: none;
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            transition: background .15s, border-color .15s, color .15s;
        }

        .dark .stag {
            background: rgba(15, 20, 36, 0.75);
            color: #e2e8f0;
            border-color: rgba(99, 102, 241, 0.3);
        }

        .stag:hover {
            background: rgba(99, 102, 241, 0.12);
            border-color: rgba(99, 102, 241, 0.6);
            color: #6366f1;
        }

        .dark .stag:hover {
            background: rgba(99, 102, 241, 0.18);
            color: #818cf8;
        }

        .stag img {
            width: 13px;
            height: 13px;
            object-fit: contain;
            flex-shrink: 0;
            border-radius: 2px;
        }

        #skills-sphere-wrap {
            touch-action: none;
            cursor: grab;
        }

        #skills-sphere-wrap:active {
            cursor: grabbing;
        }
    </style>

    @verbatim
        <script>
            (function () {
                const wrap = document.getElementById('skills-sphere-wrap');
                const sphere = document.getElementById('skills-sphere');
                if (!wrap || !sphere || sphere.children.length > 0) return;

                const skillsUrl = wrap.dataset.skillsUrl;

                const B = 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons';
                const skills = [
                    {name: 'HTML', logo: B + '/html5/html5-original.svg'},
                    {name: 'CSS', logo: B + '/css3/css3-original.svg'},
                    {name: 'Tailwind CSS', logo: B + '/tailwindcss/tailwindcss-original.svg'},
                    {name: 'JavaScript', logo: B + '/javascript/javascript-original.svg'},
                    {name: 'jQuery', logo: B + '/jquery/jquery-original.svg'},
                    {name: 'Alpine.js', logo: B + '/alpinejs/alpinejs-original.svg'},
                    {name: 'React', logo: B + '/react/react-original.svg'},
                    {name: 'Vue.js', logo: B + '/vuejs/vuejs-original.svg'},
                    {name: 'MySQL', logo: B + '/mysql/mysql-original.svg'},
                    {name: 'PHP', logo: B + '/php/php-original.svg'},
                    {name: 'Laravel', logo: B + '/laravel/laravel-original.svg'},
                    {name: 'Livewire', logo: null},
                    {name: 'npm', logo: B + '/npm/npm-original-wordmark.svg'},
                    {name: 'Git', logo: B + '/git/git-original.svg'},
                    {name: 'Composer', logo: B + '/composer/composer-original.svg'},
                    {name: 'Figma', logo: B + '/figma/figma-original.svg'},
                    {name: 'Canva', logo: B + '/canva/canva-original.svg'},
                    {name: 'PhpStorm', logo: B + '/phpstorm/phpstorm-original.svg'},
                    {name: 'VS Code', logo: B + '/vscode/vscode-original.svg'},
                    {name: 'GitHub', logo: B + '/github/github-original.svg'},
                    {name: 'GitLab', logo: B + '/gitlab/gitlab-original.svg'},
                    {name: 'Slack', logo: B + '/slack/slack-original.svg'},
                    {name: 'MS Teams', logo: B + '/microsoftteams/microsoftteams-original.svg'},
                    {name: 'Trello', logo: B + '/trello/trello-original.svg'},
                    {name: 'Vite', logo: B + '/vite/vite-original.svg'},
                    {name: 'REST API', logo: null},
                    {name: 'Bootstrap', logo: B + '/bootstrap/bootstrap-original.svg'},
                    {name: 'aWork', logo: null},
                ];

                const size = Math.min(420, window.innerWidth * 0.78);
                const R = size * 0.415;
                let rotX = 0.4, rotY = 0, vX = 0, vY = 0.0026;
                let dragging = false, lastX = 0, lastY = 0, paused = false;

                const N = skills.length;
                const golden = Math.PI * (3 - Math.sqrt(5));

                const pts = skills.map((sk, i) => {
                    const y = 1 - (i / (N - 1)) * 2;
                    const r = Math.sqrt(Math.max(0, 1 - y * y));
                    const th = golden * i;
                    return {x: Math.cos(th) * r, y, z: Math.sin(th) * r, sk};
                });

                const tags = pts.map(p => {
                    const el = document.createElement('a');
                    el.className = 'stag';
                    el.href = skillsUrl;

                    if (p.sk.logo) {
                        const img = document.createElement('img');
                        img.src = p.sk.logo;
                        img.alt = '';
                        img.onerror = () => img.remove();
                        el.appendChild(img);
                    }
                    el.appendChild(document.createTextNode(p.sk.name));
                    sphere.appendChild(el);
                    return {el, ...p};
                });

                function project(p) {
                    const cX = Math.cos(rotX), sX = Math.sin(rotX);
                    const y1 = p.y * cX - p.z * sX;
                    const z1 = p.y * sX + p.z * cX;
                    const cY = Math.cos(rotY), sY = Math.sin(rotY);
                    return {
                        x: p.x * cY + z1 * sY,
                        y: y1,
                        z: -p.x * sY + z1 * cY,
                    };
                }

                function render() {
                    if (!paused) {
                        rotY += vY;
                        rotX += vX * 0.95;
                        vX *= 0.97;
                    }
                    tags.forEach(t => {
                        const pr = project(t);
                        const d = (pr.z + 1) / 2;
                        t.el.style.transform = 'translate(calc(-50% + ' + (pr.x * R) + 'px), calc(-50% + ' + (pr.y * R) + 'px)) scale(' + (0.45 + d * 0.65) + ')';
                        t.el.style.opacity = 0.1 + d * 0.9;
                        t.el.style.zIndex = Math.round(d * 100);
                        t.el.style.filter = d < 0.25 ? 'blur(0.7px)' : 'none';
                        t.el.style.pointerEvents = d < 0.1 ? 'none' : 'auto';
                    });
                    requestAnimationFrame(render);
                }

                wrap.addEventListener('mousedown', e => {
                    dragging = true;
                    paused = true;
                    lastX = e.clientX;
                    lastY = e.clientY;
                });
                window.addEventListener('mousemove', e => {
                    if (!dragging) return;
                    vY = (e.clientX - lastX) * 0.005;
                    vX = (e.clientY - lastY) * 0.005;
                    rotY += vY;
                    rotX += vX;
                    lastX = e.clientX;
                    lastY = e.clientY;
                });
                window.addEventListener('mouseup', () => {
                    if (!dragging) return;
                    dragging = false;
                    paused = false;
                });
                wrap.addEventListener('touchstart', e => {
                    paused = true;
                    lastX = e.touches[0].clientX;
                    lastY = e.touches[0].clientY;
                }, {passive: true});
                wrap.addEventListener('touchmove', e => {
                    vY = (e.touches[0].clientX - lastX) * 0.005;
                    vX = (e.touches[0].clientY - lastY) * 0.005;
                    rotY += vY;
                    rotX += vX;
                    lastX = e.touches[0].clientX;
                    lastY = e.touches[0].clientY;
                }, {passive: true});
                wrap.addEventListener('touchend', () => {
                    paused = false;
                });

                render();
            })();
        </script>
    @endverbatim
</div>
