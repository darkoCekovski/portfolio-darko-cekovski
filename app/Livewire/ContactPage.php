<?php

namespace App\Livewire;

use Livewire\Component;

class ContactPage extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';
    public $successMessage = '';
    public $errorMessage = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string|max:1000',
    ];

    public function submit()
    {
        $this->reset(['successMessage', 'errorMessage']);
        $this->validate();

        try {
            // Placeholder for email sending (configure later if needed)
            // Mail::to('your-email@example.com')->send(new \App\Mail\ContactForm($this->name, $this->email, $this->message));
            $this->successMessage = __('messages.contact_success');
            $this->reset(['name', 'email', 'message']);
        } catch (\Exception $e) {
            $this->errorMessage = __('messages.contact_error');
        }
    }

    public function render()
    {
        return view('livewire.pages.contact-page')->layout('layouts.app', ['title' => __('messages.contact_title') . ' - ' . __('messages.site_title')]);
    }
}
