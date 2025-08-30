<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Mail\ContactForm;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactPage extends Component
{
    public $name = '';
    public $email = '';
    public $comment = '';
    public $successMessage = '';
    public $errorMessage = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'comment' => 'required|string|max:1000',
    ];


    public function submit()
    {
        $this->reset(['successMessage', 'errorMessage']);
        $this->validate();

        try {
            // Save to database
            Contact::create([
                'name' => $this->name,
                'email' => $this->email,
                'comment' => $this->comment,
            ]);

            // Send email
            Mail::to('cekovski.darko@gmail.com')->send(new ContactForm($this->name, $this->email, $this->comment));

            $this->successMessage = __('messages.contact_success');
            $this->reset(['name', 'email', 'comment']);
        } catch (\Exception $e) {
            $this->errorMessage = __('messages.contact_error');
        }
    }

    public function render()
    {
        return view('livewire.pages.contact-page')
            ->layout('layouts.app', ['title' => __('messages.contact_title') . ' - ' . __('messages.site_title')]);
    }
}
