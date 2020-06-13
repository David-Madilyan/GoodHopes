<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\MailContact;

class MailContactSender extends Mailable
{
    use Queueable, SerializesModels;


    protected $mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( MailContact $mail )
    {
        $this->mail = $mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('contact.email')->to($this->mail->to)
            ->from($this->mail->from)
            ->subject($this->mail->title)
            ->with(['name' => $this->mail->name,
                  'bodyMessage' => $this->mail->body,
                  'fromEmail' => $this->mail->from
                ]);
    }
}
