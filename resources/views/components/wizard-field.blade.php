@props([
    'field',                  // key in the Alpine form state and in the errors object, e.g. "email"
    'label',
    'type'         => 'text', // text | email | url | textarea
    'required'     => false,
    'autocomplete' => null,
    'maxlength'    => 255,
    'placeholder'  => null,
    'rows'         => 5,
])

@php
    // Same look as the inputs on the contact page; the error border is switched by Alpine through the errors object
    $classes = 'w-full px-4 py-3 rounded-xl text-sm border transition-all duration-200
                bg-white dark:bg-white/[0.03] text-slate-800 dark:text-slate-200
                placeholder-slate-400 dark:placeholder-slate-500
                focus:outline-none focus:ring-2 focus:ring-primary-500/40 focus:border-primary-400';
@endphp

<div>
    <label for="hire-{{ $field }}" class="mb-1.5 block text-sm font-semibold text-slate-700 dark:text-slate-300">
        {{ $label }}
        @if($required)
            <span class="text-red-400" aria-hidden="true">*</span>
        @else
            <span class="font-normal text-slate-400 dark:text-slate-500">({{ __('messages.hire_optional') }})</span>
        @endif
    </label>

    @if($type === 'textarea')
        <textarea id="hire-{{ $field }}" data-field="{{ $field }}" x-model="form.{{ $field }}"
                  rows="{{ $rows }}" maxlength="{{ $maxlength }}"
                  @if($placeholder) placeholder="{{ $placeholder }}" @endif
                  @if($required) aria-required="true" @endif
                  :aria-invalid="errors.{{ $field }} ? 'true' : null"
                  aria-describedby="hire-error-{{ $field }}"
                  :class="errors.{{ $field }} ? 'border-red-400 dark:border-red-500 bg-red-50/30 dark:bg-red-500/5' : 'border-slate-200 dark:border-white/10'"
                  class="{{ $classes }} resize-none"></textarea>
    @else
        <input type="{{ $type }}" id="hire-{{ $field }}" data-field="{{ $field }}" x-model="form.{{ $field }}"
               maxlength="{{ $maxlength }}"
               @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
               @if($placeholder) placeholder="{{ $placeholder }}" @endif
               @if($required) aria-required="true" @endif
               :aria-invalid="errors.{{ $field }} ? 'true' : null"
               aria-describedby="hire-error-{{ $field }}"
               :class="errors.{{ $field }} ? 'border-red-400 dark:border-red-500 bg-red-50/30 dark:bg-red-500/5' : 'border-slate-200 dark:border-white/10'"
               class="{{ $classes }}">
    @endif

    <x-field-error :field="$field"/>
</div>
