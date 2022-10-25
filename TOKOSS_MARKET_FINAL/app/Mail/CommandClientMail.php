<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommandClientMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lastname, $firstname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($lastname,$firstname)
    {
        //
        $this->lastname = $lastname;
        $this->firstname = $firstname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.command_client');
    }
}
