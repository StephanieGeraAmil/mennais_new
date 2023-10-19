<?php

namespace App\Console\Commands;

use App\Models\SendMail;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ResetMailCounter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:mailcounter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset last email counter, use only when proccess begin';

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
        $mail = SendMail::find(1);
        if(!isset($mail)){
            $mail = SendMail::create([
                'id'=>1,
                'last_id'=>0,
                'created_at'=>Carbon::now()
            ]);
        }else{
            $mail->last_id = 0;
            $mail->save();
        }
        echo "Contador reiniciado";
    }
}
