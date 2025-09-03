<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class Services extends Component
{
    public function render()
    {
        $services = Service::all();

        return view('livewire.components.services', compact('services'));
    }
}
