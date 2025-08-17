<?php
//
//namespace App\Livewire;
//
//use Livewire\Component;
//
//class LanguageSwitcher extends Component
//{
//    public array $available = [
//        'en' => ['name' => 'English', 'flag' => '/images/flags/us.svg'],
//        'de' => ['name' => 'Deutsch', 'flag' => '/images/flags/de.svg'],
//    ];
//
//    public string $current = 'en';
//
//    public function mount(): void
//    {
//        $locale = app()->getLocale();
//        $this->current = isset($this->available[$locale]) ? $locale : 'en';
//    }
//
//    public function switch(string $locale): void
//    {
//        if (!isset($this->available[$locale])) return;
//
//        // Try to rebuild the current route URL with a different locale
//        $route = request()->route();
//
//        if ($route && $route->getName()) {
//            $params = $route->parameters();
//            $params['locale'] = $locale;
//            $url = route($route->getName(), $params);
//        } else {
//            // Fallback: swap/prepend first segment
//            $segments = request()->segments(); // e.g. ['en', 'about']
//            if (isset($segments[0]) && in_array($segments[0], ['en', 'de'], true)) {
//                $segments[0] = $locale;
//            } else {
//                array_unshift($segments, $locale);
//            }
//            $url = url(implode('/', $segments));
//        }
//
//        // Livewire v3: force real browser navigation
//        $this->redirect($url, navigate: true);
//    }
//
//    public function render()
//    {
//        return view('livewire.language-switcher');
//    }
//}
//
