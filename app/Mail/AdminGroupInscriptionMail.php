<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminGroupInscriptionMail extends Mailable
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
        return $this->subject(env('EVENT_NAME').' – Invitación grupal')
        ->view('emails.admin.group_inscription')
        ->with('group_inscription',$this->group_inscription);
    }
}
