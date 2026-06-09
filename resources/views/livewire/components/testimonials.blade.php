<div class="reveal">

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    {{-- Section heading --}}
    <div class="text-center mb-14">
    <span class="text-xs font-bold uppercase tracking-widest text-indigo-500 dark:text-indigo-400 mb-3 block">
        {{ __('messages.testimonials_eyebrow') }}</span>
        <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white mb-4">
            {{ __('messages.testimonials_title') }}
        </h2>
        <p class="text-slate-500 dark:text-slate-400 max-w-xl mx-auto">
            {{ __('messages.testimonials_subtitle') }}
        </p>
    </div>

    {{-- Swiper --}}
    <div class="swiper testimonials-swiper" style="padding-bottom: 56px;">
        <div class="swiper-wrapper">

            @foreach([
                [
                    'name'    => 'Anna Müller',
                    'role'    => 'Product Manager · TechGmbH',
                    'avatar'  => 'AM',
                    'color'   => 'from-indigo-500 to-blue-500',
                    'rating'  => 5,
                    'text_en' => 'Darko delivered our new platform on time and exceeded all expectations. His attention to detail, clean code and proactive communication made the whole project a pleasure. We will definitely work together again.',
                    'text_de' => 'Darko hat unsere neue Plattform pünktlich geliefert und alle Erwartungen übertroffen. Seine Liebe zum Detail, sein sauberer Code und seine proaktive Kommunikation haben das Projekt zu einem echten Vergnügen gemacht. Wir werden definitiv wieder zusammenarbeiten.',
                ],
                [
                    'name'    => 'James Carter',
                    'role'    => 'Founder · CartFlow',
                    'avatar'  => 'JC',
                    'color'   => 'from-sky-500 to-cyan-400',
                    'rating'  => 5,
                    'text_en' => 'Exceptional Laravel developer. Darko refactored our entire backend and introduced Livewire components that cut our JavaScript footprint in half. The app is noticeably faster and the codebase is a joy to maintain.',
                    'text_de' => 'Außergewöhnlicher Laravel-Entwickler. Darko hat unser gesamtes Backend refaktoriert und Livewire-Komponenten eingeführt, die unseren JavaScript-Anteil halbiert haben. Die App ist spürbar schneller und die Codebasis macht Spaß zu pflegen.',
                ],
                [
                    'name'    => 'Sophie Becker',
                    'role'    => 'CEO · DesignStudio',
                    'avatar'  => 'SB',
                    'color'   => 'from-violet-500 to-indigo-500',
                    'rating'  => 5,
                    'text_en' => 'We hired Darko to rebuild our client portal from scratch. The result is a beautiful, fast and fully responsive application. He suggested improvements we had not even thought of and delivered them without extra charge.',
                    'text_de' => 'Wir haben Darko beauftragt, unser Kundenportal von Grund auf neu zu entwickeln. Das Ergebnis ist eine wunderschöne, schnelle und vollständig responsive Anwendung. Er schlug Verbesserungen vor, an die wir gar nicht gedacht hatten, und setzte sie ohne Aufpreis um.',
                ],
                [
                    'name'    => 'Marco Rossi',
                    'role'    => 'CTO · LogiSoft',
                    'avatar'  => 'MR',
                    'color'   => 'from-emerald-500 to-teal-400',
                    'rating'  => 5,
                    'text_en' => 'Darko integrated a complex REST API and built the entire admin dashboard in record time. He writes clean, well-documented code and always keeps the team in the loop. A reliable partner for any web project.',
                    'text_de' => 'Darko hat eine komplexe REST-API integriert und das gesamte Admin-Dashboard in Rekordzeit gebaut. Er schreibt sauberen, gut dokumentierten Code und hält das Team immer auf dem Laufenden. Ein verlässlicher Partner für jedes Webprojekt.',
                ],
                [
                    'name'    => 'Lena Hoffmann',
                    'role'    => 'Marketing Lead · BrandBox',
                    'avatar'  => 'LH',
                    'color'   => 'from-pink-500 to-rose-400',
                    'rating'  => 5,
                    'text_en' => 'Our new landing pages load in under a second and the contact form conversions have doubled. Darko understood our brand instantly and translated it into a design that we are proud to show to clients.',
                    'text_de' => 'Unsere neuen Landingpages laden in unter einer Sekunde und die Kontaktformular-Conversions haben sich verdoppelt. Darko hat unsere Marke sofort verstanden und sie in ein Design übersetzt, das wir Kunden stolz zeigen können.',
                ],
            ] as $t)
                <div class="swiper-slide h-auto">
                    <div class="h-full p-8 rounded-2xl bg-white dark:bg-white/[0.03]
                            border border-slate-200 dark:border-white/[0.08]
                            flex flex-col gap-5 card-glow
                            hover:border-indigo-300 dark:hover:border-indigo-500/40
                            hover:shadow-xl hover:shadow-indigo-500/10
                            transition-all duration-300">

                        {{-- Stars --}}
                        <div class="flex gap-1">
                            @for($i = 0; $i < $t['rating']; $i++)
                                <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>

                        {{-- Quote --}}
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed flex-1 text-sm">
                            "{{ app()->getLocale() === 'de' ? $t['text_de'] : $t['text_en'] }}"
                        </p>

                        {{-- Author --}}
                        <div class="flex items-center gap-3 pt-4 border-t border-slate-100 dark:border-white/[0.06]">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br {{ $t['color'] }}
                                    flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                {{ $t['avatar'] }}
                            </div>
                            <div>
                                <div class="text-sm font-semibold text-slate-800 dark:text-slate-200">
                                    {{ $t['name'] }}
                                </div>
                                <div class="text-xs text-slate-400 dark:text-slate-500">
                                    {{ $t['role'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        {{-- Pagination dots --}}
        <div class="swiper-pagination"></div>
    </div>

    {{-- Swiper JS --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @verbatim
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper('.testimonials-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 24,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        640: { slidesPerView: 2 },
                        1024: { slidesPerView: 3 },
                    },
                });
            });
        </script>
    @endverbatim

</div>
