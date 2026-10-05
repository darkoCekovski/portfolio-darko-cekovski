<!-- Short privacy notice with a link to the privacy policy; opens in a new tab so a half-filled form is not lost -->
<p {{ $attributes->class('text-xs leading-relaxed text-slate-500 dark:text-slate-400') }}>
    {{ __('messages.form_privacy_note') }}
    <a href="{{ localized_route('privacy') }}" target="_blank" rel="noopener"
       class="font-semibold text-primary-600 hover:underline dark:text-primary-400">{{ __('messages.form_privacy_link') }}</a>.
</p>
