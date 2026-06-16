@php
    try { $locale = app()->getLocale(); } catch (\Exception $e) { $locale = 'en'; }
@endphp

@include('errors.error-layout', [
    'code'       => 503,
    'locale'     => $locale,
    'icon'       => '<svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>',
    'title_en'   => 'Down for maintenance',
    'title_de'   => 'Wartungsarbeiten',
    'message_en' => "We're performing scheduled maintenance and will be back shortly. Thanks for your patience.",
    'message_de' => 'Wir führen Wartungsarbeiten durch und sind gleich wieder für Sie da. Vielen Dank für Ihre Geduld.',
])
