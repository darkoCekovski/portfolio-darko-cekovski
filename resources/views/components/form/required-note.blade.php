<!-- Short note that explains the red asterisk; used above the fields of every form -->
<p {{ $attributes->class('text-xs text-slate-400 dark:text-slate-500') }}>
    <span class="text-red-400" aria-hidden="true">*</span> {{ __('messages.form_required_note') }}
</p>
