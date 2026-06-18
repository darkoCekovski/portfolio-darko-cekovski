<?php

namespace App\Livewire;

use Livewire\Component;

class ImprintPage extends Component
{
    public function render()
    {
        return view('livewire.pages.imprint-page')
            ->layout('layouts.app', [
                'title'           => __('messages.imprint_title') . ' — Darko Cekovski',
                'metaTitle'       => __('messages.imprint_title') . ' — Darko Cekovski',
                'metaDescription' => app()->getLocale() === 'de'
                    ? 'Impressum von Darko Cekovski — Pflichtangaben gemäß § 5 DDG.'
                    : 'Imprint of Darko Cekovski — legal disclosure pursuant to § 5 DDG.',
                'canonical'       => url(app()->getLocale() . '/imprint'),
                'robots'          => 'noindex, nofollow',
            ]);
    }
}
