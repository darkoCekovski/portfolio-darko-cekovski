@props(['n'])

<!-- One wizard step: shown only while it is the current step, with the directional transition from app.css -->
<section x-show="step === {{ $n }}" @if($n > 1) x-cloak @endif
aria-labelledby="hire-step-{{ $n }}-heading"
         x-transition:enter="hire-step-enter"
         x-transition:enter-start="hire-step-enter-start"
         x-transition:leave="hire-step-leave"
         x-transition:leave-end="hire-step-leave-end"
         class="col-start-1 row-start-1">

    <!-- The heading is focused on every step change, so keyboard and screen-reader users never lose their place -->
    <h2 id="hire-step-{{ $n }}-heading" tabindex="-1"
        class="mb-1 text-xl font-bold text-slate-900 outline-none dark:text-white sm:text-2xl"
        x-text="heading({{ $n }}).title"></h2>
    <p class="mb-6 text-sm text-slate-500 dark:text-slate-400" x-text="heading({{ $n }}).text"></p>

    {{ $slot }}
</section>
