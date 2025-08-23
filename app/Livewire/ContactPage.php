<?php

namespace App\Livewire;

use Livewire\Component;

class ContactPage extends Component
{
    public function render()
    {
        return view('livewire.pages.contact-page')->layout('layouts.app');
    }
}
