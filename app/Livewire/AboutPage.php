<?php

namespace App\Livewire;

use Livewire\Component;

class AboutPage extends Component
{
    public function render()
    {
        $metaTitle = app()->getLocale() === 'de'
            ? 'Über mich — Darko Cekovski'
            : 'About — Darko Cekovski';

        $metaDescription = app()->getLocale() === 'de'
            ? '6 Jahre Frontend-Expertise in Livewire und Tailwind CSS, 2 Jahre wachsende Laravel-Backend-Erfahrung. Ansässig in Konstanz, remote seit 2020.'
            : '6 years of frontend expertise in Livewire and Tailwind CSS, 2 years of growing Laravel backend experience. Based in Constance, Germany. Remote since 2020.';

        return view('livewire.pages.about-page')
            ->layout('layouts.app', [
                'title'           => $metaTitle,
                'metaTitle'       => $metaTitle,
                'metaDescription' => $metaDescription,
                'canonical'       => url(app()->getLocale() . '/about'),
            ]);
    }
}
