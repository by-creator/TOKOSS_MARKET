<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommandVendorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lastname, $firstname, $trade_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($lastname,$firstname,$trade_name)
    {
        //
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->trade_name = $trade_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.command_vendor');
    }
}
