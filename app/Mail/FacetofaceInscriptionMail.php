<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FacetofaceInscriptionMail extends Mailable
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
        return $this->subject(env('EVENT_NAME').' - Confirmación de inscripción')->view('emails.facetoface')
        ->with('inscription',$this->inscription);         
    }
}
