<?php

namespace App\Console\Commands;

use App\Mail\FacetofaceInscriptionMail;
use App\Models\Inscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendIncriptionMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:inscriptionmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resend inscription mail.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Se envían los correos de inscripcion");
        $inscriptions_list = Inscription::all();   
        foreach($inscriptions_list as $inscription){
            if($inscription->id > 121){
                $email = $inscription->userData->email;
                Log::info("email: ".$email);
                Mail::to($email)->send(new FacetofaceInscriptionMail($inscription));
                echo "Correo enviado a: ".$email."\n";
            }
        }        
        Log::info("Fin del envio de correo.");
        return true;
    }
}
