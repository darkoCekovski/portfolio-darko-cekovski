@props([
    'field',                  // key used for the id, the error lookup and (in Alpine mode) the form state, e.g. "email"
    'label',
    'type'     => 'text',     // text | email | url | textarea
    'required' => false,
    'alpine'   => false,      // false = Livewire form, true = Alpine wizard
    'rows'     => 5,
])

@php
    $errorLook  = 'border-red-400 dark:border-red-500 bg-red-50/30 dark:bg-red-500/5';
    $normalLook = 'border-slate-200 dark:border-white/10';

    // In Livewire mode the error state is decided on the server; in Alpine mode it is bound reactively below
    $hasError = ! $alpine && $errors->has($field);

    $attrs = [
        'id'            => 'field-' . $field,
        'name'          => $field,
        'data-field'    => $field,
        'aria-required' => $required ? 'true' : null,
        'class'         => 'w-full px-4 py-3 rounded-xl text-sm border transition-all duration-200 '
                         . 'bg-white dark:bg-white/[0.03] text-slate-800 dark:text-slate-200 '
                         . 'placeholder-slate-400 dark:placeholder-slate-500 '
                         . 'focus:outline-none focus:ring-2 focus:ring-primary-500/40 focus:border-primary-400 '
                         . ($type === 'textarea' ? 'resize-none ' : '')
                         . ($alpine ? '' : ($hasError ? $errorLook : $normalLook)),
    ];

    if ($alpine) {
        $attrs += [
            'x-model'          => 'form.' . $field,
            ':class'           => "errors.{$field} ? '{$errorLook}' : '{$normalLook}'",
            ':aria-invalid'    => "errors.{$field} ? 'true' : null",
            'aria-describedby' => 'error-' . $field,
        ];
    } elseif ($hasError) {
        $attrs += ['aria-invalid' => 'true', 'aria-describedby' => 'error-' . $field];
    }
@endphp

<div>
    <x-form.label :for="'field-' . $field" :required="$required">{{ $label }}</x-form.label>

    @if($type === 'textarea')
        <textarea rows="{{ $rows }}" {{ $attributes->merge($attrs) }}></textarea>
    @else
        <input type="{{ $type }}" {{ $attributes->merge($attrs) }}>
    @endif

    <x-form.error :field="$field" :alpine="$alpine"/>
</div>
