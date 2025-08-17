<?php

namespace App\Livewire;

use Livewire\Component;

class DownloadCv extends Component
{
    public function download()
    {
        // Pass the current app locale to the named route
        return redirect()->route('cv.download', app()->getLocale());
    }

    public function render()
    {
        return view('livewire.download-cv');
    }
}
