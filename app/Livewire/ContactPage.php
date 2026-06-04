<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Mail\ContactForm;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactPage extends Component
{
    public string $name    = '';
    public string $email   = '';
    public string $comment = '';

    protected function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'min:2', 'max:255'],
            'email'   => ['required', 'email:rfc', 'max:255'],
            'comment' => ['required', 'string', 'min:10', 'max:1000'],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required'    => __('messages.contact_name_required'),
            'name.min'         => __('messages.contact_name_min'),
            'name.max'         => __('messages.contact_name_max'),
            'email.required'   => __('messages.contact_email_required'),
            'email.email'      => __('messages.contact_email_invalid'),
            'email.max'        => __('messages.contact_email_max'),
            'comment.required' => __('messages.contact_message_required'),
            'comment.min'      => __('messages.contact_message_min'),
            'comment.max'      => __('messages.contact_message_max'),
        ];
    }

    public function updated(string $property): void
    {
        $this->validateOnly($property);
    }

    public function submit(): void
    {
        $validated = $this->validate();

        try {
            Contact::create($validated);

            Mail::to(config('mail.from.address'))->send(
                new ContactForm($validated['name'], $validated['email'], $validated['comment'])
            );

            $this->reset(['name', 'email', 'comment']);
            $this->resetValidation();

            $this->dispatch('toastMagic', type: 'success', message: __('messages.contact_success'));

        } catch (\Throwable $e) {
            report($e);
            $this->dispatch('toastMagic', type: 'error', message: __('messages.contact_error'));
        }
    }

    public function render()
    {
        return view('livewire.pages.contact-page')
            ->layout('layouts.app', [
                'title' => __('messages.contact_title') . ' — ' . __('messages.site_title'),
            ]);
    }
}
