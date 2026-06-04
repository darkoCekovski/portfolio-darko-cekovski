<button wire:click="download" type="button"
        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold
               bg-indigo-600 hover:bg-indigo-700 text-white shadow-sm shadow-indigo-500/20
               transition-all duration-200 hover:-translate-y-px active:translate-y-0">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
    </svg>
    {{ __('messages.download_cv') }}
</button>
