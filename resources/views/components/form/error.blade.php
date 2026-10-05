@props([
    'field',
    'alpine' => false,   // false = Livewire error bag, true = Alpine "errors" object of the wizard
])

@if($alpine)
    <p x-show="errors.{{ $field }}" x-cloak id="error-{{ $field }}" role="alert"
       class="mt-1.5 flex items-center gap-1 text-xs text-red-500">
        <svg class="h-3 w-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                  d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                  clip-rule="evenodd"/>
        </svg>
        <span x-text="errors.{{ $field }}"></span>
    </p>
@else
    @error($field)
    <p id="error-{{ $field }}" role="alert" class="mt-1.5 flex items-center gap-1 text-xs text-red-500">
        <svg class="h-3 w-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                  d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                  clip-rule="evenodd"/>
        </svg>
        <span>{{ $message }}</span>
    </p>
    @enderror
@endif
