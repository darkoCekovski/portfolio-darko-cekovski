<div
    x-data="{ show: false }"
    x-init="window.addEventListener('scroll', () => show = window.scrollY > 400)"
    x-show="show"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-4"
    class="fixed bottom-8 right-8 z-50"
>
    <button
        @click="window.scrollTo({top:0,behavior:'smooth'})"
        class="w-11 h-11 rounded-xl bg-primary-600 hover:bg-primary-700 text-white shadow-lg shadow-primary-500/30 flex items-center justify-center transition-all duration-200 hover:-translate-y-0.5"
        aria-label="Back to top"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5"/>
        </svg>
    </button>
</div>
