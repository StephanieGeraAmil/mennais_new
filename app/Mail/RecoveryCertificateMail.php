<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

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
        return $this->subject(' PROEDUCAR XXXIII - LA GESTIÓN COMO PALABRA- Certificado, materiales y videos')->view('emails.recoverycertificate')
        ->with('inscription',$this->inscription);
    }
}
