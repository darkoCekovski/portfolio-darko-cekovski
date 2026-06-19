@php
    try { $locale = app()->getLocale(); } catch (\Exception $e) { $locale = 'en'; }
@endphp

@include('errors.error-layout', [
    'code'       => 404,
    'locale'     => $locale,
    'icon'       => '<svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607z"/></svg>',
    'title_en'   => 'Page not found',
    'title_de'   => 'Seite nicht gefunden',
    'message_en' => "The page you're looking for doesn't exist or has been moved. Check the URL or head back home.",
    'message_de' => 'Die gesuchte Seite existiert nicht oder wurde verschoben. Überprüfen Sie die URL oder kehren Sie zur Startseite zurück.',
])
