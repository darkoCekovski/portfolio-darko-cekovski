<?php

namespace App\Mail;

use App\Models\HireRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HireRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public HireRequest $hire)
    {
    }

    public function build()
    {
        // Subject names the path and the sender, so the inbox list already tells what it is about
        $kind = $this->hire->intent === 'role' ? 'Role inquiry' : 'Project request';

        // Reply goes straight to the sender instead of back to the site address
        return $this->subject($kind . ' — ' . $this->hire->name)
            ->replyTo($this->hire->email, $this->hire->name)
            ->view('emails.hire');
    }
}
