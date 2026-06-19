<div class="reveal">

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    {{-- Section heading --}}
    <div class="text-center mb-14">
        <span class="text-xs font-bold uppercase tracking-widest text-primary-500 dark:text-primary-400 mb-3 block">
            {{ __('messages.testimonials_eyebrow') }}
        </span>
        <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white mb-4">
            {{ __('messages.testimonials_title') }}
        </h2>
        <p class="text-slate-500 dark:text-slate-400 max-w-xl mx-auto">
            {{ __('messages.testimonials_subtitle') }}
        </p>
    </div>

    @if($testimonials->isNotEmpty())

        {{-- Swiper --}}
        <div class="swiper testimonials-swiper" style="padding-bottom: 56px;">
            <div class="swiper-wrapper">

                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide h-auto">
                        <div class="h-full p-8 rounded-2xl bg-white dark:bg-white/[0.03]
                                    border border-slate-200 dark:border-white/[0.08]
                                    flex flex-col gap-5
                                    hover:border-primary-300 dark:hover:border-primary-500/40
                                    hover:shadow-xl hover:shadow-primary-500/10
                                    transition-all duration-300">

                            {{-- Quote --}}
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed flex-1 text-sm">
                                "{{ $testimonial->content }}"
                            </p>

                            {{-- Author --}}
                            <div class="flex items-center gap-3 pt-4 border-t border-slate-100 dark:border-white/[0.06]">

                                {{-- Photo or initials fallback --}}
                                @if($testimonial->photo)
                                    <img src="{{ asset($testimonial->photo) }}"
                                         alt="{{ $testimonial->name }}"
                                         class="w-10 h-10 rounded-full object-cover flex-shrink-0">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br {{ $testimonial->color }}
                                                flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                        {{ $testimonial->avatar }}
                                    </div>
                                @endif

                                <div>
                                    <div class="text-sm font-semibold text-slate-800 dark:text-slate-200">
                                        {{ $testimonial->name }}
                                    </div>
                                    <div class="text-xs text-slate-400 dark:text-slate-500">
                                        {{ $testimonial->role }}
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

    @endif

</div>
