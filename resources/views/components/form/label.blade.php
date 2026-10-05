@props([
    'for'      => null,
    'tag'      => 'label',   // "label" for inputs, "legend" for fieldsets (radio / checkbox groups)
    'required' => null,      // true = red asterisk, false = "(optional)", null = no marker
])

<{{ $tag }} @if($tag === 'label' && $for) for="{{ $for }}" @endif
{{ $attributes->class([
    'block text-sm font-semibold text-slate-700 dark:text-slate-300',
    'mb-1.5' => $tag === 'label',
    'mb-3'   => $tag === 'legend',
]) }}>
{{ $slot }}
@if($required === true)
    <span class="text-red-400" aria-hidden="true">*</span>
@elseif($required === false)
    <span class="font-normal text-slate-400 dark:text-slate-500">({{ __('messages.form_optional') }})</span>
@endif
</{{ $tag }}>
