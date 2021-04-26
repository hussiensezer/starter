<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\Serializes;

class NotifyEmail extends Mailable
{
    use Queueable, Serializes;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $dataToShow;
    public function __construct($data)
    {
        $this->dataToShow = $data;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mailer',compact('dataToShow'));
    }
}
