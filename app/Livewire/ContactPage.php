<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Mail\ContactForm;
use App\Mail\ContactConfirmation;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class ContactPage extends Component
{
    public string $name = '';
    public string $email = '';
    public string $comment = '';
    public string $turnstileToken = '';

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'comment' => ['required', 'string', 'min:10', 'max:1000'],
            'turnstileToken' => ['required'],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => __('messages.contact_name_required'),
            'name.min' => __('messages.contact_name_min'),
            'name.max' => __('messages.contact_name_max'),
            'email.required' => __('messages.contact_email_required'),
            'email.email' => __('messages.contact_email_invalid'),
            'email.max' => __('messages.contact_email_max'),
            'comment.required' => __('messages.contact_message_required'),
            'comment.min' => __('messages.contact_message_min'),
            'comment.max' => __('messages.contact_message_max'),
            'turnstileToken.required' => __('messages.contact_turnstile_required'),
        ];
    }

    public function updated(string $property): void
    {
        if ($property !== 'turnstileToken') {
            $this->validateOnly($property);
        }
    }

    protected function verifyTurnstile(): bool
    {
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('services.turnstile.secret_key'),
            'response' => $this->turnstileToken,
            'remoteip' => request()->ip(),
        ]);

        return $response->json('success') === true;
    }

    public function submit(): void
    {
        $validated = $this->validate();

        // Verify Turnstile
        if (!$this->verifyTurnstile()) {
            $this->dispatch('toastMagic', type: 'error', message: __('messages.contact_turnstile_failed'));
            $this->reset('turnstileToken');
            $this->dispatch('reset-turnstile');
            return;
        }

        try {
            Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'comment' => $validated['comment'],
            ]);

            Mail::to(config('mail.from.address'))->send(
                new ContactForm($validated['name'], $validated['email'], $validated['comment'])
            );

            Mail::to($validated['email'])->send(
                new ContactConfirmation($validated['name'], $validated['comment'], app()->getLocale())
            );

            $this->reset(['name', 'email', 'comment', 'turnstileToken']);
            $this->resetValidation();
            $this->dispatch('reset-turnstile');

            $this->dispatch('toastMagic', type: 'success', message: __('messages.contact_success'));

        } catch (\Throwable $e) {
            report($e);
            $this->dispatch('toastMagic', type: 'error', message: __('messages.contact_error'));
            $this->reset('turnstileToken');
            $this->dispatch('reset-turnstile');
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
