@props(['field'])

<!-- Inline error for one wizard field; its text comes from the Alpine errors object -->
<p x-show="errors.{{ $field }}" x-text="errors.{{ $field }}" x-cloak
   id="hire-error-{{ $field }}" role="alert"
   class="mt-1.5 text-xs text-red-500"></p>
