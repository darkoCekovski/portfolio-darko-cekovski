@props([
    'type'  => 'radio',   // "radio" = single choice, "checkbox" = multiple choice
    'name',
    'value',
    'model',              // Alpine x-model path, e.g. "form.budget"
    'label',
    'hint'  => null,
])

<label class="relative block cursor-pointer">
    <!-- The real input stays in the DOM (keyboard, screen readers, form state); only its look is replaced by the card -->
    <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" x-model="{{ $model }}" class="peer sr-only">

    <span class="flex h-full items-start gap-3 rounded-2xl border p-4 pr-12 transition-all duration-200
                 border-slate-200 bg-white dark:border-white/[0.08] dark:bg-white/[0.03]
                 hover:border-primary-300 dark:hover:border-primary-500/40
                 peer-checked:border-primary-500 peer-checked:bg-primary-50 peer-checked:shadow-lg peer-checked:shadow-primary-500/10
                 dark:peer-checked:border-primary-500/60 dark:peer-checked:bg-primary-500/10
                 peer-focus-visible:ring-2 peer-focus-visible:ring-primary-500/40">
        @isset($icon)
            <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary-500 dark:bg-primary-500/10">
                {{ $icon }}
            </span>
        @endisset
        <span class="min-w-0">
            <span class="block text-sm font-semibold text-slate-800 dark:text-slate-100">{{ $label }}</span>
            @if($hint)
                <span class="mt-0.5 block text-xs leading-relaxed text-slate-500 dark:text-slate-400">{{ $hint }}</span>
            @endif
        </span>
    </span>

    <!-- Selection indicator: round for single choice, square for multiple choice -->
    <span aria-hidden="true"
          class="absolute right-4 top-4 flex h-5 w-5 items-center justify-center border border-slate-300 text-transparent transition-all duration-200
                 dark:border-white/20 {{ $type === 'checkbox' ? 'rounded-md' : 'rounded-full' }}
                 peer-checked:border-primary-500 peer-checked:bg-primary-500 peer-checked:text-white">
        <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
        </svg>
    </span>
</label>
