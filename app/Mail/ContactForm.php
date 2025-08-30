<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $comment;

    public function __construct($name, $email, $comment)
    {
        $this->name = $name;
        $this->email = $email;
        $this->comment = $comment;
    }

    public function build()
    {
        return $this->subject('New Contact Form Submission')
            ->view('emails.contact')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'comment' => $this->comment,
            ]);
    }
}
