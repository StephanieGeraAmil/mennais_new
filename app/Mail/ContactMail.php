<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public $email;

    public $phone;

    public $text_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $text_message)
    {
        //
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->text_message = $text_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(env('EVENT_NAME').' – Formulario de contacto')
        ->view('emails.contact')
        ->with('name',$this->name)
        ->with('email',$this->email)
        ->with('phone',$this->phone)
        ->with('text_message',$this->text_message);
    }
}
