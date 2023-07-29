<?php

namespace App\Console\Commands;

use App\Mail\SendInscriptionCodeMail;
use App\Models\Code;
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
    protected $signature = 'send:fix';

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
        Log::info("Se envían los correos con códigos de invitación");

        $code_list = Code::where('inscription_id', 0)->where('status', 1)->get();
        foreach($code_list as $code){
                $email = $code->email;
                Log::info("alert_email: ".$email);
                
                try {
                    Mail::to($email)->send(new SendInscriptionCodeMail($code));                    
                } catch (\Throwable $th) {
                    Log::error("InscriptionController::Email: ".$email."; ".env('ADMIN_EMAIL'));
                }                               
                
                echo "Correo enviado a: ".$email."\n";                
            
        }         
        Log::info("Fin del envio de correo de alerta.");
        return true;
    }
}
