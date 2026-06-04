{{--<div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-4">--}}
{{--    @foreach ($skills as $i => $skill)--}}
{{--    @php--}}
{{--        $value   = max(0, min(10, (int)($skill->proficiency ?? 0)));--}}
{{--        $percent = (int) round(($value / 10) * 100);--}}
{{--        $href    = localized_route('skill.detail', ['slug' => $skill->slug ?? \Illuminate\Support\Str::slug($skill->name)]);--}}
{{--    @endphp--}}
{{--    <a href="{{ $href }}"--}}
{{--       class="group flex flex-col items-center gap-3 p-4 rounded-2xl--}}
{{--              bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08]--}}
{{--              hover:border-indigo-300 dark:hover:border-indigo-500/40--}}
{{--              transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-indigo-500/10--}}
{{--              reveal reveal-delay-{{ min($i + 1, 5) }}"--}}
{{--       @click.prevent="$dispatch('open-skill-modal', { slug: '{{ $skill->slug ?? \Illuminate\Support\Str::slug($skill->name) }}' }); history.pushState({}, '', '{{ $href }}')">--}}

{{--        <div class="relative w-16 h-16 flex-shrink-0"--}}
{{--             data-skill data-value="{{ $value }}" data-max="10"--}}
{{--             style="--target: {{ $percent }}; --ring-color: #6366f1; --duration: 1200ms;"--}}
{{--             role="progressbar" aria-label="{{ $skill->name }}" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">--}}
{{--            <div class="absolute inset-0 rounded-full bg-slate-100 dark:bg-white/10"></div>--}}
{{--            <div class="absolute inset-0 rounded-full skill-ring"></div>--}}
{{--            <div class="absolute inset-1.5 rounded-full bg-white dark:bg-[#080b14] flex items-center justify-center">--}}
{{--                @if($skill->logo)--}}
{{--                <img src="{{ asset($skill->logo) }}" alt="{{ $skill->name }}"--}}
{{--                     class="w-7 h-7 object-contain opacity-70 group-hover:opacity-100 transition-opacity duration-200"--}}
{{--                     loading="lazy">--}}
{{--                @else--}}
{{--                <span class="text-xs font-bold text-indigo-500">{{ substr($skill->name, 0, 2) }}</span>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--            <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 text-[10px] font-bold text-indigo-500 dark:text-indigo-400 bg-white dark:bg-[#080b14] px-1 rounded">--}}
{{--                <span class="js-pct">0</span>%--}}
{{--            </span>--}}
{{--        </div>--}}

{{--        <span class="text-xs font-medium text-slate-600 dark:text-slate-400 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors text-center leading-tight">--}}
{{--            {{ $skill->name }}--}}
{{--        </span>--}}
{{--    </a>--}}
{{--    @endforeach--}}
{{--</div>--}}
