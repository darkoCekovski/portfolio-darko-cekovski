<?php

namespace App\Mail;

use App\Models\HireRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HireRequestConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public HireRequest $hire)
    {
    }

    public function build()
    {
        // The mail is written in the language the visitor picked in the last step, not the language of the site
        $locale = $this->hire->language;

        $subject = $locale === 'de'
            ? 'Danke für deine Anfrage — Darko Cekovski'
            : 'Thanks for your request — Darko Cekovski';

        return $this->subject($subject)
            ->view('emails.hire-confirmation')
            ->with([
                'hire'   => $this->hire,
                'name'   => $this->hire->name,
                'locale' => $locale,
            ]);
    }
}
