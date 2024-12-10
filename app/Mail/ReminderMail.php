<?php

namespace App\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    private $inscription;
    //private $qrCodeData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inscription)
    {
        $this->inscription = $inscription;
       // $this->qrCodeData = $qrCodeData;
    }

    /**
     * Build the message.   
     *
     * @return $this
     */
    public function build()
    {
        return  $this->subject('PROEDUCAR 2025 - CONECTAR PARA EDUCAR - Te esperamos mañana')->view('emails.reminder')
                ->with('inscription', $this->inscription);
                // return  $this->subject('PROEDUCAR XXXIII - LA GESTIÓN COMO PALABRA- Recordatorio')->view('emails.reminder')
                // ->with('inscription', $this->inscription);
    
     //      return  $this->subject('La Transformación Educativa en acción - Recordatorio')->view('emails.reminder')
     //      ->with([
     //           'qrCodeData' =>  $this->qrCodeData,
     //           'inscription' => $this->inscription,
     //   ]);
               
    }
}
