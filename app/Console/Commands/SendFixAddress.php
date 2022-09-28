<?php

namespace App\Console\Commands;

use App\Mail\AlertMail;
use App\Models\School;
use App\Models\SecondWorkshopGroup;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendFixAddress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @varx string
     */
    protected $signature = 'send:fixaddress';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Important message';

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
        Log::info("Se envían los correos de Alerta");

        //$second_ws = SecondWorkshopGroup::find(2);
        $second_ws = SecondWorkshopGroup::findOrFail(4);
        $inscriptions_list = $second_ws->inscription;

        foreach($inscriptions_list as $inscription){            
            if($inscription->id > 0){
                $email = $inscription->userData->email;
                Log::info("alert_email: ".$email);
                Mail::to($email)->send(new AlertMail($inscription));
                echo "Correo enviado a: ".$email."\n";
                $last_id = $inscription->id;                
            }
        }         
        Log::info("Fin del envio de correo de alerta.");
        return true;
    }
}
