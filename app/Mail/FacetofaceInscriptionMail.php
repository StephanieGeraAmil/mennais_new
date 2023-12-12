<?php

namespace App\Mail;

use App\Enums\InscriptionTypeEnum;
use Illuminate\Bus\Queueable;
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
        switch($this->inscription->type){
            case InscriptionTypeEnum::PRESENCIAL:
                return $this->subject(env('EVENT_NAME').' - Confirmación de inscripción')->view('emails.facetoface')
                ->with('inscription',$this->inscription);
            case InscriptionTypeEnum::REMOTO:
                return $this->subject(env('EVENT_NAME').' - Confirmación de inscripción')->view('emails.remote')
                ->with('inscription',$this->inscription);
            case InscriptionTypeEnum::HIBRIDO:
                return $this->subject(env('EVENT_NAME').' - Confirmación de inscripción')->view('emails.hybrid')
                ->with('inscription',$this->inscription);
        }
    }
}
