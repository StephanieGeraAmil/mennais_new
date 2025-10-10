<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GroupInscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $group_inscription;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($group_inscription)
    {
        //
        $this->group_inscription = $group_inscription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $joinUrl = route('group.inscription.join', ['id' => $this->groupInscription->id]);
        return $this->subject(env('EVENT_NAME').' - Invitación grupal')->view('emails.group_inscription')
        ->with([
            'group_inscription' => $this->groupInscription,
            'joinUrl' => $joinUrl,
        ]);
        
        

   
    }
}
