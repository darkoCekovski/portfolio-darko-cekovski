<?php

namespace App\Livewire;

use Livewire\Component;

class LanguageSwitcher extends Component
{
    public $availableLocales = [
        'en' => ['name' => 'English', 'flag' => '/images/flags/us.svg'],
        'de' => ['name' => 'Deutsch', 'flag' => '/images/flags/de.svg'],
    ];

    public $currentLocale;

    public function mount()
    {
        $this->currentLocale = session('locale', config('app.locale'));
    }

    public function switchLanguage($locale)
    {
        if (!array_key_exists($locale, $this->availableLocales)) {
            return;
        }

        session(['locale' => $locale]);
        $this->currentLocale = $locale;

        return redirect()->to(url()->previous());
    }

    public function render()
    {
        return view('livewire.language-switcher');
    }
}
