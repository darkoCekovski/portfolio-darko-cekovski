<?php

namespace App\Livewire;

use Livewire\Component;

class DownloadCv extends Component
{
    public string $cvUrl = '';

    public function mount(): void
    {
        $locale = app()->getLocale();
        $this->cvUrl = config("services.cv.{$locale}", config('services.cv.en'));
    }

    public function render()
    {
        return view('livewire.components.download-cv');
    }
}
