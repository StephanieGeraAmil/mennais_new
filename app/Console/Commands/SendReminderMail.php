<?php

namespace App\Console\Commands;

use App\Mail\RecoveryCertificateMail;
use App\Mail\ReminderMail;
use App\Models\Inscription;
use App\Models\SendMail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class SendReminderMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:remindermail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder mail.';

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
        // $mail = SendMail::find(1);
        $mail =  SendMail::query()->orderBy('id', 'desc')->first();
        if(!isset($mail)){
            $mail = SendMail::create([
                'id'=>1,
                'last_id'=>0,
                'created_at'=>Carbon::now()
            ]);
        }
  
         $inscriptions_list = Inscription::where('id', '>', $mail->last_id)
            ->take(100)
            ->get();
         //  $inscriptions_list = Inscription::where('type', 'hibrido')
         //   ->where('id', '>', $mail->last_id)
         //   ->take(100)
         //   ->get();
        $last_id = 0;
        foreach($inscriptions_list as $inscription){ 
            // $qrCode = QrCode::format('png')->generate($inscription->qrUrl());
            // $qrCodeData = base64_encode($qrCode);
            if($inscription->id > 0){
                Log::info("inscription: ".$inscription);
                $email = $inscription->userData->email;
                Log::info("email: ".$email);
                try {
                    Log::info("inscription: ".$inscription);
                   Mail::to($email)->send(new ReminderMail($inscription));
                // Mail::to($email)->send(new ReminderMail($inscription, $qrCodeData));
                } catch (\Throwable $th) {
                    Log::error("error: ".$th);
                    Log::error("Fallo email: ".$email);
                }
                echo "Correo enviado a: ".$email."\n";
                $last_id = $inscription->id;                
            }
        } 
        $mail->last_id = $last_id;
        $mail->save();
        Log::info("Fin del envio de correo.");
        return true;
    }
}
