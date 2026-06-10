<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $comment;
    public string $locale;

    public function __construct(string $name, string $comment, string $locale = 'en')
    {
        $this->name = $name;
        $this->comment = $comment;
        $this->locale = $locale;
    }

    public function build()
    {
        $subject = $this->locale === 'de'
            ? 'Danke für Ihre Nachricht — Darko Cekovski'
            : 'Thanks for reaching out — Darko Cekovski';

        return $this->subject($subject)
            ->view('emails.contact-confirmation')
            ->with([
                'name' => $this->name,
                'comment' => $this->comment,
                'locale' => $this->locale,
            ]);
    }
}
