<?php

namespace App\Console\Commands;

use App\Mail\RecoveryCertificateMail;
use App\Models\Inscription;
use App\Models\SendMail;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendCertificatesMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:certificates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email with certificates links.';

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
        Log::info("Se envían los correos de link a certificados");
        // $mail = SendMail::find(1);
        $mail =  SendMail::query()->orderBy('id', 'desc')->first();
        if(!isset($mail)){
            $mail = SendMail::create([
                'id'=>1,
                'last_id'=>0,
                'created_at'=>Carbon::now()
            ]);
        }
        

        $inscriptions_list = Inscription::where('id','>',$mail->last_id)->take(100)->get();   
        $last_id = 0;
        
        // $mail_list = [];
        // foreach ($inscriptions_list as $inscription) {
        //     if ($inscription->id > 0) {
        //         $attendance_list = Attendance::where('inscription_id', $inscription->id)->get();
        //         if ($attendance_list->isNotEmpty()) {
        //             $mail_list[] = $inscription->userData->email;
        //         }
        //     }
        // }
        
        
        foreach($inscriptions_list as $inscription){            
            if($inscription->id > 0){
                $attendance_list = Attendance::where('inscription_id', $inscription->id)->get();
                if ($attendance_list->isNotEmpty()) {
                    $email = $inscription->userData->email;
                    // if ($email === 'cgera@gmail.com.uy') {
                    Log::info("email: ".$email);
                    Mail::to($email)->send(new RecoveryCertificateMail($inscription));
                    echo "Correo enviado a: ".$email."\n";
                    //}
                    $last_id = $inscription->id;        
                }       
            }
        } 
        $mail->last_id = $last_id;
        $mail->save();
        Log::info("Fin del envio de correo.");
        return true;
    }
}
