<?php

namespace App\Livewire;

use App\Models\Testimonial;
use Livewire\Component;

class Testimonials extends Component
{
    public function render()
    {
        $testimonials = Testimonial::orderBy('order')->get();

        return view('livewire.components.testimonials', compact('testimonials'));
    }
}
