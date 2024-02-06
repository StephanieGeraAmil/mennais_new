<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
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

          $qrCode = QrCode::format('png')->generate($this->inscription->qrUrl());
        $qrCodeData = base64_encode($qrCode);
        return $this->subject(env('EVENT_NAME').' - Recordatorio')->view('emails.reminder')
         ->with([
                    'qrCodeData' => $qrCodeData,
                    'inscription' => $this->inscription,
                ]);

               
    }
}
