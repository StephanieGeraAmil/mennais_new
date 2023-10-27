<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoveryCertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    private $inscription;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inscription)
    {
        $this->inscription = $inscription;
    }

    /**
     * Build the message.   
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(env('EVENT_NAME').' - Video y Certificado')->view('emails.recoverycertificate')
        ->with('inscription',$this->inscription);
    }
}
