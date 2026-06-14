<?php

namespace App\Livewire;

use Livewire\Component;

class ImprintPage extends Component
{
    public function render()
    {
        return view('livewire.pages.imprint-page')
            ->layout('layouts.app', [
                'title' => __('messages.imprint_title') . ' — ' . __('messages.site_title'),
            ]);
    }
}
