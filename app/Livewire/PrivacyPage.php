<?php

namespace App\Livewire;

use Livewire\Component;

class PrivacyPage extends Component
{
    public function render()
    {
        return view('livewire.pages.privacy-page')
            ->layout('layouts.app', [
                'title'           => __('messages.privacy_title') . ' — Darko Cekovski',
                'metaTitle'       => __('messages.privacy_title') . ' — Darko Cekovski',
                'metaDescription' => app()->getLocale() === 'de'
                    ? 'Datenschutzerklärung von Darko Cekovski — Informationen zur Verarbeitung personenbezogener Daten auf dieser Website.'
                    : 'Privacy Policy of Darko Cekovski — information on how personal data is collected and processed on this website.',
                'canonical'       => url(app()->getLocale() . '/privacy'),
                'robots'          => 'noindex, nofollow',
            ]);
    }
}
