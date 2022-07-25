<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminInscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $inscription;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inscription)
    {
        //
        $this->inscription = $inscription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(env('EVENT_NAME').' – Nueva inscripción individual')
        ->view('emails.admin.inscription')
        ->with('inscription',$this->inscription);
    }
}
